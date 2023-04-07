@extends('layout.html')

@section('meta')
  <x-shared.meta title="Trang chủ">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="bg-white">
    <div class="h-80 md:h-[calc(100vh-65px)]">
      <x-top.slider />
    </div>

    <!-- Feature section with screenshot -->
    <div class="relative bg-gray-50 pt-16 sm:pt-24 lg:pt-32">
      <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
        <div>
          <h2 class="text-lg font-semibold text-cyan-600">Chào mừng quý khách đến với Ruby Label!</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Bạn cần in tem nhãn, máy in, mực in?</p>
          <p class="mx-auto mt-5 text-xl text-gray-500">
            Với nhiều năm kinh nghiệm trong lĩnh vực cung cấp các giải pháp in ấn, chúng tôi cam kết mang đến cho quý khách sự hài lòng nhất về chất lượng sản phẩm và dịch vụ.<br>
            Các sản phẩm chính của chúng tôi bao gồm các loại tem nhãn được sản xuất trên các máy móc hiện đại nhất, với đầy đủ các loại tem nhãn từ tem nhãn in mã vạch đến tem nhãn decal.<br>
            Ngoài ra, chúng tôi cũng cung cấp các loại máy in barcode và mực in tem, giúp quý khách hàng có thể tự sản xuất tem nhãn của mình nhanh chóng và tiết kiệm chi phí.
         </p>
        </div>
        <div class=" flex justify-center mt-12 -mb-3">
          <img class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5"
            src="{{ asset('storage/images/top-feature.jpg') }}" alt="" />
        </div>
      </div>
    </div>

    <!-- Feature section with grid -->
    <x-top.product />

    <!-- Testimonial section -->
    <div class="bg-gradient-to-r from-teal-500 to-cyan-600 pb-16 lg:relative lg:z-10 lg:pb-0">
      <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-8 lg:px-8">
        <div class="relative lg:-my-8">
          <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"></div>
          <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:h-full lg:p-0">
            <div
              class="aspect-w-10 aspect-h-6 overflow-hidden rounded-xl shadow-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
              <img class="object-cover lg:h-full lg:w-full"
                src="{{ asset('storage/images/top-testimonial.jpg') }}"
                alt="" />
            </div>
          </div>
        </div>
        <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
          <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
            <blockquote>
              <div>
                <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                </svg>
                <p class="mt-6 text-2xl font-medium text-white">
                  Với phương châm "Khách hàng là trung tâm", chúng tôi luôn đặt lợi ích của khách hàng lên hàng đầu và không ngừng cải tiến và phát triển để đáp ứng mọi nhu cầu của khách hàng.<br>
                  Với chất lượng sản phẩm và dịch vụ tuyệt vời, cùng với cam kết mang lại sự hài lòng cho khách hàng, chúng tôi hy vọng có thể trở thành đối tác tin cậy của quý khách hàng trong lĩnh vực in ấn và đóng gói.
                </p>
              </div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <!-- Blog section -->
    <x-top.material />

    <!-- CTA Section -->
    <div class="relative bg-gray-900">
      <div class="relative h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <img class="h-full w-full object-cover"
          src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&sat=-100"
          alt="" />
        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 mix-blend-multiply">
        </div>
      </div>
      <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">
        <div class="md:ml-auto md:w-1/2 md:pl-10">
          <h2 class="text-lg font-semibold text-gray-300">Hãy liên hệ với chúng tôi!</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Chúng tôi ở đây để giúp đỡ.</p>
          <p class="mt-3 text-lg text-gray-300">
            Nếu quý khách hàng cần tư vấn hoặc đặt hàng các sản phẩm của chúng tôi, hãy liên hệ với chúng tôi.<br>
            Chúng tôi luôn sẵn sàng hỗ trợ và giải đáp mọi thắc mắc của quý khách hàng.<br>
            Cảm ơn quý khách đã quan tâm đến công ty chúng tôi!</p>
          <div class="mt-8">
            <div class="inline-flex rounded-md shadow">
              <a href="{{route('contact.show')}}"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-medium text-gray-900 hover:bg-gray-50">
                Liên hệ ngay
                <!-- Heroicon name: mini/arrow-top-right-on-square -->
                <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z"
                    clip-rule="evenodd" />
                  <path fill-rule="evenodd"
                    d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z"
                    clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
