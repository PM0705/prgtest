<?php
//セッションを使うことを宣言
session_start();
var_dump($_SESSION);
//ログインされていない場合は強制的にログインページにリダイレクト
if ($_SESSION["authority"] == 0){
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録画面</title>
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
                <!-- ログインしていない -->
                <?php if (empty($_SESSION["mail"])) :?>
                <li><a href="index.html">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="login.php">ログイン</a></li>

                <!-- 一般 -->
                <?php elseif ($_SESSION['authority'] == 0):?>
                <!-- //ログインされている場合は表示用メッセージを編集 -->
                <?php $message1 = $_SESSION['family_name']."さんようこそ";?>
                <li><a href="index.html">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li>問い合わせ</li>
                <li><div><?php echo htmlspecialchars($message1, ENT_QUOTES); ?></div></li>
                <li><a href="logout.php">ログアウト</a></li>

                <!-- 管理者 -->
                <?php else :?>
                <li><a href="index.html">トップ</a></li>
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

     <h3>  アカウント削除画面</h3>
        <p class="delete">本当に削除して<br>よろしいですか?</p>
        <div class="form1">
            <form action="delete.php">
                <!-- <input type="submit" class="button1" value="前に戻る"> -->
                <button type="button" class="button1" value="前に戻る" onclick=history.back()>
                        前に戻る
                </button>
            </form>
            <!-- 更新する・前に戻る -->
            <form action="delete_complete.php" method="post">         
                <input type="submit" class="delete1"  id="delete1" value="削除する"href="delete_complete.php<? $result['id'] ?>" name="btnSend">
                <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                <input type="hidden" value="<?php echo $_POST['delete_flag']; ?>" name="delete_flag">
            </form>
        </div>
    </main>

    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="app3.js"></script>   
</body>
</html>


