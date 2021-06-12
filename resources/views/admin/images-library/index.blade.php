@extends('admin.master')

@section('main')
<link href="{{ asset('assets/css/admin/images-library.css') }}" rel="stylesheet">

<input type="hidden" id="folder_id_selected" value={{$folder_id}} >
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
          <div class="box-top-bar mb-3">
          <a id="createNewFolder" class="btn btn-outline-danger"><i class="fas fa-folder"></i> Thêm mới</a>
          <a href="#" class="btn btn-outline-danger"><i class="fas fa-font"></i> Đối Tên</a>
          <a id="uploadBtn" class="btn btn-outline-danger"><i class="fas fa-upload"></i> Upload File</a>
          <a id="deleteFile" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete File</a>
        </div>
          <div id="img-grid-view"></div>
        </div>
    </div>
  </div>
@endsection
@section('include-js')
  <script src="{{ asset('assets/js/admin/images-library.js') }}"></script>
@endsection