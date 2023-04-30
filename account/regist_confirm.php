<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォームを作る</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/style2.css">
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
        <p>名前
           <br>
           <?php
           echo $_POST['name'];
           ?>
        </p>
        <p>メールアドレス
           <br>
           <?php
           echo $_POST['mail'];
           ?>
        </p>
        <p>年齢
           <br>
           <?php
           echo $_POST['age'];
           ?>
        </p>
        <p>コメント
           <br>
           <?php
           echo $_POST['comments'];
           ?>
        </p>
        <form action="index.html">
            <input type="submit" class="button1" value="戻って修正する">
        </form>
        <form action="insert.php"method="post">
            <input type="submit" class="button2" value="登録する">
            <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['age']; ?>" name="age">
            <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
        </form>
        
    </div>
</body>
</html>