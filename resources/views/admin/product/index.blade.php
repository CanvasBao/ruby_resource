@extends('admin.master')

@section('main')
<link href="{{ asset('assets/css/admin/product.css') }}" rel="stylesheet">
<div class="row">
  <div class="col-sm-12">
      <div class="white-box">
          <h3 class="box-title">DANH SÁCH SẢN PHẨM</h3>
          <a href="{{ route('manage.product.create') }}" class="float-sm-right btn btn-success"><i class="fas fa-plus-square"></i> Thêm mới</a>
          <div class="table-responsive">
              <table class="table text-nowrap">
                  <thead>
                      <tr>
                          <th class="border-top-0">#</th>
                          <th class="border-top-0 product-img">Hình ảnh</th>
                          <th class="border-top-0">Tên Sản Phẩm</th>
                          <th class="border-top-0">Mô tả</th>
                          <th class="border-top-0"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @if ( ! empty($product_list) )
                      @foreach ($product_list as $product)
                      <tr class='product-row'>
                          <td>{{ $product['product_id'] ?? '' }}</td>
                          <td class="product-img"><img src="{{ asset($product['product_img']) }}" class="img-fluid" alt=""></td>
                          <td>{{ $product['product_name'] ?? '' }}</td>
                          <td>{{ $product['product_description'] ?? '' }}</td>
                          <td>
                            <div class="button-group float-sm-right">
                              {{-- <a href="{{ route('manage.product.show', ['product' => $product['product_id'] ]) }}" 
                                  class="btn btn-outline-secondary"><i class="fas fa-file-alt"></i> Chi tiết</a> --}}
                              <a href="{{ route('manage.product.edit', ['product' => $product['product_id'] ]) }}" 
                                  class="btn btn-outline-info"><i class="fas fa-edit"></i> Chỉnh sửa</a>
                              <a href="#" data-id="{{ $product['product_id'] }}" data-token="{{ csrf_token() }}" 
                                  class="btn-delete btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection
@section('include-js')
  <script src="{{ asset('assets/js/admin/product.js') }}"></script>
@endsection