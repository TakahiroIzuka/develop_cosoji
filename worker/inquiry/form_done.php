<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
<title>こそーじ | わたしの10分を1,000円にスキマ時間で、キレイなまちに</title>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/form_done.css">
        
           
<!-- jQueryライブラリの読み込み(ハンバーガーメニュー) -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<!-- jQueryライブラリの読み込み(ヘッダースクロール時の動き) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ajaxzip3スクリプトの読み込み(住所検索) --> 
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

</head>
<body>
    	
     <?php 
    
    try {
    
    require_once('./common/common.php');
    
    $post=sanitize($_POST);
    
    //値を受け取り、変数に代入
    $subject=$post['subject'];
    $content=$post['content'];
    $family_name=$post['family_name'];
    $first_name=$post['first_name'];
    $family_name_kana=$post['family_name_kana'];
    $first_name_kana=$post['first_name_kana'];
    $email=$post['email'];
    $age=$post['age'];
    $sex=$post['sex'];
    $zip1=$post['zip1'];
    $zip2=$post['zip2'];
    $prefecture=$post['prefecture'];
    $address=$post['address'];
    $tel=$post['tel'];
    
        
    //メールインジェクション安全対策
    $replace = [
    '\n' => '',
    '\r' => '',
    ];
    str_replace(array_keys($replace), array_values($replace), $email);
         
    //データベースに接続
    $dsn='mysql:dbname=cosoji_db1234;host=mysql1025.db.sakura.ne.jp;charset=utf8';
    $user='cosoji';
    $password='Cosoji2020';
    $dbh=new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //テーブルロック開始
    $sql='LOCK TABLES worker_info_table WRITE, worker_content_table WRITE';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
        
    //SQL文にてお客様情報を入力
    $sql='INSERT INTO worker_info_table(family_name, first_name, family_name_kana, first_name_kana, email, age, sex, zip1, zip2, prefecture, address, tel) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt=$dbh->prepare($sql);
    $data[]=$family_name;
    $data[]=$first_name;
    $data[]=$family_name_kana;
    $data[]=$first_name_kana;
    $data[]=$email;
    $data[]=$age;
    $data[]=$sex;
    $data[]=$zip1;
    $data[]=$zip2;
    $data[]=$prefecture;
    $data[]=$address;
    $data[]=$tel;
    $stmt->execute($data);
    
    //最新のcode番号を取得
    $sql='SELECT LAST_INSERT_ID()';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $lastcode=$rec['LAST_INSERT_ID()'];

    //SQL文にて質問内容を入力
    $sql='INSERT INTO worker_content_table(code, subject, content) VALUES (?,?,?)';
    $stmt=$dbh->prepare($sql);
    $data=array();
    $data[]=$lastcode;
    $data[]=$subject;
    $data[]=$content;
    $stmt->execute($data);
    
    //自社送信メールの本文
    $mail_us= "workerページ\n";
    $mail_us.="お問合わせcode : ".$lastcode."\n";
    $mail_us.="\n";
    $mail_us.="件名\n";
    $mail_us.=$subject."\n";
    $mail_us.="\n";
    $mail_us.="お問合わせ内容\n";
    $mail_us.=$content."\n";
    $mail_us.="\n";
    
    
    //echo '<br />';
    //echo nl2br($mail_us);  //メール本文確認用コード
    
    //テーブルロック解除
    $sql='UNLOCK TABLES';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
        
    //データベース接続を切断
    $dbh=null;
        
    //お客様送信メールの本文
    $mail_gest= "この度は、お問い合わせいただきありがとうございます。\n";
    $mail_gest.="\n";
    $mail_gest.="折り返し、担当者よりご連絡いたしますので、\n";
    $mail_gest.="恐れ入りますが、しばらくお待ち下さい。\n";
    $mail_gest.="\n";
    $mail_gest.="なお、3営業日たっても返信、返答がない場合は、\n";
    $mail_gest.="お手数ですが下記のメールアドレスまでご連絡頂ければ幸いです。\n";
    $mail_gest.="info@cosoji.jp\n";
    $mail_gest.="\n";
    $mail_gest.="※このメールにお心当たりのないお客様は、大変お手数ですが、下記のサポートページよりご連絡いただきますようお願い申し上げます。\n";
    $mail_gest.="https://support.cosoji.jp\n";
    $mail_gest.="\n";
    $mail_gest.="■運営事務局■\n";
    $mail_gest.="COSOJI運営　Rsmile株式会社\n";
    
    
    //echo '<br />';
    //echo nl2br($mail_gest);  //メール本文確認用コード
        
    //メール自動送信(お客様用)
    $title='お問合せありがとうございます';
    $header='From:info@cosoji.jp';
    $returnPath= '-f'.'info@cosoji.jp';
    $mail_gest=html_entity_decode($mail_gest, ENT_QUOTES, 'UTF-8');
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    mb_send_mail($email, $title, $mail_gest, $header, $returnPath);
        
    
    //メール自動送信(自社用)
    $title='お問合せがありました';
    $header='From:'.$email;
    $returnPath= '-f'.$email;
    $mail_us=html_entity_decode($mail_us, ENT_QUOTES, 'UTF-8');
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    mb_send_mail('info@cosoji.jp', $title, $mail_us, $header, $returnPath);
    

        
    }catch(Exception $e) {
        echo'ただいま障害により大変ご迷惑お掛けしております。';
        exit();
    }

    ?>
    
    <!---     ヘッダー      --->
    <header class="header">
        
        <!---    ヘッダー(PC用)    --->
        <div class="header-pc-only">
            <div class="header-logo-area">
                <img src="img/cosoji-header-logo.png" alt="cosojiロゴ">
            </div>
                <ul class="gnav-menu-pc">
                    <li class="gnav-item-pc">
                        <a href="../../worker/index.html#feature">特徴</a>
                    </li>
                    <li class="gnav-item-pc">
                        <a href="../../worker/index.html#recommend">こんなひとにおすすめ</a>
                    </li>
                    <li class="gnav-item-pc">
                        <a href="../../worker/index.html#usage">はじめかた</a>
                    </li>
                    <li class="gnav-item-pc">
                        <a href="../../worker/index.html#kinds">導入事例</a>
                    </li>
                    <li class="gnav-item-pc register-pc">
                        <a href="#">近くのお仕事を探す</a>
                    </li>
                    <li class="gnav-item-pc login-pc">
                        <a href="#">ログイン</a>
                    </li>
                </ul>
        </div>
        
        <!---    ヘッダー(モバイル用)    --->
        <div class="header-sp-only">
            <div class="logo-area">
                <img src="img/cosoji-header-logo.png" alt="cosojiロゴ">
            </div>
    
            <button class="header-button"><span></span></button>
                <ul class="header-nav">
                    <li class="header-nav-item">
                        <a href="../../worker/index.html#feature">特徴</a>
                    </li>
                    <li class="header-nav-item">
                        <a href="../../worker/index.html#recommend">こんなひとにおすすめ</a></li>
                    <li class="header-nav-item">
                        <a href="../../worker/index.html#usage">はじめかた</a>
                    </li>
                    <li class="header-nav-item">
                        <a href="../../worker/index.html#kinds">導入事例</a>
                    </li>
                </ul>
                <div class="register-sp">
                    <a href="#">お仕事を探す</a>
                </div>
                <div class="login-sp">
                    <a href="#">ログイン</a>
                </div>
        </div>
        
        </header>
    
    
        <!---      メインセクション     --->
        <section>
            
            
            <!---    パンくずリスト     --->
            <div class="breadcrumb">
                <ul class="breadcrumb-inner">
                    <li class="breadcrumb-item">
                        <a href="../">メインページ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./index.html">お問合わせフォーム</a>
                    </li>
                    <li class="breadcrumb-item">
                        <p>お問合わせありがとうございます</p>
                    </li>
                </ul>
            </div>
            
            
            <!---      メイン       --->
            <h1>お問い合わせ<br>ありがとうございます</h1>
            <dl>
                
                <!---     送信アドレス表示     --->
                <div class="wrapper-email">
                    <div class="message">
                        <?php
                                echo "下記のメールアドレスにメールを送信させて頂きました。<br /><br />";
                                echo $email;
                            
                         ?>
                    </div>
                </div>
                
                <div class="wrapper-explain">
                    <p>お問合わせには、受付時間内に対応させていただいております。<br>お問合わせの内容によっては、お時間を頂戴する場合やお返事を差し上げれない場合がございます。</p>
                </div>
 
                <!---      戻るボタン     --->
                <div class="wrapper-button">
                    <a href="../../worker/index.html" class="return-top">
                        <span>COSOJI トップページへ</span>
                    </a>
                </div>
            </dl>
        </section>
        
        
        <!---      フッター      --->
        <footer class="footer">
        <div>
            <a href="#wrapper" class="pagetop" id="pagetop"></a>
        </div>
        <div class="footer-container">
                <ul id="second-block">
                    <ul>
                        <li><div class="icon"></div><a href="../">トップ</a></li>
                        <li><div class="icon"></div><a href="../company/">運営会社</a></li>
                    </ul>
                    <ul>
                        <li id="inq"><div class="icon"></div><a href="../inquiry/index.html">お問合わせ</a></li>
                        <li id="faq"><div class="icon"></div><a href="#">FAQヘルプセンター</a></li>
                    </ul>
                </ul>
                <ul>
                    <li id="rule"><div class="icon"></div><a href="../../pdfjs/web/viewer.html?file=terms_worker.pdf">利用規約</a></li>
                    <li id="policy"><div class="icon"></div><a href="../../pdfjs/web/viewer.html?file=privacy_policy.pdf">プライバシーポリシー</a></li>
                </ul>
                <ul>
                    <li id="request"><div class="icon"></div><a href="../../owner/">仕事を依頼したい方は<span>こちら</span></a></li>
                </ul>
         </div>
         <div class="footer-bottom">
                <small>&copy; 2020 Rmail Inc</small>
         </div>
     
    
    </footer>
    
    
    
    <!---       スクリプトの読み込み       --->
    <script src="js/script-humb.js" defer></script>
    <script src="js/script-head.js"></script>
    <script src="js/script-ajaxzip3.js"></script>

	
</body>
</html>
