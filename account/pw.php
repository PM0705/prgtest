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
    <title>パスワード更新画面</title>
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

        <div class="main-container">
                <div class="left">
                    <h3> パスワード更新画面</h3>
                        <form method="post" action="pw_confirm.php" name="form" autocomplete="off" >
                            <div class="contact-form errorMsg">
                                            <!-- ID -->
                                            
                                            <input type="hidden" name="id" value="<?php echo($member->id) ?>">
                                            <p class="pwmsg1">ここではパスワードの変更のみ行えます</p>
                                            
                                            <a href="update.php?id=<?php echo($member->id) ?>">パスワード以外の更新はこちらからお願いします</a><br><br>
                                            
                                            
                                            <label for="family_name">名前（姓）</label><span></span>
                                            <?php echo($member->family_name) ?><br>

                                            <label for="last_name">名前（名）</label><span></span>
                                            <?php echo($member->last_name) ?><br>

                                            <label for="family_name_kana">カナ（姓）</label><span></span>
                                            <?php echo($member->family_name_kana) ?><br>
                                            
                                            <label for="last_name_kana">カナ（名）</label><span></span>
                                            <?php echo($member->last_name_kana) ?><br>

                                            <label for="mail">メールアドレス</label><span></span>
                                            <?php echo($member->mail) ?><br>

                                            <p class="pw2">パスワード※半角英数字のみ入力可<br>新しいパスワードを入力してください</p>
                                            <input type="password" name="password" id="password" maxlength="10"
                                            pattern="^[a-zA-Z0-9]+$" title="半角英数字でご入力ください"
                                            value=><br>
                                            <span class="err-msg-password"></span>
                                             <br>
                                            
                                            
                                            <?php
                                            // $pw = ($member->password) ;
                                            // echo str_repeat('⚫︎', mb_strlen($pw, 'UTF8'));
                                            ?>

                                            <label for="gender">性別</label><span></span>
                                            <?php
                                                error_reporting(0);
                                                if ($gender == 0) {
                                                    echo "男";
                                                    }else{
                                                            echo "女";
                                                    }
                                                ?><br>

                                            <label for="郵便番号">郵便番号</label><span></span>
                                            <?php print($member->postal_code) ?><br>
                                            
                                            <div class="prefecture1">
                                                <label for="住所（都道府県）">住所（都道府県）</label><span></span>
                                                <?php print('<option value="'.$member->prefecture.'">'.$member->prefecture.'</option>') ?><br>
                                            </div><br>
                                            <label for="住所（市区町村）">住所（市区町村）</label><span></span>
                                            <?php print($member->address_1) ?><br>
                                            <label for="住所（市区町村）">住所（番地）</label><span></span>
                                            <?php print($member->address_2) ?><br>

                                            <label for="アカウント権限">アカウント権限</label><span></span>
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
                        </form> 
                </div>
        </div>
    </main>

    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   
    <script type="text/javascript" src="app3.js"></script>   
</body>
</html>


