@isset($images)
  <div class="swiper swiperTopPage">
    <div class="swiper-wrapper">
      @foreach ($images as $image)
        <div class="swiper-slide ">
          <div class="w-full">
            <figure class="w-full h-100">
              <img class="w-full h-full object-cover" src="{{ $image }}" alt="slider image">
            </figure>
          </div>
        </div>
      @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <script>
    window.addEventListener("load", () => {
      new Swiper('.swiperTopPage', {
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        slidesPerView: "auto",
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        }
      });
    });
  </script>
@endisset
