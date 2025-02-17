@isset($images)
  <div class="swiper swiperTopPage h-64 lg:h-[420px] overflow-hidden">
    <div class="swiper-wrapper">

      <div class="swiper-slide" data-title=""  data-subtitle="">
        <div class="w-full h-full">
          <figure class="w-full h-full">
            <img class="w-full h-full object-cover" src="{{ asset('storage/images/welcome.png') }}" alt="welcome">
          </figure>
        </div>
      </div>
      @foreach ($images as $image)
        <div class="swiper-slide" data-title="{{ isset($image['title']) ?  $image['title'] : '' }}"  data-subtitle="{{ isset($image['subtitle']) ?  $image['subtitle'] : '' }}">
          <div class="w-full h-full">
            <figure class="w-full h-full">
              <img class="w-full h-full object-cover" src="{{ asset($assetDir . $image['image']) }}" alt="slider image">
            </figure>
          </div>
        </div>
      @endforeach
    </div>
    <div class="slide-captions"></div>
    <div class="swiper-button-next opacity-0 hover:opacity-100"></div>
    <div class="swiper-button-prev opacity-0 hover:opacity-100"></div>
  </div>
  <script>
    window.addEventListener("load", () => {
      const sliderSwiper = new Swiper('.swiperTopPage', {
        loop: true,
        speed: 3000,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        slidesPerView: "auto",
        centeredSlides: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
         breakpoints: {
          // when window width is >= 640px
          640: {
            slidesPerView: 1.4,
            spaceBetween: 0
          }
        }
        // on: {
        //   slideChangeTransitionStart: function() {
        //     // Slide captions
        //     let titleObj = this.slides[this.activeIndex];
        //     setTimeout(function() {
        //       let currentTitle = titleObj.getAttribute("data-title") ||
        //         'In mã vạch, in kết nối sự thành công';
        //       let currentSubtitle = titleObj.getAttribute("data-subtitle") || '';
        //     }, 500);
        //     gsap.to(document.querySelector(".current-title"), 0.4, {
        //       autoAlpha: 0,
        //       y: -40,
        //       ease: Power1.easeIn
        //     });
        //     gsap.to(document.querySelector(".current-subtitle"), 0.4, {
        //       autoAlpha: 0,
        //       y: -40,
        //       delay: 0.15,
        //       ease: Power1.easeIn
        //     });
        //   },
        //   slideChangeTransitionEnd: function() {
        //     // Slide captions
        //     let titleObj = this.slides[this.activeIndex];
        //     let currentTitle = titleObj.getAttribute("data-title") || 'In mã vạch, in kết nối sự thành công';
        //     let currentSubtitle = titleObj.getAttribute("data-subtitle") || '';

        //     document.querySelector(".slide-captions").innerHTML = "<h2 class='current-title'>" + currentTitle +
        //       "</h2>" + "<h3 class='current-subtitle'>" + currentSubtitle + "</h3>";
        //     gsap.from(document.querySelector(".current-title"), 0.4, {
        //       autoAlpha: 0,
        //       y: 40,
        //       ease: Power1.easeOut
        //     });
        //     gsap.from(document.querySelector(".current-subtitle"), 0.4, {
        //       autoAlpha: 0,
        //       y: 40,
        //       delay: 0.15,
        //       ease: Power1.easeOut
        //     });
        //   }
        // }
      });

      // let titleObj = sliderSwiper.slides[sliderSwiper.activeIndex];
      // let currentTitle = titleObj.getAttribute("data-title") || '';
      // let currentSubtitle = titleObj.getAttribute("data-subtitle") || '';
      // document.querySelector(".slide-captions").innerHTML = "<h2 class='current-title'>" + currentTitle +
      //         "</h2>" + "<h3 class='current-subtitle'>" + currentSubtitle + "</h3>";
    });
  </script>
@endisset
