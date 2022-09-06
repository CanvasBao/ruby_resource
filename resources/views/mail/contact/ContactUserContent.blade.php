<html>
 
<body>
    <div class="content_mail">
        ※このメールはシステムからの自動返信です。<br />
        <br />
        {{ $last_name }}&nbsp;{{ $first_name }} 様<br />
        <br />
        お世話になっております。<br />
        この度は、{{ $company }}サイトへご訪問いただき誠にありがとうございます。<br />
        下記の通りお問合せをお受けいたしました。<br />
        準備ができ次第、メールにてご返答させていただきます。<br />
        しばらくお待ちくださいませ。<br />
        <br />
        お名前：{{ $last_name }}&nbsp;{{ $first_name }}<br>
        フリガナ：{{ $last_name_kana }}&nbsp;{{ $first_name_kana }}<br>
        メールアドレス：{{ $user_mail }}<br>
        電話番号：{{ $user_phone }}<br>
        お問い合わせ内容：<br>
        {!! $content !!}<br />
        <br />
        ===============================<br />
        {{ $company }}<br />
        〒{{ $company_postcode }}<br />
        {{ $company_address }}<br />
        TEL{{ $company_tel }}<br />
        ===============================
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