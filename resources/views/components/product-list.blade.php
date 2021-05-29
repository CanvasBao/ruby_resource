<link href="{{ asset('assets/css/guest/product.css') }}" rel="stylesheet">
<!-- product list -->
<section id="product" class="product">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
        <h2>DANH SÁCH SẢN PHẨM</h2>
    </div>
    <div class="row product-container" data-aos="fade-up">
      @if ( ! empty($products) )
        @foreach ($products as $product)
          <div class="col-lg-4 col-md-6 product-item filter-app">
            <div class="shadow-product">
              <img src="{{ asset($product['product_img']) }}" class="img-fluid" alt="">
              <div class="product-title">
                <h3>{{ $product['product_name'] ?? '' }}</h3>
              </div>
              <div class="product-info">
                <h4>{{ $product['product_name'] ?? '' }}</h4>
                <p>{{ $product['product_description'] ?? '' }}</p>
                <a href="assets/img/product/product-1.jpg" data-gall="productGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="product/{{ $product['product_id'] ?? '' }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
  