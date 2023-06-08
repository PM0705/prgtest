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
   
    //データベースへ接続
    $dsn = "mysql:dbname=lesson01;host=localhost;charset=utf8mb4";
    $username = "root";
    $password = "root";
    $options = [];
    $pdo = new PDO($dsn, $username, $password, $options);
        if($_POST["family_name"] != "" || @$_POST["last_name"] != ""){ //IDおよびユーザー名の入力有無を確認
            $stmt = $pdo->query("SELECT * FROM diblog_account WHERE  last_name LIKE  '%".$_POST["last_name"]."%' ORDER BY id DESC"); //SQL文を実行して、結果を$stmtに代入する。
        }
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

    <div class="kizi1">
        <h3> アカウント一覧</h3>
        <form action="list.php" method="post">
            <table>
                <thead>
                    <tr>
                
                        <th>名前（姓）</th>
                        <td>
                        <input type="text" name="family_name" id="family_name" maxlength="10" 
                            pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*"
                            title="漢字・ひらがなでご入力ください"><br>
                        
                        <th>名前（名）</th>
                        <td>
                        <input type="text" name="last_name" id="last_name" maxlength="10"
                            pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" title="漢字・ひらがなでご入力ください"><br>
                        </td>
                    </tr>
                    <tr>
                        
                        <th>カナ（姓）</th>
                        <td>
                        <input type="text" name="family_name_kana" id="family_name_kana" maxlength="10"
                            pattern="^[\u30A0-\u30FF]+$" title="全角カタカナでご入力ください"><br>
                        </td>
                        <th>カナ（名）</th>
                        <td>
                        <input type="text" name="last_name_kana" id="last_name_kana" maxlength="10"
                            pattern="^[\u30A0-\u30FF]+$" title="全角カタカナでご入力ください"><br>
                        </td>


    
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                        <input type="text" name="mail" id="mail" maxlength="100"
                            pattern="^[\w\d\-_-]+@[\w\d_-]+\.[\w\d._-]+$" title="半角英数字、半角ハイフンでご入力ください">
                        </td>
                        <th>性別</th>
                        <td>
                        <div class="radiogender">
                        <input type="radio" name="gender" value="0" checked>男
                        <input type="radio" name="gender" value="1">女
                        </div>
                        </td>

                    </tr>
                    <tr>
                        
                        <th>アカウント権限</th>
                        <td>
                        <select name="authority" id="authority" value=array()>
                            <option value="0">一般</option>
                            <option value="1">管理者</option>
                        </select><br>
                        </td>
    
                    </tr>
                </thead>

            </table>
            <div class="contact-submit">
                <div>
                    <input type="submit" class="submit" value="検索する">
                </div>
            </div>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>名前（姓）</th>
                <th>名前（名）</th>
                <th>カナ（姓）</th>
                <th>メールアドレス</th>
                <th>性別</th>
                <th>アカウント権限</th>
                
            </tr>
            <!-- ここでPHPのforeachを使って結果をループさせる -->
            <?php foreach ($stmt as $row): ?>
            <tr><td>
                    <?php echo $row['id']?>
                </td>
                <td>
                    <?php echo $row['family_name']?>
                </td>
                <td>
                    <?php echo $row['last_name']?>
                </td>
                <td>
                    <?php error_reporting(0);
                            if ($row['gender'] == 0) {
                                echo "男";
                                }else{
                                        echo "女";
                                }?>
                </td>
                <td>
                    <?php error_reporting(0);
                        if ($row['authority'] == 0) {
                            echo "一般";
                            }else{
                                    echo "管理者";
                            }?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>

    </div>
    


    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app2.js"></script>   
</body>
</html>


