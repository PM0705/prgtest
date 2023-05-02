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
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
    </header>
    <main>
        <div class="main-container">
            <div class="left">
                
                <h3>入力フォーム</h3>
                <form method="post" action="regist_confirm.php">
                    <div>
                        <label for="名前（姓）">名前（姓）※漢字・ひらがなのみ可</label><br>
                        <input type="text" class="text" size="35" name="family_name"
                               pattern="[\u3041-\u3096]*"maxlength="10">
                           
                    </div>
                    <div>
                        <label for="名前（名）">名前（名）※漢字・ひらがなのみ可</label><br>
                        <input type="text" class="text" size="35" name="last_name"maxlength="10">
                    </div>
                    <div>
                        <label for="カナ（姓）">カナ（姓）※全角カタカナのみ可</label><br>
                        <input type="text" class="text hira_change" size="35" name="family_name_kana"
                               pattern="[\u30A1-\u30F6]*"maxlength="10">
                    </div>
                    <div>
                        <label for="カナ（名）">カナ（名）※全角カタカナのみ可</label><br>
                        <input type="text" class="text hira_change" size="35" name="last_name_kana"
                               pattern="[\u30A1-\u30F6]*"maxlength="10">
                    </div>
                    <div>
                        <label for="メールアドレス">メールアドレス<br>※半角英数字、半角ハイフン、半角記号（ハイフンとアットマーク）のみ可</label><br>
                        <input type=”email” class="text" size="35" name="mail"maxlength="100">
                    </div>
                    <div>
                        <label for="パスワード">パスワード※半角英数字のみ入力可</label><br>
                        <input type="password" class="text" size="35" name="password"maxlength="10"	 pattern=^[0-9A-Za-z]+$>
                    </div>
                    <div>
                        <label for="性別">性別</label><br>
                        <input type="radio" name="gender" id="gender" value="0">男
                        <input type="radio" name="gender" id="gender" value="1">女
                    </div>
                    <div>
                        <label for="郵便番号">郵便番号※半角数字のみ</label><br>
                        <input type=”number” class="text" size="35" name="postal_code">
                    </div>
                    <div>
                        <label for="住所（都道府県）">住所（都道府県）</label><br>
                        <select name="prefecture">
                            <?php
                            $prefs = array ('','北海道','青森県','岩手県','宮城県','秋田県','山形県',
                                            '福島県','茨城県','栃木県','群馬県','埼玉県','千葉県',
                                            '東京都','神奈川県','山梨県','新潟県','富山県','石川県',
                                            '福井県','長野県','岐阜県','静岡県','愛知県','三重県',
                                            '滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県',
                                            '鳥取県','島根県','岡山県','広島県','山口県','徳島県',
                                            '香川県','愛媛県','高知県','福岡県','佐賀県','長崎県',
                                            '熊本県','大分県','宮崎県','鹿児島県','沖縄県');
                            foreach($prefs as $pref){
                            print('<option value="'.$pref.'">'.$pref.'</option>');
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="住所（市区町村）">住所（市区町村）※ひらがな、漢字、数字、カタカナ、記号（ハイフンとスペース）のみ入力可</label><br>
                        <input type="text" class="text" size="35" name="address_1"maxlength="10">
                    </div>
                    <div>
                        <label for="住所（番地）">住所（番地）※ひらがな、漢字、数字、カタカナ、記号（ハイフンとスペース）のみ入力可</label><br>
                        <input type="text" class="text" size="35" name="address_2"maxlength="100">
                    </div>
                    <div>
                        <label for="アカウント権限">アカウント権限</label><br>
                        <select name="authority">
                            <?php
                            $prefs = array ('一般','管理者',
                                            );
                            foreach($prefs as $pref){
                            print('<option value="'.$pref.'">'.$pref.'</option>');
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div>
                        <input type="submit" class="submit"value="確認する">
                    </div>
            
                </form>
            </div>
        </div>
        
        
    
    </main>
    <footer>
        <p class="footer-text">Copyright D.I.worksI D.I.blog is the one which provides A to Z about programming</p>
    </footer>

    <script src="app.js"></script>
</body>
</html>


