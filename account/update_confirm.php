
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント更新確認画面</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/confirm.css">
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
        <h1>アカウント更新確認画面</h1>
        <div class="confirm">
            <p>名前（姓）<span></span>
            
            <?php
            echo $_POST['family_name'];
            ?>
            </p>
            <p>名前（名） <span></span>
            
            <?php
            echo $_POST['last_name'];
            ?>
            </p>
            <p>カナ（姓）<span></span>
            
            <?php
            echo $_POST['family_name_kana'];
            ?>
            </p>
            <p>カナ（名）<span></span>
            
            <?php
            echo $_POST['last_name_kana'];
            ?>
            </p>
            <p>メールアドレス<span></span>
            
            <?php
            echo $_POST['mail'];
            ?>
            </p>
            <p>パスワード<span></span>
            
            <?php
            $pw = $_POST['password'];
            echo str_repeat('⚫︎', mb_strlen($pw, 'UTF8'));
            
            ?>
            
            </p>
            <p>性別<span></span>
            
            <?php
            error_reporting(0);
            if ($gender == 0) {
                echo "男";
                }else{
                        echo "女";
                }
            ?>
            </p>
            <p>郵便番号<span></span>
            
            <?php
            echo $_POST['postal_code'];
            ?>
            </p>
            <p>住所（都道府県）<span></span>
            
            <?php
            echo $_POST['prefecture'];
            ?>
            </p>
            <p>住所（市区町村）<span></span>
            
            <?php
            echo $_POST['address_1'];
            ?>
            </p>
            <p>住所（番地）<span></span>
            
            <?php
            echo $_POST['address_2'];
            ?>
            </p>
            <p>アカウント権限<span></span>
            
            <?php
            error_reporting(0);
            if ($authority == 0) {
                echo "一般";
                }else{
                        echo "管理者";
                }
            ?>
            </p>
            <div class="form1">
                <form action="update.php">
                    <!-- <input type="submit" class="button1" value="前に戻る"> -->
                    <button type="button" class="button1" value="前に戻る" onclick=history.back()>
                            前に戻る
                    </button>
                </form>
                <!-- 更新する・前に戻る -->
                

                <form action="update_complete.php" method="post">
                
                    <input type="submit" class="button2" value="更新する"href="update_complete.php<? $result['id'] ?>" name="btnSend">
                    <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                    <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
                    <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
                    <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
                    <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
                    <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                    <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                    <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
                    <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
                    <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                    <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                    <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                    <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">

                    
                </form>
            </div> 
        </div>
    </main>



</body>


         

    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


