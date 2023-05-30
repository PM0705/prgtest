<?php
    if (isset($_GET['id'])) {
        try {
 
            // 接続処理
            $dsn = 'mysql:host=localhost;dbname=lesson01';
            $user = 'root';
            $password = 'root';
            $dbh = new PDO($dsn, $user, $password);
 
            // SELECT文を発行
            $sql = "SELECT * FROM diblog_account WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $member = $stmt->fetch(PDO::FETCH_OBJ); // 1件のレコードを取得
 
            // 接続切断
            $dbh = null;
 
        } catch (PDOException $e) {
            print $e->getMessage() . "<br/>";
            die();
        }
 
    }
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
    <main>
        <form method="post" action="delete_confirm.php" name="form" autocomplete="off" >
            <div class="contact-form errorMsg">
                <div class="left">
                <h3> アカウント更新画面</h3>
                <?php echo($member->id) ?><br>
                <?php print($member->family_name) ?><br>
                <?php print($member->last_name) ?><br>
                <?php print($member->family_name_kana) ?><br>
                <?php print($member->last_name_kana) ?><br>
                <?php print($member->mail) ?><br>
                <?php print($member->password) ?><br>
                <?php
                    error_reporting(0);
                    if ($gender == 0) {
                        echo "男";
                        }else{
                                echo "女";
                        }
                    ?><br>
                <?php print($member->postal_code) ?><br>
                <?php print('<option value="'.$member->prefecture.'">'.$member->prefecture.'</option>') ?><br>
                <?php print($member->address_1) ?><br>
                <?php print($member->address_2) ?><br>
                <?php
                    error_reporting(0);
                    if ($authority == 0) {
                        echo "一般";
                        }else{
                                echo "管理者";
                        }
                    ?>
                    <!-- 送信ボタン -->
                    <div class="contact-submit">
                            <div>
                                <input type="submit" class="submit" value="確認する">
                            </div>
                    </div>
                </div>
            </div>
        </form> 
    
    </main>
    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


