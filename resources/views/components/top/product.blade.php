<div class="relative bg-white py-16 sm:py-24 lg:py-32">
  <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-lg font-semibold text-cyan-600">Sản phẩm đa dạng</h2>
    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Mọi thứ bạn cần</p>
    <p class="mx-auto mt-5 text-xl text-gray-500">
      Mọi nhu cầu về in tem nhãn chất lượng cao của khách hàng cho từng ngành nghề, những yêu cầu kỹ thuật đặc biệt,
      chúng tôi luôn đáp ứng, giúp khách hàng đạt được mục tiêu thương hiệu của mình.
    </p>
    <div class="mt-10">
      @foreach ($categories as $category)
        <div class="mt-3 pb-16">
          <h2 class="text-2xl mb-4 font-semibold text-cyan-600 text-left">{{ $category['category_name'] }}</h2>
          <div class="swiper swiper-container-initialized swiper-container-horizontal swiperTopProduct__{{$category['category_slug'] }}">
            <div class="swiper-wrapper">
              @foreach ($category->products as $product)
                <div class="swiper-slide shadow-md rounded-lg border w-60">
                  <div class="relative z-0">
                    <div
                      class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                      @isset($product['images'][0]->image)
                        <img src="{{ asset('storage/uploads/product/' . $product['images'][0]->image) }}" alt=""
                          class="pointer-events-none object-cover group-hover:opacity-75">
                      @else
                        <img src="{{ asset('storage/images/no_image.jpg') }}" alt=""
                          class="pointer-events-none object-cover group-hover:opacity-75 border rounded-lg">
                      @endisset
                      <button type="button"
                        class="font-mono absolute z-10 inset-0 p-2 hover:bg-[#028A0F] opacity-0 hover:opacity-75 flex items-center justify-center">
                        <div
                          class="text-left mt-2 block truncate text-xl font-medium text-white drop-shadow-lg shadow-black">
                          {{ $product['name'] }}
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <!-- More files... -->
        </div>
        <script>
          window.addEventListener("load", () => {
            let slug = "<?php echo $category['category_slug']; ?>";
            let productSwiperClass = '.swiperTopProduct__' + slug;
            new Swiper(productSwiperClass, {
              loop: true,
              slidesPerView: "auto",
              spaceBetween: 50,
              autoplay: {
                delay: 2500,
                disableOnInteraction: false,
              }
            });
          });
        </script>
      @endforeach
    </div>
  </div>
</div>
