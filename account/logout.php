<?php
session_start();
//セッション変数の中身を空にする
$_SESSION = array();
//サーバ側のセッションを破棄
session_destroy();
$logout = 'ログアウト完了しました。';


?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/confirm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="img/diblog_logo.jpg" alt="DIworksのロゴ" class="img">
        <div class="menu">
            <ul>
            <li><a href="index.html">トップ</a></li>
            <li>プロフィール</li>
            <li>D .I .Bligについて</li>
            <li><a href="login.php">ログイン</a></li>
            <li>問い合わせ</li>
            <li>その他</li>
            </ul>
        </div>
    </header>
    <main>
    
    <div class="confirm1">
        <p class="noerror"><?php error_reporting(0);echo htmlspecialchars($logout, ENT_QUOTES); ?></p>

            <form action="index.html">
            <button onclick="location.href='index.html'" class="button1" value="TOPページへ戻る" >
                    TOPページへ戻る          
            </button>
            </form>
    </div>

</main>




    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="app2.js"></script>   
</body>
</html>
