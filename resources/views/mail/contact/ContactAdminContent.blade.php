<html>

<body>
    <div class="content_mail">
        ※{{ $company }}サイトより以下のお問い合わせメールが届いています。<br />
        <br />
        お名前：{{ $last_name }}&nbsp;{{ $first_name }}<br>
        フリガナ：{{ $last_name_kana }}&nbsp;{{ $first_name_kana }}<br>
        メールアドレス：{{ $user_mail }}<br>
        電話番号：{{ $user_phone }}<br>
        お問い合わせ内容：<br>
        {!! $content !!}
        <div>
</body>

</html>
<style>
    .content_mail {
        padding: 20px;
        background: #ffffff;
        color: #000000;
        font-size: 15px;
    }

    hr {
        width: 70%;
        max-width: 350px;
        border: none;
        height: 1px;
        color: #000000;
        background-color: #000000;
        margin-left: 0;
    }

    p {
        margin-bottom: 0;
        font-size: 15px;
        line-height: 1.2;
    }
</style>