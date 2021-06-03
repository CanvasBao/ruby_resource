@extends('admin.master')

@section('main')
<link href="{{ asset('assets/css/admin/images-library.css') }}" rel="stylesheet">

<input type="hidden" id="folder_id_selected" value={{$folder_id}} >
<div class="row">
    <div class="col-sm-12">
        <div id="img-grid-view" class="white-box"></div>
    </div>
  </div>
@endsection
@section('include-js')
  <script src="{{ asset('assets/js/admin/images-library.js') }}"></script>
@endsection