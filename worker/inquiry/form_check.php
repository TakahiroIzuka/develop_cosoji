<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
<title>こそーじ | わたしの10分を1,000円にスキマ時間で、キレイなまちに</title>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/check_form.css">
        
           
<!-- jQueryライブラリの読み込み(ハンバーガーメニュー) -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<!-- jQueryライブラリの読み込み(ヘッダースクロール時の動き) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- ajaxzip3スクリプトの読み込み(住所検索) --> 
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

</head>
<body>
    	
    <?php 
    
    require_once('./common/common.php');
    
    $post=sanitize($_POST);

    if(!empty($post['subject'])) {
        $subject=$post['subject'];
    }else {
        $subject='';
    }
    
    if(!empty($post['content'])) {
        $content=$post['content'];
    }else {
        $content='';
    }
    
    if(!empty($post['family-name'])) {
        $family_name=$post['family-name'];
    }else {
        $family_name='';
    }
    
    if(!empty($post['first-name'])) {
        $first_name=$post['first-name'];
    }else {
        $first_name='';
    }
    
    if(!empty($post['family-name-kana'])) {
        $family_name_kana=$post['family-name-kana'];
    }else {
        $family_name_kana='';
    }
    
    if(!empty($post['first-name-kana'])) {
        $first_name_kana=$post['first-name-kana'];
    }else {
        $first_name_kana='';
    }
    
    if(!empty($post['email'])) {
        $email=$post['email'];
    }else {
        $email='';
    }
    
    if(!empty($post['age'])) {
        $age=$post['age'];
    }else {
        $age='';
    }
    
    if(!empty($post['sex'])) {
        $sex=$post['sex'];
    }else {
        $sex='';
    }
    
    if(!empty($post['zip1'])) {
        $zip1=$post['zip1'];
    }else {
        $zip1='';
    }
    
    if(!empty($post['zip2'])) {
        $zip2=$post['zip2'];
    }else {
        $zip2='';
    }
    
    if(!empty($post['prefecture'])) {
        $prefecture=$post['prefecture'];
    }else {
        $prefecture='';
    }
    
    if(!empty($post['address'])) {
        $address=$post['address'];
    }else {
        $address='';
    }
    
    if(!empty($post['tel'])) {
        $tel=$post['tel'];
    }else {
        $tel='';
    }   
    
    
    ?>
    
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
        <section>
            <div class="breadcrumb">
                <ul class="breadcrumb-inner">
                    <li class="breadcrumb-item">
                        <a href="../">メインページ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./index.html">お問合わせフォーム</a>
                    </li>
                    <li class="breadcrumb-item">
                        <p>お問合わせ内容確認</p>
                    </li>
                </ul>
            </div>
            <h1>お問合わせ内容確認</h1>
           
            
            <dl>
                <h2>お問合わせ内容</h2>
                <table>
                    <tr class="table-row">
                        <th class="table-head">
                            件名
                            <br>
                            <span class="table-head-require">必須</span>
                        </th>
                        <td class="table-data-content">
                            <div class="table-data-wrapper">
                                <?php echo $subject; ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-head">
                            お問合わせ内容
                            <br>
                            <span class="table-head-require">必須</span>
                        </th>
                        <td class="table-data-content">
                            <div class="table-data-wrapper">
                                <?php echo $content; ?>
                            </div>
                        </td>
                    </tr>
                </table>
                
                
                <h2>お客様の情報</h2>
                <table>
                    <tr class="table-row">
                        <th class="table-head">
                            氏名
                            <br>
                            <span class="table-head-require">必須</span>
                        </th>
                        <td colspan="3" class="table-data">
                            <label class="table-data-wrapper name">
                                <?php echo $family_name; ?>
                            </label>
                            <label class="table-data-wrapper name first">
                                <?php echo $first_name; ?>　様
                            </label>
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-head">
                            ふりがな
                            <br>
                            <span class="table-head-require">必須</span>
                        </th>
                        <td colspan="3" class="table-data">
                            <label class="table-data-wrapper name-kana">
                                <?php echo $family_name_kana ?>
                            </label>
                            <label class="table-data-wrapper name-kana first">
                                <?php echo $first_name_kana ?>　様
                            </label>
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-head">
                            メールアドレス
                            <br>
                            <span class="table-head-require">必須</span>
                        </th>
                        <td colspan="3" class="table-data">
                            <div class="table-data-wrapper">
                                <?php echo $email ?>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row double">
                        <th class="table-head">
                            年齢
                            <br>
                            <span class="table-head-require optional">任意</span>
                        </th>
                        <td class="table-data">
                            <div class="table-data-wrapper">
                                <?php echo $age ?>  歳
                            </div>
                        </td>
                        <th class="table-head bor-left">
                            性別
                            <br>
                            <span class="table-head-require optional">任意</span>
                        </th>
                        <td class="table-data">
                            <div class="table-data-wrapper flex">
                                    <?php 
                                        if($sex=='M') {
                                            echo '男性';
                                        }elseif($sex=='F'){
                                            echo '女性';
                                        }else{
                                            echo '';
                                        }
                                    ?>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <th class="table-head">
                            郵便番号
                            <br>
                            <span class="table-head-require optional">任意</span>
                        </th>
                        <td class="table-data">
                            <div class="table-data-wrapper">
                                <?php echo $zip1 ?> -
                                <?php echo $zip2 ?>
                            </div>
                        </td>
                        <th class="table-head bor-left">
                            都道府県
                            <br>
                            <span class="table-head-require optional">任意</span>
                        </th>
                        <td class="table-data">
                            <div class="table-data-wrapper">
                                <?php echo $prefecture ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-head">
                            住所
                            <br>
                            <span class="table-head-require optional">任意</span>
                        </th>
                        <td colspan="3" class="table-data">
                            <div class="table-data-wrapper">
                                <?php echo $address ?>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-head">
                            電話番号
                            <br>
                            <span class="table-head-require optional">任意</span>
                        </th>
                        <td colspan="3" class="table-data">
                            <div class="table-data-wrapper">
                                <?php echo $tel ?>
                            </div>
                        </td>
                    </tr>
                </table>
        
            <div class="form-submit">
            <?php 
                                
                echo '<form method="post" action="form_done.php">';
                echo '<input type="hidden" name="subject" value="'.$subject.'">';
                echo '<input type="hidden" name="content" value="'.$content.'">';
                echo '<input type="hidden" name="family_name" value="'.$family_name.'">';
                echo '<input type="hidden" name="first_name" value="'.$first_name.'">';
                echo '<input type="hidden" name="family_name_kana" value="'.$family_name_kana.'">';
                echo '<input type="hidden" name="first_name_kana" value="'.$first_name_kana.'">';
                echo '<input type="hidden" name="email" value="'.$email.'">';
                echo '<input type="hidden" name="age" value="'.$age.'">';
                echo '<input type="hidden" name="sex" value="'.$sex.'">';
                echo '<input type="hidden" name="zip1" value="'.$zip1.'">';
                echo '<input type="hidden" name="zip2" value="'.$zip2.'">';
                echo '<input type="hidden" name="prefecture" value="'.$prefecture.'">';
                echo '<input type="hidden" name="address" value="'.$address.'">';
                echo '<input type="hidden" name="tel" value="'.$tel.'">';
                echo '<br />';
                echo '<input type="button" onclick="history.back()" value="入力内容を修正する">';
                echo '<input type="submit" value="送信">';
            ?>
            </div>
            </dl>
          

        </section>
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
    <script src="js/script-humb.js" defer></script>
    <script src="js/script-head.js"></script>
    <script src="js/script-ajaxzip3.js"></script>

	
</body>
</html>
