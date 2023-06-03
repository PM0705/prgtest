<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録画面</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/registstyle2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    mb_internal_encoding("utf8");
    $pdo= new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
    $stmt= $pdo->query("select*from diblog_account ORDER BY id DESC");
    // 無効のみ表示する時$stmt= $pdo->query("select*from diblog_account  where delete_flag = '1' ORDER BY id DESC");
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
    <div class="kizi">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前（姓）</th>
                    <th>名前（名）</th>
                    <th>カナ（姓）</th>
                    <th>カナ（名）</th>
                    <th>メールアドレス</th>
                    <th>性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $stmt -> fetch()) : ?>
                <tr>
                    <td><?php print($row['id']); ?></td>
                    <td><?php print($row['family_name']); ?></td>
                    <td><?php print($row['last_name']); ?></td>
                    <td><?php print($row['family_name_kana']); ?></td>
                    <td><?php print($row['last_name_kana']); ?></td>
                    <td><?php print($row['mail']); ?></td>
                    <td><?php 
                            switch ($row['gender']) {
                                    case '0':
                                        echo "男";
                                        break;
                                    
                                    default:
                                        echo "女";
                                        break;
                            } 
                        ?>
                    </td>
                    <td><?php 
                            switch ($row['authority']) {
                                    case '0':
                                        echo "一般";
                                        break;
                                    
                                    default:
                                        echo "管理者";
                                        break;
                            } 
                        ?>
                    </td>
                    <td><?php switch ($row['delete_flag']) {
                                    case '0':
                                        echo "有効";
                                        break;
                                    
                                    default:
                                        echo "無効";
                                        break;
                            } 
                            // switch ($row['delete_flag']) {
                            //         case '0':
                            //             echo "有効";
                            //             break;
                                    
                            //         default:
                            //             echo "無効";
                            //             break;
                            // } 
                        ?>
                    </td>
                    <td>
                        <?php
                             error_reporting(0);
                             echo date('Y/m/d', strtotime($row['registered_time']));
                        ?>
                    </td>
                    <td>
                        <?php 
                             echo date('Y/m/d', strtotime($row['update_time']));
                        ?>
                    </td>
                    <td>
                        <!-- ★追加：削除★ -->
                        <a href="update.php?id=<?php echo($row['id']) ?>">更新</a>
                        <a href="delete.php?id=<?php echo($row['id']) ?>">削除</a>
                        <a href="pw.php?id=<?php echo($row['id']) ?>">パスワード変更</a>
                        
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


