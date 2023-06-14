<?php
session_start();
var_dump($_SESSION);


//セッションを使うことを宣言
session_start();

//ログインされていない場合は強制的にログインページにリダイレクト
if (!isset($_SESSION["mail"])) {
  header("Location: login.php");
  exit();
}

//ログインされている場合は表示用メッセージを編集
$message = $_SESSION['mail']."さんようこそ";
$message1 = $_SESSION['family_name']."さんようこそ";
$authority = $_SESSION['authority']."さんようこそ";
$coution = "権限がないので操作できません";



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
        if ((empty($_POST["family_name"])) && (empty($_POST["last_name"])) && (empty($_POST["family_name_kana"])) && (empty($_POST["last_name_kana"]))){
            $stmt = $pdo->query("SELECT * FROM diblog_account where delete_flag = '0' ORDER BY id DESC"); //SQL文を実行して、結果を$stmtに代入する。
        }
        error_reporting(0);
        if($_POST["family_name"] != "" || $_POST["last_name"] != "" || $_POST["family_name_kana"] != "" || $_POST["last_name_kana"] != "" || $_POST["gender"] != "" || $_POST["authority"] != "" ){ //IDおよびユーザー名の入力有無を確認
            $stmt = $pdo->query("SELECT * FROM diblog_account WHERE family_name LIKE  '%".$_POST["family_name"]."%' 
                                                                    AND last_name LIKE  '%".$_POST["last_name"]."%' 
                                                                    AND family_name_kana LIKE  '%".$_POST["family_name_kana"]."%' 
                                                                    AND last_name_kana LIKE  '%".$_POST["last_name_kana"]."%' 
                                                                    AND gender LIKE  '%".$_POST["gender"]."%' 
                                                                    AND authority LIKE  '%".$_POST["authority"]."%' 
                                                                    ORDER BY id DESC"); //SQL文を実行して、結果を$stmtに代入する。
        }
      

        ?>

        

    <header>
        <img src="img/diblog_logo.jpg" alt="DIworksのロゴ" class="img">
        <div class="menu">
            <ul>
                <?php if ($_SESSION['authority'] == 0):?>

                <li><a href="index.html">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="login.php">ログイン</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
                <li><div><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div></li>
                <li><div><?php echo htmlspecialchars($message1, ENT_QUOTES); ?></div></li>
                <li><div><?php echo htmlspecialchars($authority, ENT_QUOTES); ?></div></li>

                <?php else :?>
                <li><a href="index.html">トップ</a></li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="regist.php">アカウント登録フォーム</a></li>
                <li><a href="list.php">アカウント一覧</a></li>
                <li><a href="login.php">ログイン</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
                <li><div><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div></li>
                <li><div><?php echo htmlspecialchars($message1, ENT_QUOTES); ?></div></li>
                <li><div><?php echo htmlspecialchars($authority, ENT_QUOTES); ?></div></li>
                <!-- endifとセミコロンで閉じる -->
                <?php endif; ?>

            </ul>
        </div>
    </header>

    <div class="kizi1">
        <h3>アカウント一覧</h3>
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
                    <th>カナ（名）</th>
                    <th>メールアドレス</th>
                    <th>性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th ><br>操作<br><p class="dl">※管理者の方のみ操作可能</p></th>
                
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
                    <?php echo $row['family_name_kana']?>
                </td>
                <td>
                    <?php echo $row['last_name_kana']?>
                </td>
                <td>
                    <?php echo $row['mail']?>
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
                        <?php if ($_SESSION["authority"] == 1) : ?>
                       
                        <button type="button"  onclick="location.href='update.php?id=<?php echo($row['id']) ?>'">更新</button>
                        <button type="button"  onclick="location.href='delete.php?id=<?php echo($row['id']) ?>'">削除</button>
                        <button type="button"  onclick="location.href='pw.php?id=<?php echo($row['id']) ?>'">パスワード変更</button>
                        <?php else : ?>
                       
                        <button type="button"  onclick="clickDisplayAlert()">更新</button>
                        <button type="button"  onclick="clickDisplayAlert()">削除</button>
                        <button type="button"  onclick="clickDisplayAlert()">パスワード変更</button>
                        <?php endif; ?>
                        
                        
                    </td>
            </tr>
        <?php endforeach; ?>
        </table>

    </div>




    <?php
   
    //データベースへ接続
    $dsn = "mysql:dbname=lesson01;host=localhost;charset=utf8mb4";
    $username = "root";
    $password = "root";
    $options = [];
    $pdo = new PDO($dsn, $username, $password, $options);
        if ((empty($_POST["family_name"])) && (empty($_POST["last_name"])) && (empty($_POST["family_name_kana"])) && (empty($_POST["last_name_kana"]))){
            $stmt = $pdo->query("SELECT * FROM diblog_account where delete_flag = '1' ORDER BY id DESC"); //SQL文を実行して、結果を$stmtに代入する。
        }
        error_reporting(0);
        if($_POST["family_name"] != "" || $_POST["last_name"] != "" || $_POST["family_name_kana"] != "" || $_POST["last_name_kana"] != "" || $_POST["gender"] != "" || $_POST["authority"] != "" ){ //IDおよびユーザー名の入力有無を確認
            $stmt = $pdo->query("SELECT * FROM diblog_account WHERE family_name LIKE  '%".$_POST["family_name"]."%' 
                                                                    AND last_name LIKE  '%".$_POST["last_name"]."%' 
                                                                    AND family_name_kana LIKE  '%".$_POST["family_name_kana"]."%' 
                                                                    AND last_name_kana LIKE  '%".$_POST["last_name_kana"]."%' 
                                                                    AND gender LIKE  '%".$_POST["gender"]."%' 
                                                                    AND authority LIKE  '%".$_POST["authority"]."%' 
                                                                    ORDER BY id DESC"); //SQL文を実行して、結果を$stmtに代入する。
        }
      

        ?>
    <div class="kizi1">
        <h3>削除済みアカウント一覧</h3>

        <table>
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
                    <th ><br>操作<br><p class="dl">※削除済みの為操作できません</p></th>
                
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
                    <?php echo $row['family_name_kana']?>
                </td>
                <td>
                    <?php echo $row['last_name_kana']?>
                </td>
                <td>
                    <?php echo $row['mail']?>
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
                        <p class="dl_sousa">更新 削除 パスワード変更</p>
                        
                    </td>
            </tr>
        <?php endforeach; ?>
        </table>

    </div>
    


    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="app5.js"></script>   
</body>
</html>


