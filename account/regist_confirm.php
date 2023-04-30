<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォームを作る</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/confirmstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <h1>お問合せ確認</h1>
    <div class="confirm">
        <p>お問い合わせの内容は、こちらで宜しいでしょうか？
            <br>よろしければ「送信する」ボタンを押してください。
        </p>
        <p>名前（姓）
           <br>
           <?php
           echo $_POST['lastname'];
           ?>
        </p>
        <p>名前（名）
           <br>
           <?php
           echo $_POST['firstname'];
           ?>
        </p>
        <p>カナ（姓）
           <br>
           <?php
           echo $_POST['lastnamekana'];
           ?>
        </p>
        <p>カナ（名）
           <br>
           <?php
           echo $_POST['firstnamekana'];
           ?>
        </p>
        <p>メールアドレス
           <br>
           <?php
           echo $_POST['mail'];
           ?>
        </p>
        <p>パスワード
           <br>
           <?php
           echo $_POST['pw'];
           ?>
        </p>
        <p>性別
           <br>
           <?php
           echo $_POST['gender'];
           ?>
        </p>
        <p>性別
           <br>
           <?php
           echo $_POST['gender'];
           ?>
        </p>
        <p>郵便番号
           <br>
           <?php
           echo $_POST['gender'];
           ?>
        </p>
        <p>住所（都道府県）
           <br>
           <?php
           echo $_POST['todouhuken'];
           ?>
        </p>
        <p>住所（市区町村）
           <br>
           <?php
           echo $_POST['citytown'];
           ?>
        </p>
        <p>住所（番地）
           <br>
           <?php
           echo $_POST['housenum'];
           ?>
        </p>
        <p>アカウント権限
           <br>
           <?php
           echo $_POST['kengen'];
           ?>
        </p>
        <form action="regist.php">
            <input type="submit" class="button1" value="戻って修正する">
        </form>
        <form action="regist_compleate.php"method="post">
            <input type="submit" class="button2" value="登録する">
            <input type="hidden" value="<?php echo $_POST['lastname']; ?>" name="lastname">
            <input type="hidden" value="<?php echo $_POST['firstname']; ?>" name="firstname">
            <input type="hidden" value="<?php echo $_POST['lastnamekana']; ?>" name="lastnamekana">
            <input type="hidden" value="<?php echo $_POST['firstnamekana']; ?>" name="firstnamekana">
            <input type="hidden" value="<?php echo $_POST['name']; ?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['name']; ?>" name="pw">
            <input type="hidden" value="<?php echo $_POST['name']; ?>" name="gender">
            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="addressnum">
            <input type="hidden" value="<?php echo $_POST['age']; ?>" name="todouhuken">
            <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="citytown">
            <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="housenum">
            <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="kengen">
        </form>
        
    </div>
</body>
</html>