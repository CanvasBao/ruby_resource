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
  </div>
  
  <div class="col-sm-12">
    <div class="white-box">
    <div>
      <button id="addDetailImg" class="float-sm-right btn btn-success"><i class="fas fa-plus-square"></i> Thêm hình ảnh</button>
    </div>
      <h3 class="box-title">Danh sách hình ảnh chi tiết</h3>
      <div class="row detail-img-box">
        @if ( ! empty($product['img_list']) )
        @foreach ($product['img_list'] as $image)
        <div class="col-lg-2 mb-4 detail-img-card">
          <div class="card h-100 shadow p-3 rounded">
            <a href="#"><img class="card-img-top" src="{{ $image['img_path'] }}" alt=""></a>
            <div style="font-size: 20px;" class="card-text">
              <a class="delete p-2 float-sm-right" data-item="{{ $image['img_id'] }}"><i  class="fas fa-trash"></i></a>
            </div>
          </div>
        </div> 
        @endforeach
        @endif
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
  <script>
    function deleteImgCard(object){
       let card = $(object).closest("div.detail-img-card");
       if($(card).hasClass("new-img")){
        $(card).remove();
       }else{
        let id = $(object).data("item");
        let hidden_path = "<input type=\"hidden\" name=\"detail_img[delete_old][]\" value=\"" + id +"\">";
        $(card).append(hidden_path);
        $(card).hide();

       }
    }

    function addDetailImg(path){
      let box = $('<div class="col-lg-2 mb-4 detail-img-card new-img"><div class="card h-100 shadow p-3 rounded"></div></div>');
      let img = '<img class="card-img-top" src="'+ path +'" alt="">';
      let hidden_path = "<input type=\"hidden\" name=\"detail_img[new][]\" value=\"" + path +"\">";
      let btn = '<div style="font-size: 20px;" class="card-text"><a class="delete p-2 float-sm-right"><i class="fas fa-trash"></i></a></div>';
      $($(box).find(".card")).append(img, hidden_path, btn);
      $($(box).find(".card .delete")).click(function(){
        deleteImgCard(this);
      });
      $(".detail-img-box").append(box);
      closePop();
    }
 


    
  $(function () {
    $(".delete").click(function(){
      deleteImgCard(this);
    });
  });
  </script>
@endsection