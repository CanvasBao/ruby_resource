@extends('admin.master')

@section('main')
<link href="{{ asset('assets/css/admin/about.css') }}" rel="stylesheet">
<form id="update-form" action="about" class="form-horizontal form-material" method="POST">
  @csrf
  @method('PUT')
<div class="row">
  <!-- Column -->
  <div class="col-lg-4 col-xlg-3 col-md-12">
      <div class="white-box">
          <div class="logo-update-bg">
            <div class="overlay-box">
          <img width="100%" class="old-logo-img" src="{{ asset($about['logo_path'] ?? '') }}">
          <img width="100%" class="new-logo-img" src="" style="display: none">
        </div>
          </div>
          <div class="user-btm-box mt-5 d-md-flex">
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="logo-img" id="logoInput">
                <label class="custom-file-label logo-file-name" for="logoInput">Chọn hình ảnh logo</label>
              </div>
            </div>
          </div>
      </div>
  </div>
  <div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group mb-4">
          <h5 class="input-title"><label class="col-md-12 p-0">Tên Công Ty</label></h5>
          <div class="col-md-12 mb-4 border-bottom p-0 company-name-box">
              <input type="text" value="{{ $about['company_name'] }}"
              class="form-control p-0 border-0" name="company_name"></div>
        </div>
        <div class="form-group mb-4">
          <h5 class="input-title"><label class="col-md-12 p-0">Mô tả</label></h5>
          <div class="col-md-12 border-bottom p-0">
              <textarea rows="6" class="form-control p-0 border-0" name="decription">{{ $about['decription'] }}</textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="white-box">
  <h2 class="mb-3">Liên Hệ</h2>
  <div class="row">
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Số Nhà</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['street_address'] }}"
                class="form-control p-0 border-0" name="street_address"> </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Phường(Xã), Quận(Huyện)</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['area_address'] }}"
                class="form-control p-0 border-0" name="area_address"> </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Thành Phố(Tỉnh)</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['city_address'] }}"
                class="form-control p-0 border-0" name="city_address"> </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Quốc Gia</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['country_address'] }}"
                class="form-control p-0 border-0" name="country_address"> </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Số Điện Thoại</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['phone'] }}" placeholder="123 456 7890"
                class="form-control p-0 border-0" name="phone">
        </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label for="example-email" class="col-md-12 p-0 input-title">Email</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="email"  value="{{ $about['email'] }}" placeholder="info@mail.com"
                class="form-control p-0 border-0" name="email"
                id="example-email">
        </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Facebook</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['facebook'] }}"
                class="form-control p-0 border-0" name="facebook">
        </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">ZALO</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['zalo'] }}"
                class="form-control p-0 border-0" name="zalo">
        </div>
    </div>
  </div>
</div>
<div class="white-box">
  <h2 class="mb-3">Tọa độ Google Map</h2>
  <div class="row">
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Kinh Độ</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['longitude'] }}"
                class="form-control p-0 border-0" name="longitude">
        </div>
    </div>
    <div class="form-group mb-4 col-md-6 col-sm-6">
        <label class="col-md-12 p-0 input-title">Vĩ Độ</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" value="{{ $about['latitude'] }}"
                class="form-control p-0 border-0" name="latitude">
        </div>
    </div>
  </div>
</div>
<div class="form-group mb-4">
  <div class="col-sm-12">
    <button class="btn btn-success">Cập Nhập Thông Tin</button>
  </div>
</div>
</form>
@endsection
@section('include-js')
  <script src="{{ asset('assets/js/admin/about.js') }}"></script>
@endsection