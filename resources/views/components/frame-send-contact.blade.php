<link href="{{ asset('assets/css/guest/frame-send-contact.css') }}" rel="stylesheet">
<div class="row mt-5 justify-content-center" data-aos="fade-up">
    <div class="col-lg-10">
        <h2 class="my-4">Liên hệ với chúng tôi</h2>
        <form action="contact" method="post" role="form" class="send-contact-frame">
        @csrf
        <div class="form-row">
            <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="required" data-msg="hãy nhập HỌ VÀ TÊN của bạn" />
            <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:10" data-msg="hãy nhập SỐ ĐIỆN THOẠI của bạn" />
            <div class="validate"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 form-group">
            <input type="text" name="company" class="form-control" id="company" placeholder="Your Company" data-rule="required" data-msg="hãy nhập TÊN CÔNG TY của bạn" />
            <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="hãy nhập EMAIL của bạn" />
            <div class="validate"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="hãy nhập TIÊU ĐỀ và ít nhất là 8 kí tự" />
            <div class="validate"></div>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="hãy nhập NỘI DUNG bạn muốn gửi" placeholder="Message"></textarea>
            <div class="validate"></div>
        </div>
        <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Liên hệ của bạn đã được gửi đi.<br>Chúng tôi sẽ xác nhận và liên lạc lại trong thời gian sớm nhất. Cảm ơn!</div>
        </div>
        <div class="text-center"><button type="submit">Gửi Liên Hệ</button></div>
        </form>
    </div>
</div>
<script src="{{ asset('assets/js/guest/send-contact.js') }}"></script>
