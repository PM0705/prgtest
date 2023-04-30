<?php
mb_internal_encoding("utf8");
$pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
$pdo ->exec("insert into contactform(name,mail,age,comments)
       values('".$_POST['name']."',
              '".$_POST['mail']."',
              '".$_POST['age']."',
              '".$_POST['comments']."');
            ");
?>
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
    <h1>お問合せフォーム</h1>
    <div class="confirm">
        <p>お問合せ理がとうございました、
            <br>3営業以内に担当よりご連絡差し上げます。
        </p>
    </div>
    
</body>
</html>
