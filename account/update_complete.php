<?php
            echo $_POST['family_name'];
            echo $_POST['id'];
            ?>


<?php
try{
// エラーメッセージ、登録完了メッセージの初期化
//フォームから受け取った値を変数に代入
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// mb_internal_encoding("utf8");

    $message = "";
    //CREATE_INFO(テーブル)の中身を初期値に入れ込む
    $id = $_POST['id'];
    $db = new PDO('mysql:host=localhost;dbname=lesson01','root','root');
    $sql = 'SELECT * FROM diblog_account WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt -> execute([':id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);


    //更新処理
    
    $family_name = $_POST['family_name'];
    $last_name = $_POST['last_name'];
    $family_name_kana = $_POST['family_name_kana'];
    $last_name_kana = $_POST['last_name_kana'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $postal_code = $_POST['postal_code'];
    $prefecture = $_POST['prefecture'];
    $address_1 = $_POST['address_1'];
    $address_2 = $_POST['address_2'];
    $authority = $_POST['authority'];

        
    $sql = 'UPDATE diblog_account SET family_name = :family_name, last_name = :last_name,
                       family_name_kana = :family_name_kana, last_name_kana = :last_name_kana,
                       mail = :mail, password = :password,
                       gender = :gender, postal_code = :postal_code,
                       prefecture = :prefecture, postal_code = :postal_code,
                       gender = :gender, address_1 = :address_1,
                       address_2 = :address_2, authority = :authority
                       WHERE id=:id';

        $message = '更新が完了しました。';   
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
        $message = 'エラーが発生したためアカウント更新できません。';
      }
        
          
    

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


