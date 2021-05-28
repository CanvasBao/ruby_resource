@extends('admin.master')

@section('main')
    
<form id="product-form" action="{{ route('manage.product.index') }}" class="form-horizontal form-material" method="POST">
  @csrf
    @method('POST')  
  @isset($id)
    @method("PUT")
    <input id="product-id" value="{{ $id }}" type="hidden" name="id">
  @endisset
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-12">
        <div class="white-box img-select-box">
          <div class="">
            <div class="overlay-box">
              <img width="100%" class="old-img" src="{{ asset($product['product_img_path'] ?? '') }}">
              <img width="100%" class="new-img" src="" style="display: none">
            </div>
          </div>
          <div class="user-btm-box mt-5 d-md-flex">
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="product_img" id="imgInput">
                <label class="custom-file-label img-file-name" for="imgInput">Chọn hình ảnh</label>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group mb-4">
            <h5 class="input-title"><label class="col-md-12 p-0">Tên Sản Phẩm</label></h5>
            <div class="col-md-12 mb-4 border-bottom p-0 company-name-box">
                <input type="text" value="{{ $product['product_name'] ?? '' }}"
                class="form-control p-0 border-0" name="product_name"></div>
          </div>
          <div class="form-group mb-4">
            <h5 class="input-title"><label class="col-md-12 p-0">Mô tả đầu tiên</label></h5>
            <div class="col-md-12 border-bottom p-0">
                <textarea rows="6" class="form-control p-0 border-0" name="product_description">{{ $product['product_description'] ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>
      
      <div class="extend-des">
      </div>
      <div class=" mb-4">
        <div class="col-sm-12">
            <div id='addDes' class="btn btn-secondary float-sm-right">THÊM MÔ TẢ</div>
        </div>
      </div>
  </div>
  <div class="main-button-group mb-4">
    <div class="col-sm-12">
        <button class="btn btn-success">@if (isset($id)) CẬP NHẬP @else TẠO MỚI @endif</button>
    </div>
  </div>
</div>
</form>
@endsection
@section('include-js')
  <script src="{{ asset('assets/js/admin/product.js') }}"></script>
@endsection