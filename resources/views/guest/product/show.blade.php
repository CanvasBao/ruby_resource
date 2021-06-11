@extends('guest.master')
@section('main')
<link href="{{ asset('assets/css/guest/product-detail.css') }}" rel="stylesheet">
<main id="main">
  
    <!-- ======= product Details Section ======= -->
    <section id="product-details" class="product-details">
      <div class="container" data-aos="fade-up">
        <div class="product-details-container">

          <div class="owl-carousel product-details-carousel">
            @if ( ! empty($product_info['product_img_path']) )
              <img src="{{ asset($product_info['product_img_path']) }}" class="img-fluid" alt="">
            @endif
            @if ( ! empty($product_info['img_list']) )
              @foreach ($product_info['img_list'] as $carousel_img)
                <img src="{{ asset($carousel_img['img_path']) }}" class="img-fluid" alt="">
              @endforeach
            @endif
          </div>

          <div class="product-info">
            <h3>Chi tiết sản phẩm</h3>
            <ul>
              <li><strong>Tên</strong>:{{ $product_info['product_name'] ?? 'No Name'}}</li>
              <li><strong>Giá</strong>: Thương Lượng</li>
            </ul>
          </div>

        </div>

        <div class="product-description">
          <h2>{{ $product_info['product_name'] ?? 'No Name'}}</h2>
          <p>{{ $product_info['product_description'] ?? ''}}</p>
        </div>

        @if ( ! empty($product_info['des_list']) )
          @foreach ($product_info['des_list'] as $detail_des)
            <div class="product-description">
              <h2>{{ $detail_des['des_title'] ?? ''}}</h2>
              <p>{{ $detail_des['des_content'] }}</p>
            </div>
          @endforeach
        @endif
      </div>
    </section><!-- End product Details Section -->

  <section id="about" class="about">
    <div class="container">
    <x-FrameSendContact ></x-FrameSendContact>
    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection