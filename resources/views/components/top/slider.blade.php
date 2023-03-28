@isset($images)
  <div class="swiper swiperTopPage h-full">
    <div class="swiper-wrapper">
      @foreach ($images as $image)
        <div class="swiper-slide ">
          <div class="w-full h-full">
            <figure class="w-full h-full">
              <img class="w-full h-full object-cover" src="{{ $image }}" alt="slider image">
            </figure>
          </div>
        </div>
      @endforeach
    </div>
    <div class="swiper-button-next opacity-0 hover:opacity-100"></div>
    <div class="swiper-button-prev opacity-0 hover:opacity-100"></div>
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
