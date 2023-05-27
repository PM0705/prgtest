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
    <title>アカウント登録画面</title>
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
    if (isset($_POST['id'])) {
        try {
 
            // 接続処理
            $dsn = 'mysql:host=localhost;dbname=lesson01';
            $user = 'root';
            $password = 'root';
            $dbh = new PDO($dsn, $user, $password);
 
            // UPDATE文を発行
            $id = $_POST['id']; // UPDATEするレコードのID
 
            $family_name = isset($_POST['family_name']) ? $_POST['family_name'] : '';
            $last_name= isset($_POST['last_name']) ? $_POST['last_name'] : '';
            $family_name_kana = isset($_POST['family_name_kana']) ? $_POST['family_name_kana'] : '';
 
            $sql = "UPDATE diblog_account SET family_name = :family_name, last_name = :last_name, family_name_kana = :family_name_kana WHERE id = :id";
            $stmt = $dbh->prepare($sql);
 
            $stmt->execute([":family_name" => $family_name, ":last_name" => $last_name, ":family_name_kana" => $family_name_kana, ":id" => $id ]); // 連想配列でバインド
 
            print("レコードを更新しました<br>");
            print('<a href="update_complete.php">一覧表示へ</a>');
 
            // 接続切断
            $dbh = null;
 
 
        } catch (PDOException $e) {
            print $e->getMessage() . "<br/>";
            die();
        }
    }
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


