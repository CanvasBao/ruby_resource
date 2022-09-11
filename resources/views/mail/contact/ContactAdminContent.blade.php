<html>

<body>
    <div class="content_mail">
        ※Mail này đã được gửi từ trang web {{$company}}.<br />
        <br />
        Họ và Tên: {{ $user_name }}<br>
        Tên Công Ty: {{ $user_company }}<br>
        E-mail: {{ $user_mail }}<br>
        Số điện thoại: {{ $user_phone }}<br>
        Nội dung liên hệ:<br>
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