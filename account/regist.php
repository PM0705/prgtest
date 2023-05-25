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
        
        <div class="main-container">
            <div class="left">
                <h3>入力フォーム</h3>
                <form method="post" action="regist_confirm.php" name="form" autocomplete="off" >
                    <div class="contact-form errorMsg">
                        
                                <!-- お名前 -->
                            
                                <dl>
                                    <dt><label for="family_name">名前（姓）※漢字・ひらがなのみ可</label></dt>
                                    <dd><input type="text" name="family_name" id="family_name" maxlength="10" 
                                               pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*"
                                               title="漢字・ひらがなでご入力ください"><br>
                                        <span class="err-msg-family_name"></span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><label for="last_name">名前（名）※漢字・ひらがなのみ可</label></dt>
                                    <dd><input type="text" name="last_name" id="last_name" maxlength="10"
                                               pattern="[\u4E00-\u9FFF\u3040-\u309Fー]*" title="漢字・ひらがなでご入力ください"><br>
                                        <span class="err-msg-last_name"></span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><label for="family_name_kana">カナ（姓）※全角カタカナのみ可</label></dt>
                                    <dd><input type="text" name="family_name_kana" id="family_name_kana" maxlength="10"
                                               pattern="^[\u30A0-\u30FF]+$" title="全角カタカナでご入力ください"><br>
                                        <span class="err-msg-family_name_kana"></span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><label for="last_name_kana">カナ（名）※全角カタカナのみ可</label></dt>
                                    <dd><input type="text" name="last_name_kana" id="last_name_kana" maxlength="10"
                                               pattern="^[\u30A0-\u30FF]+$" title="全角カタカナでご入力ください"><br>
                                        <span class="err-msg-last_name_kana"></span>
                                    </dd>
                                </dl>
                                <!-- mail -->
                                <dl>
                                    <dt><label for="mail">メールアドレス<br>※半角英数字、半角ハイフンのみ可</label></dt>
                                    <dd><input type="email" name="mail" id="mail" maxlength="100"
                                               pattern="^[\w\d\-_-]+@[\w\d_-]+\.[\w\d._-]+$" title="半角英数字、半角ハイフンでご入力ください"><br>
                                        <span class="err-msg-mail"></span>
                                    </dd>
                                </dl>
                                <!-- パスワード -->
                                <dl>
                                    <dt><label for="password">パスワード※半角英数字のみ入力可</label></dt>
                                    <dd><input type="password" name="password" id="password" maxlength="10"
                                               pattern="^[a-zA-Z0-9]+$" title="半角英数字でご入力ください"><br>
                                        <span class="err-msg-password"></span>
                                    </dd>
                                </dl>
                                <!-- 性別 -->
                                <dl>
                                    <dt><label for="性別">性別</label></dt>
                                    <dd><label><input type="radio" name="gender" value="0" checked>男</label>
                                        <label><input type="radio" name="gender" value="1">女</label>
                                        <span class="err-msg-gender"></span>
                                    </dd>
                                  
                                </dl>
                                <!-- 郵便番号 -->
                                <dl>
                                    <dt><label for="郵便番号">郵便番号※半角数字のみ</label></dt>
                                    <dd><input type=tel class="text" size="35" id="postal_code" name="postal_code" maxlength="7"
                                               pattern="^[\d]+$"title="半角数字でご入力ください"><br>
                                    <span class="err-msg-postal_code"></span>
                                </dd>
                                </dl>
                                <!-- 住所（都道府県） -->
                                <dl>
                                    <dt><label for="住所（都道府県）">住所（都道府県）</label><br></dt>
                                    <dd><select name="prefecture"id="prefecture">
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
                                        </select><br>
                                        <span class="err-msg-prefecture"></span>
                                    </dd>
                                </dl>
                                <!-- 住所（市区町村） -->
                                <dl>
                                    <dt><label for="住所（市区町村）">住所（市区町村）<br>※ひらがな、漢字、数字、全角カタカナ、記号（-/スペース）のみ可</label></dt>
                                    <dd><input type="text" class="text hira_change" size="35" name="address_1"id="address_1"
                                               pattern="[\d\u30A1-\u30F6\u4E00-\u9FFF\u3040-\u309Fー\s　\-]*" maxlength="10" title="ひらがな、漢字、数字、カタカナ、記号（-/スペース）でご入力ください"><br>
                                        <span class="err-msg-address_1"></span>
                                    </dd>
                                </dl>
                                <!-- 住所（番地） -->
                                <dl>
                                    <dt> <label for="住所（番地）">住所（番地）<br>※ひらがな、漢字、数字、全角カタカナ、記号（-/スペース）のみ入力可</label></dt>
                                    <dd><input type="text" class="text" size="35" name="address_2"id="address_2"
                                               pattern="[\d\u30A1-\u30F6\u4E00-\u9FFF\u3040-\u309Fー\s　\-]*" maxlength="100" title="ひらがな、漢字、数字、カタカナ、記号（-/スペース）でご入力ください"><br>
                                    <span class="err-msg-address_2"></span>
                                    </dd>
                                </dl>
                                <!-- アカウント権限 -->
                                <dl>
                                    <dt><label for="アカウント権限">アカウント権限</label></dt>
                                    <dd><select name="authority"id="authority" value=array()>
                                            <option value="0">一般</option>
                                            <option value="1">管理者</option>
                                        </select><br>
                                        <span class="err-msg-authority"></span>
                                    </dd>
                                </dl>
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
    <script type="text/javascript" src="app2.js"></script> 
</body>
</html>


