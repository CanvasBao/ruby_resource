@extends('admin.master')

@section('main')
<link href="{{ asset('assets/css/admin/product.css') }}" rel="stylesheet">
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
                <label class="custom-file-label img-file-name" for="imgInput">Chọn ảnh đại diện cho sản phẩm</label>
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
      <a id="addDetailImg" class="float-sm-right btn btn-success"><i class="fas fa-plus-square"></i> Thêm hình ảnh</a>
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
  @if ( ! empty($product['des_list']) )
  @foreach ($product['des_list'] as $detail_des)
    <div class="col-lg-8 col-md-12 des-card"><div class="card"><div class="card-body">
      <input type="hidden" name="detail_des[{{$detail_des['des_id']}}][id]" value="{{$detail_des['des_id']}}">
      <input type="checkbox" class="delete-check" name="detail_des[{{$detail_des['des_id']}}][is_delete]" style="display:none" />
      <div class="form-group mb-4">
        <h5 class="input-title"><label class="col-md-12 p-0">Tiêu Đề</label></h5>
        <div class="col-md-12 mb-4 border-bottom p-0 company-name-box">
          <input type="text" class="form-control p-0 border-0" name="detail_des[{{$detail_des['des_id']}}][title]" value="{{ $detail_des['des_title'] }}">
        </div>
      </div>
      <div class="form-group mb-4">
        <h5 class="input-title"><label class="col-md-12 p-0">Mô Tả</label></h5>
        <div class="col-md-12 border-bottom p-0">
          <textarea rows="6" class="form-control p-0 border-0" name="detail_des[{{$detail_des['des_id']}}][content]">{{ $detail_des['des_content'] }}</textarea>
        </div>
      </div>
    </div></div></div>
  @endforeach
  @endif
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
 

    function addDetailDes(){
      $(".extend-des").find(".des-card .des-id");
      let card = $('<div class="col-lg-8 col-md-12 des-new-card"><div class="card"><div class="card-body"></div></div></div>');
      let title = '<div class="form-group mb-4">'
                  + '<h5 class="input-title"><label class="col-md-12 p-0">Tiêu Đề</label></h5>'
                  + '<div class="col-md-12 mb-4 border-bottom p-0 company-name-box">'
                  + '<input type="text" class="form-control p-0 border-0 des-title" >'
                  + '</div></div>';
      let content =  '<div class="form-group mb-4">'
                    + '<h5 class="input-title"><label class="col-md-12 p-0">Mô Tả</label></h5>'
                    + '<div class="col-md-12 border-bottom p-0">'
                      + '<textarea rows="6" class="form-control p-0 border-0 des-content"></textarea>'
                      + '</div></div>';
        
      $($(card).find(".card-body")).append(title, content);
      // $($(card).find(".delete-des")).click(function(){
      //   deleteImgCard(this);
      // });
      $(".extend-des").append(card);
    }

    
  $(function () {
    $(".delete").click(function(){
      deleteImgCard(this);
    });
    $("#addDes").click(function(){
      addDetailDes();
    });
  });
  </script>
@endsection