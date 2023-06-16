<?php
//セッションを使うことを宣言
session_start();
var_dump($_SESSION);

?>
<?php

//データベース接続情報
$dbuser = 'root';
$dbpass = 'root';
$dsn = 'mysql:host=localhost;dbname=lesson01;';

//MySQL接続
try {
  $dbh = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
  exit('データベース接続失敗: ' . $e->getMessage());
}

//DBからユーザ情報を取得
$sql = 'SELECT * FROM diblog_account WHERE mail = :mail';
$sth = $dbh->prepare($sql);

if (isset($_POST["login"])) {
    //ログインされている場合は表示用メッセージを編集
    $message = $_SESSION['mail']."さんようこそ";
    $message1 = $_SESSION['family_name']."さんようこそ";
    $authority = $_SESSION['authority']."さんようこそ";
    $coution = "権限がないので操作できません";
    
    // １．ユーザIDの入力チェック
    if (empty($_POST["mail"])) {
      $errorMessage = "メールアドレスが未入力です。";
    } else if (empty($_POST["password"])) {
      $errorMessage = "パスワードが未入力です。";
    } 
        //フォームから受け取った値を変数に代入
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $sth->bindValue(':mail', $mail);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
   
    //パスワードが正しいかチェック
    //パスワードが正しい場合
    if (password_verify($password, $result['password'])) {
    //情報をセッション変数に登録
    $_SESSION["family_name"] = $result['family_name']; //セッションにログイン情報を登録
    $_SESSION["authority"] = $result['authority']; //セッションにログイン情報を登録
    $_SESSION['mail'] = $result['mail'];
 


    
    header("Location: index.php");
    
        exit;
    } else {
    //パスワードが間違っている場合
    
    $errorMessage = 'メールアドレスまたはパスワードが間違っています';
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
                <!-- ログインしていない -->
                <li><a href="index.php">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="login.php">ログイン</a></li>

            </ul>
        </div>
    </header>

    <main>
        <h1>ログイン画面</h1>
        <div class="confirm">  
            
                <form  id="loginForm" name="loginForm" action="login.php" method="POST">
                <div><?php error_reporting(0); echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
                    <dl>
                        <dt><label for="mail">メールアドレス<br>※半角英数字、半角ハイフンのみ可</label></dt>
                        <dd><input type="text" name="mail" id="mail" maxlength="100"
                                   title="半角英数字、半角ハイフンでご入力ください"><br>
                            <span class="err-msg-mail"></span>
                        </dd>
                    </dl>
                    <!-- パスワード -->
                    <dl>
                        <dt><label for="password">パスワード<br>※半角英数字のみ入力可</label></dt>
                        <dd><input type="password" name="password" id="password" maxlength="10"
                                   title="半角英数字でご入力ください"><br>
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


