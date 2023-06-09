<?php
//セッションを使うことを宣言
session_start();
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D .I .Blig</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script class="slide">
      $(document).ready(function(){
        $('.abc').bxSlider({
            auto: true,
            speed: 2000,
            
        });
      });
      
    </script>
    <link rel="stylesheet" href="htmlstyle.css">
    
</head>
<body>
   
 <header>
    <img src="img/diblog_logo.jpg" alt="DIworksのロゴ" class="img">
    <div class="menu">
        <ul>
                <!-- ログインしていない -->
                <?php if (empty($_SESSION["mail"])) :?>

                <li><a href="index.php">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="login.php">ログイン</a></li>

                <!-- 一般 -->
                <?php elseif ($_SESSION['authority'] == 0):?>
                <!-- //ログインされている場合は表示用メッセージを編集 -->
                <?php $message1 = $_SESSION['family_name']."さんようこそ";?>
                <li><a href="index.php">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li>問い合わせ</li>
                <li><div><?php echo htmlspecialchars($message1, ENT_QUOTES); ?></div></li>
                <li><a href="logout.php">ログアウト</a></li>

                <!-- 管理者 -->
                <?php else :?>
                <li><a href="index.php">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="regist.php">アカウント登録フォーム</a></li>
                <li><a href="list.php">アカウント一覧</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
                <li><div><?php error_reporting(0); echo htmlspecialchars($message1, ENT_QUOTES); ?></div></li>
                <li><a href="logout.php">ログアウト</a></li>

                <?php endif; ?>

        </ul>
    </div>
 </header>
 <main>
    <div class="main-container">
        <div class="left">
            <h1>プログラミングに役立つ書籍</h1>
            <p class="date">2017年1月15日</p>
            <div class="slidebox">
            <div class="abc slide-item">
                <div><img src="img/jQuery_image1.jpg" alt="スライド1"></div>
                <div><img src="img/jQuery_image2.jpg" alt="スライド2"></div>
                <div><img src="img/jQuery_image3.jpg" alt="スライド3"></div>
                <div><img src="img/jQuery_image4.jpg" alt="スライド4"></div>
                <div><img src="img/jQuery_image5.jpg" alt="スライド5"></div>
                
            </div>
            </div>
            <!--<img src="img/bookstore.jpg" alt="本の画像" class="imgtop">-->
            <p class="kadai">D.I.BlogはD .Iworksが提供する演習課題です。</p>
            <p class="second-title">記事中身</p>
            <div class="box-bgc">
                <div class="box1">
                    <div class="box-pic2">
                    <img src="img/pic1.jpg" alt="pic1" class="box-pic8 pic1">
                    <p class="pic-text">ドメインの取得方法</p>
                    </div>
                    <div class="box-pic2">
                    <img src="img/pic2.jpg" alt="pic2" class="box-pic8 pic2">
                    <p class="pic-text">快適な職場環境</p>
                    </div>
                    <div class="box-pic2">
                    <img src="img/pic3.jpg" alt="pic3" class="box-pic8 pic3">
                    <p class="pic-text">Linuxの基礎</p>
                    </div>
                    <div class="box-pic2">
                    <img src="img/pic4.jpg" alt="pic4" class="box-pic8 pic4">
                    <p class="pic-text">マーケティング入門</p>
                    </div>
                </div>
                <div class="box2">
                    <div class="box-pic2">
                    <img src="img/pic5.jpg" alt="pic5" class="box-pic8 pic5">
                    <p class="pic-text">アクティブラーニング</p>
                    </div>
                    <div class="box-pic2">
                    <img src="img/pic6.jpg" alt="pic6" class="box-pic8 pic6">
                    <p class="pic-text">CSSの効率的な勉強方法</p>
                    </div>
                    <div class="box-pic2">
                    <img src="img/pic7.jpg" alt="pic7" class="box-pic8 pic7">
                    <p class="pic-text">リーダブルコードとは</p>
                    </div>
                    <div class="box-pic2">
                    <img src="img/pic8.jpg" alt="pic8" class="box-pic8 pic8">
                    <p class="pic-text">HTML5の可能性</p>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="right">
            <h3 class="right-nikkititle">人気の記事</h3>
            <div class="right-nikkititle-list">PHPオススメの本</div>
            <div class="right-nikkititle-list">PHP MyAdminの使い方</div>
            <div class="right-nikkititle-list">いま人気のエディタTops</div>
            <div class="right-nikkititle-list">HTMLの基礎</div>
            <h3 class="right-nikkititle">オススメリンク</h3>
            <div class="right-nikkititle-list">ﾃﾞｨｰｱｲﾜｰｸｽ株式会社</div>
            <div class="right-nikkititle-list">XAMPPのダウンロード</div>
            <div class="right-nikkititle-list">Eclipseのダウンロード</div>
            <div class="right-nikkititle-list">Braketsのダウンロード</div>
            <h3 class="right-nikkititle">カテゴリ</h3>
            <div class="right-nikkititle-list">HTML</div>
            <div class="right-nikkititle-list">PHP</div>
            <div class="right-nikkititle-list">My SQL</div>
            <div class="right-nikkititle-list">JavaScript</div>
        </div>
        
        
    </div>
 </main>
 <footer>
    <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
 </footer>

    
 
</body>
</html>