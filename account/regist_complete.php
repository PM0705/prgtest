
<?php
// エラーメッセージ、登録完了メッセージの初期化

$message = "";
try {

//フォームから受け取った値を変数に代入
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
mb_internal_encoding("utf8");
$pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
$pdo ->exec("INSERT INTO diblog_account(family_name,last_name,family_name_kana,last_name_kana,
                         mail,password,gender,postal_code,prefecture,address_1,address_2,authority) 
      VALUES ('".$_POST['family_name']."',
              '".$_POST['last_name']."',
              '".$_POST['family_name_kana']."',
              '".$_POST['last_name_kana']."',
              '".$_POST['mail']."',
              '$password',
              '".$_POST['gender']."',
              '".$_POST['postal_code']."',
              '".$_POST['prefecture']."',
              '".$_POST['address_1']."',
              '".$_POST['address_2']."',
              '".$_POST['authority']."'
              
      );");
    $message = '登録が完了しました。';
    } catch (PDOException $e) {
        
        $message = 'エラーが発生したためアカウント登録できません。';
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
   
}  
?>





<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了しました</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/style2.css">
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
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
</header>
<main>
    <h1>アカウント登録完了画面</h1>
    <div class="confirm">
        <div><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div>
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
    
</body>
</html>