<?php
    require('list.php');

    $id = $_GET['id'];

    // 更新対象の投稿内容を取得
    $pdo = db_connect();
    try {
        $sql = "SELECT * FROM diblog_account WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
      } catch (PDOException $e) {
        echo $e->getMessage();
        die();
      }

    // 取得できたタイトルと本文を変数に入れておく
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $mail = $row['mail'];
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント更新完了画面</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/registstyle.css">
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
                <li><a href="list.php">アカウント一覧</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
    </header>




<body>

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
    $message = '更新が完了しました。';
    } catch (PDOException $e) {
        
        $message = 'エラーが発生したためアカウント登録できません。';
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
            }
// header("Location:http://localhost/account/list.php");  
?>
</body>

</html>
         

    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


