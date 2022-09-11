<html>
 
<body>
    <div class="content_mail">
        ※Này là e-mail được gửi tự động từ hệ thống。<br />
        <br />
        Chào anh(chị) {{ $user_name }}<br />
        <br />
        Kính chào quý khách!<br />
        Cảm ơn bạn đã ghé thăm trang web {{$company}}.<br />
        Chúng tôi đã nhận được yêu cầu của quý khách như bên dưới.<br />
        Chúng tôi sẽ trả lời qua e-mail ngay khi sẵn sàng. <br />
        Làm ơn đợi một chút.<br />
        <br />
        Họ và Tên：{{ $user_name }}<br>
        Tên Công ty：{{ $user_company }}<br>
        E-mail：{{ $user_mail }}<br>
        Số điện thoại：{{ $user_phone }}<br>
        Nội dung liên hệ：<br>
        {!! $content !!}<br />
        <br />
        ===============================<br />
        {{ $company }}<br />
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