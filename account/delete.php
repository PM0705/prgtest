<?php
    mb_internal_encoding("utf8");
    $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
    $stmt= $pdo->query("select*from diblog_account ORDER BY id DESC");
    ?>
<?php

// 登録データ取得
$post_datas = $action->getDbPostData();

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



    <h1>アカウント削除画面</h1>
    <!-- 投稿表示エリア -->
    <?php if (!empty($post_datas)) {?>
        <table width="100%" border="1">
            <tr>
                <th>名前</th>
                <th>内容</th>
                <th>日付</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            <?php foreach ($post_datas as $post) { ?>
                <tr>
                    <td>
                        <?php if (!empty($post["email"])) {?><a href="mailto:
                            <?php echo $post["email"];?>"><?php } ?>
                            <?php echo $post["family_name"];?>
                            <?php if (!empty($post["email"])) {?></a><?php }
                        ?>
                    </td>
                    <td><?php echo mb_substr($post["body"], 0,  15);?>..</td>
                    <td><?php echo $post["created_at"];?></td>
                    <td align="center" valign="middle">
                        <form action="./index.php" method="post">
                            <input type="hidden" name="eventId" value="edit">
                            <input type="hidden" name="id" value="<?php echo $post["id"];?>">
                            <input type="submit" value="変更">
                        </form>
                    </td>
                    <td align="center" valign="middle">
                        <form action="./index.php" method="post">
                            <input type="hidden" name="eventId" value="delete">
                            <input type="hidden" name="id" value="<?php echo $post["id"];?>">
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    <!-- // 投稿表示エリア -->
    <hr>
    <p><a href="./">掲示板に戻る</a></p>
</body>
</html>
         
    </main>
    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


