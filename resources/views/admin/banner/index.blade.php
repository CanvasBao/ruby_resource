@extends('admin.master')

@section('main')
    <x-TwocolGridView title="Danh sach banner" :griddata="$carousel_grid" :editFlag="1" ></x-TwocolGridView>

    <div id="update-frame" class="white-box" style="display: none">
        <h2 class="my-4">Chi tiết Banner <a id="close-update" class="p-2 float-sm-right"><i  class="far fa-window-close"></i></a></h2>
        <form id="update-form" action="banner" class="form-horizontal form-material" method="POST">
            @csrf
            @method("PUT")
            <div class="msg_show">
            </div>
            <input id="banner-id" type="hidden" name="id">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" style="color: #4fc3f7">Hình ảnh</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <img class="card-img" src="#" alt="" /></div>
                            </div>
                            <div class="form-group mb-4">
                                <input type='file' name='img-file' onchange="readURL(this, '#update-frame .card-img');" /></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" style="color: #4fc3f7">Title</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input id="banner-title" type="text" name="title" placeholder="New Title"
                                        class="form-control p-0 border-0"> </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" style="color: #4fc3f7">Content</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea id="banner-content" name="content" rows="5" class="form-control p-0 border-0"></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button id="update-banner" class="float-sm-right btn btn-success">Cập nhập</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="white-box">
        <h2 class="my-4">Tạo mới Banner</h2>
        <form id="create-form" action="banner" class="form-horizontal form-material" method="POST">
         @csrf
         @method('POST')  
            <div class="msg_show">
            </div>
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" style="color: #4fc3f7">Hình ảnh</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <img id="create-img" class="card-img" src="#" alt="" /></div>
                            </div>
                            <div class="form-group mb-4">
                                <input type='file' name='img-file' onchange="readURL(this, '#create-img');" /></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" style="color: #4fc3f7">Title</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input name='title' type="text" placeholder="New Title"
                                        class="form-control p-0 border-0"> </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" style="color: #4fc3f7">Content</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea name='content' rows="5" class="form-control p-0 border-0"></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button id="create-banner" class="float-sm-right btn btn-success">Tạo mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    
@endsection
@section('include-js')
  <script src="{{ asset('assets/js/admin/banner.js') }}"></script>
@endsection