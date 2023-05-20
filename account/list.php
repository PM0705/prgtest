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
    <?php
    mb_internal_encoding("utf8");
    $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
    $stmt= $pdo->query("select*from diblog_account");
    ?>
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
    <?php
            while ($row = $stmt -> fetch()) {
           
            echo $row['id'];
            echo $row['family_name'];
            echo $row['last_name'];
            echo $row['family_name_kana'];
            echo $row['last_name_kana'];
            echo $row['mail'];
            echo $row['password'];
            echo $row['gender'];
            echo $row['postal_code'];
            echo $row['prefecture'];
            echo $row['address_1'];
            echo $row['address_2'];
            echo $row['authority'];
            echo $row['delete_flag'];
            echo $row['registered_time'];
            echo $row['update_time'];
            }
    ?>
           <td>
               <button type="button" class="btn btn-green" onclick="location.href='update.php?id=<?php echo $new['id']; ?>'">編集</button>
               <button type="button" class="btn btn-red">削除</button>
           </td>
           
    
                                
                                
                             
                      
                    
    </main>
    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


