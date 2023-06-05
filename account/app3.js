window.addEventListener('DOMContentLoaded', () => {

    // 「送信」ボタンの要素を取得
    const submit = document.querySelector('.submit');
    
    // 「送信」ボタンの要素にクリックイベントを設定する
    submit.addEventListener('click', (e) => {
        // デフォルトアクションをキャンセル
        // e.preventDefault();
        //変数にerror_flag
        let error_flag = false;

// 「パスワード」入力欄の空欄チェック
        // フォームの要素を取得
        const password = document.querySelector('#password');
        // エラーメッセージを表示させる要素を取得
        const errMsgpassword= document.querySelector('.err-msg-password');
        if(!password.value){
            // クラスを追加(エラーメッセージを表示する)
            errMsgpassword.classList.add('form-invalid');
            // エラーメッセージのテキスト
            errMsgpassword.textContent = 'パスワードが未入力です。';
            // クラスを追加(フォームの枠線を赤くする)
            password.classList.add('input-invalid');
            // 後続の処理を止める
            error_flag = true;
           
        }else{
            // エラーメッセージのテキストに空文字を代入
            errMsgpassword.textContent ='';
            // クラスを削除
            password.classList.remove('input-invalid');
        }
         //error_flag = true;があるところにこの関数を実行
         if (error_flag) {
            // 後続の処理を止める
            e.preventDefault();
            
        }
        
    }, false);
}, false);
