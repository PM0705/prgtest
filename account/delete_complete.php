<?php
            echo $_POST['id'];
            ?>
<?php

$id = $_POST['id'];
// エラーメッセージ、登録完了メッセージの初期化
$message = "";

try {

//フォームから受け取った値を変数に代入

$pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
$sql='UPDATE diblog_account SET delete_flag = :delete_flag  WHERE id=:id';
$stmt = $pdo->prepare($sql);
//  更新する値と該当のIDを配列に格納する
$params = array(':delete_flag' => '0' ,
                ':id' => $_POST['id']); 

// 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);

$message = '削除が完了しました。';
    } catch (PDOException $e) {
        
        $message = 'エラーが発生したためアカウント削除できません。';
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
            }
// header("Location:http://localhost/account/list.php");  
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


