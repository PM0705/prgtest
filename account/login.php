<?php

// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "root";  // ユーザー名
$db['pass'] = "root";  // ユーザー名のパスワード
$db['dbname'] = "lesson01";  // データベース名

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["mail"])) {  // emptyは値が空のとき
        $errorMessage = 'メールアドレスが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["mail"]) && !empty($_POST["password"])) {
        // 入力したユーザIDを格納
        $mail = $_POST["mail"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3. エラー処理
        try {
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare('SELECT * FROM diblog_account WHERE mail = ?');
            $stmt->execute(array($mail));

            $password = $_POST["password"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);

                    // 入力したIDのユーザー名を取得
                    $id = $row['mail'];
                    $sql = "SELECT * FROM diblog_account WHERE mail = $mail";  //入力したIDからユーザー名を取得
                    $stmt = $pdo->query($sql);
                    foreach ($stmt as $row) {
                        $row['mail'];  // ユーザー名
                    }
                    $_SESSION["mail"] = $row['mail'];
                    header("Location: index.html");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'エラーが発生したためログインできませんでした';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
        }
    }
}
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
                <li><a href="regist.php">アカウント登録フォーム</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
    </header>

    <main>
        <h1>ログイン画面</h1>
        <div class="confirm">  
            
                <form  id="loginForm" name="loginForm" action="login.php" method="POST">
                <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
                    <dl>
                        <dt><label for="mail">メールアドレス<br>※半角英数字、半角ハイフンのみ可</label></dt>
                        <dd><input type="text" name="mail" id="mail" maxlength="100"
                                    pattern="^[\w\d\-_-]+@[\w\d_-]+\.[\w\d._-]+$" title="半角英数字、半角ハイフンでご入力ください"><br>
                            <span class="err-msg-mail"></span>
                        </dd>
                    </dl>
                    <!-- パスワード -->
                    <dl>
                        <dt><label for="password">パスワード※半角英数字のみ入力可</label></dt>
                        <dd><input type="password" name="password" id="password" maxlength="10"
                                    pattern="^[a-zA-Z0-9]+$" title="半角英数字でご入力ください"><br>
                            <span class="err-msg-password"></span>
                        </dd>
                    </dl>
                    <!-- ログインボタン -->

                    <div class="form1">
                    <button  type="submit" name="login">ログインする</button>
                    </div>
                    
                </form> 
        </div>    

    </main>

</body>

    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


