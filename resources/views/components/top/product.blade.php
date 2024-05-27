<div class="relative  py-8 sm:py-12 lg:py-20 rounded-lg">
  <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-3xl font-semibold text-cyan-600">Sản phẩm đa dạng</h2>
    <p class="mx-auto mt-5 text-sm md:text-xl text-white">
      Mọi nhu cầu về in tem nhãn chất lượng cao của khách hàng cho từng ngành nghề, những yêu cầu kỹ thuật đặc biệt,
      chúng tôi luôn đáp ứng, giúp khách hàng đạt được mục tiêu thương hiệu của mình.
    </p>
    <div class="mt-10">
      @foreach ($categories as $category)
        <div class="mt-3 pb-16">
          <h2 class="text-2xl mb-4 font-semibold text-cyan-600 text-left">{{ $category['category_name'] }}</h2>
          <div class="swiper swiper-container-initialized swiper-container-horizontal swiperTopProduct__{{ $category['category_slug'] }}">
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
                      <a href="{{ route('product.show', ['id' => $product['id'], 'text' => urlencode($product['name'])]) }}"
                        class="font-mono absolute flex-col z-10 inset-0 p-2 bg-white/50 invisible group-hover:visible flex items-center justify-center">
                        <div
                          class="text-left mt-2 block truncate text-xl font-medium text-blue-800 drop-shadow-lg shadow-black">
                          {{ $product['name'] }}
                        </div>
                        <div
                          class="group-hover:visible invisible inline-flex items-center px-2 rounded-lg text-white bg-blue-500 animate-pulse">
                          <span class=" text-sm pr-0.5">chi tiết</span>
                          <svg width="18px" height="18px" viewBox="0 0 24 24" class=" stroke-white" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        </div>
                      </a>
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
              speed: 2000,
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
