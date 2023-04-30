<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DI掲示板を作る</title>
    <meta name="description" content="sanple sanple sanple sanple sanple">
    <link rel="stylesheet" href="CSS/sanitize.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="img/diblog_logo.jpg" alt="DIworksのロゴ" class="img">
        <div class="menu">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>D .I .Bligについて</li>
                <li><a href="">アカウント登録フォーム</a></li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
    </header>
    <main>
        <div class="main-container">
            <div class="left">
                <h1>プログラミングに役立つ書籍</h1>
                <h3>入力フォーム</h3>
                <form method="post" action="mail_confirm.php">
                    <div>
                        <label for="ハンドルネーム">ハンドルネーム</label><br>
                        <input type="text" class="text" size="35" name="handlename">
                    </div>
                    <div>
                        <label for="タイトル">タイトル</label><br>
                        <input type="text" class="text" size="35" name="title">
                    </div>
                    <div>
                        <label for="コメント">コメント</label>
                        <br>
                        <textarea name="comments" cols="300" rows="10"></textarea>
                    </div>
                    <div>
                        <input type="submit" class="submit"value="投稿する">
                    </div>
            
                </form>
            </div>
        </div>
        
        <div class="right">
                <h3 class="right-nikkititle">人気の記事</h3>
                <div class="right-nikkititle-list">PHPオススメの本</div>
                <div class="right-nikkititle-list">PHP MyAdminの使い方</div>
                <div class="right-nikkititle-list">いま人気のエディタTops</div>
                <div class="right-nikkititle-list">HTMLの基礎</div>
                <h3 class="right-nikkititle">オススメリンク</h3>
                <div class="right-nikkititle-list">ﾃﾞｨｰｱｲﾜｰｸｽ株式会社</div>
                <div class="right-nikkititle-list">XAMPPのダウンロード</div>
                <div class="right-nikkititle-list">Eclipseのダウンロード</div>
                <div class="right-nikkititle-list">Braketsのダウンロード</div>
                <h3 class="right-nikkititle">カテゴリ</h3>
                <div class="right-nikkititle-list">HTML</div>
                <div class="right-nikkititle-list">PHP</div>
                <div class="right-nikkititle-list">My SQL</div>
                <div class="right-nikkititle-list">JavaScript</div>
        </div>
    
    </main>
    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>

    <script src="./js/app.js"></script>
</body>
</html>


