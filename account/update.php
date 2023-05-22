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
    <?php foreach($news as $new): ?>
           <tr>
               <td><?php echo $new['id']; ?></td>
               <td><?php echo $new['family_name']; ?></td>
               <td><?php echo $new['last_name']; ?></td>
               <td><?php echo $new['family_name_kana']; ?></td>
               <td><?php echo $new['last_name_kana']; ?></td>
               <td><?php echo $new['mail']; ?></td>
               <td><?php echo $new['password']; ?></td>
               <td> <?php
                        error_reporting(0);
                        if ($gender == 0) {
                            echo "男";
                            }else{
                                    echo "女";
                            }
                    ?>
                </td>
               <td><?php echo $new['postal_code']; ?></td>
               <td><?php echo $new['prefecture']; ?></td>
               <td><?php echo $new['address_1']; ?></td>
               <td><?php echo $new['address_2']; ?></td>
               <td><?php echo $new['authority']; ?></td>
               <td><?php echo $new['delete_flag']; ?></td>
               <td><?php echo $new['registered_time']; ?></td>
               <td><?php echo $new['update_time']; ?></td>
               <td>
                   <button type="button" class="btn btn-green" onclick="location.href='edit_news.php?id=<?php echo $new['id']; ?>'">編集</button>
                   <button type="button" class="btn btn-red">削除</button>
               </td>
               
           </tr>
    <?php endforeach; ?>
                                
                                
                             
                      
                    
    </main>
    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


