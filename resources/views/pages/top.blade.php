@extends('layout.html')

@section('meta')
  <x-shared.meta title="Trang chủ">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="pb-20">
    <div class="relative h-80 md:h-auto">
      <x-top.slider />
    </div>

    <!-- Feature section with screenshot -->
    <div class="relative bg-gradient-to-b from-gray-50 via-slate-50 mt-32 pt-4 rounded-t-lg sm:pt-6 lg:pt-16">
      <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
        <div>
          <h2 class="text-xl font-semibold text-cyan-600">Chào mừng quý khách đến với</h2>
          <h2 class="text-5xl font-semibold py-2 text-rose-600">RUBY LABEL</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Bạn cần in tem nhãn, máy in, mực in?
          </p>
          <p class="mx-auto mt-5 text-xl text-gray-500">
            Với nhiều năm kinh nghiệm trong lĩnh vực cung cấp các giải pháp in ấn, chúng tôi cam kết mang đến cho quý
            khách sự hài lòng nhất về chất lượng sản phẩm và dịch vụ.<br>
            Các sản phẩm chính của chúng tôi bao gồm các loại tem nhãn được sản xuất trên các máy móc hiện đại nhất, với
            đầy đủ các loại tem nhãn từ tem nhãn in mã vạch đến tem nhãn decal.<br>
            Ngoài ra, chúng tôi cũng cung cấp các loại máy in barcode và mực in tem, giúp quý khách hàng có thể tự sản
            xuất tem nhãn của mình nhanh chóng và tiết kiệm chi phí.
          </p>
        </div>
        <div class=" flex justify-center mt-12 -mb-3">
          <img class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5"
            src="{{ asset('storage/images/top-feature.jpg') }}" alt="" />
        </div>
      </div>
    </div>


    <!-- Blog section -->
    <x-top.material />

    <!-- Feature section with grid -->
    <x-top.product />

    <!-- Testimonial section -->
    <div class="bg-gradient-to-r from-teal-500 rounded-lg mt-20 to-cyan-600 pb-16 :relative lg:z-10 lg:pb-0">
      <div class="lg:mx-auto grid lg:max-w-7xl lg:grid-cols-3 lg:gap-8 lg:px-8">
        <div class="relative -mt-16 lg:-my-8">
          <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:h-full lg:p-0">
            <div
              class="aspect-w-10 aspect-h-6 overflow-hidden rounded-xl shadow-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
              <img class="object-cover lg:h-full lg:w-full" src="{{ asset('storage/images/top-testimonial.jpg') }}"
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
                  Với phương châm "Khách hàng là trung tâm", chúng tôi luôn đặt lợi ích của khách hàng lên hàng đầu và
                  không ngừng cải tiến và phát triển để đáp ứng mọi nhu cầu của khách hàng.<br>
                  Với chất lượng sản phẩm và dịch vụ tuyệt vời, cùng với cam kết mang lại sự hài lòng cho khách hàng,
                  chúng tôi hy vọng có thể trở thành đối tác tin cậy của quý khách hàng trong lĩnh vực in ấn và đóng gói.
                </p>
              </div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="relative isolate bg-white mt-32 sm:rounded-xl">
      <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
        <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-20">
          <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
            <div
              class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-gray-100 ring-1 ring-gray-900/10 lg:w-1/2 sm:rounded-xl">
              <svg
                class="absolute inset-0 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                aria-hidden="true">
                <defs>
                  <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="100%" y="-1"
                    patternUnits="userSpaceOnUse">
                    <path d="M130 200V.5M.5 .5H200" fill="none" />
                  </pattern>
                </defs>
                <rect width="100%" height="100%" stroke-width="0" fill="white" />
                <svg x="100%" y="-1" class="overflow-visible fill-gray-50">
                  <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
              </svg>
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Hãy liên hệ với chúng tôi!</h2>
            {{-- <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Chúng tôi ở đây để giúp đỡ.</p> --}}
            <p class="mt-6 text-lg leading-8 text-gray-600">
              Nếu quý khách hàng cần tư vấn hoặc đặt hàng các sản phẩm của chúng tôi, hãy liên hệ với chúng tôi.<br>
              Chúng tôi luôn sẵn sàng hỗ trợ và giải đáp mọi thắc mắc của quý khách hàng.<br>
              Cảm ơn quý khách đã quan tâm đến công ty chúng tôi!</p>
            <dl class="mt-10 space-y-4 text-base leading-7 text-gray-600">
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Address</span>
                  <svg class="h-7 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                  </svg>
                </dt>
                <dd>Số 164/27B Bùi Quang Là, Phường 12<br>Quận Gò Vấp, TP.Hồ Chí Minh</dd>
              </div>
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Telephone</span>
                  <svg class="h-7 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                  </svg>
                </dt>
                <dd><a class="hover:text-gray-900" href="tel:+8428220 363 79">028.220 363 79</a></dd>
              </div>
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Email</span>
                  <svg class="h-7 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                  </svg>
                </dt>
                <dd><a class="hover:text-gray-900" href="mailto:info@rubylabel.net">info@rubylabel.net</a><br />
                  <a class="hover:text-gray-900" href="mailto:ruby.biendegi@gmail.com">ruby.biendegi@gmail.com</a>
                </dd>
              </div>
            </dl>
          </div>
        </div>
        <form action="{{ route('contact.send') }}" method="POST" class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-20">
          <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
              {{ csrf_field() }}
              <x-form.field title="Họ và Tên" type="text" name="name" />
              <x-form.field title="Tên Công Ty" type="text" name="company" />
              <x-form.field title="Email" type="text" name="email" />
              <x-form.field title="Số điện thoại" type="text" name="phone" />
              <x-form.field boxclass="sm:col-span-2" title="Tiêu đề" type="text" name="subject"
                note="Tối đa 50 kí tự" />
              <x-form.field boxclass="sm:col-span-2" title="Nội dung liên hệ" type="textarea" name="content"
                note="Tối đa 500 kí tự" />
              <div class="sm:col-span-2 sm:flex sm:justify-end">
                <button type="submit"
                  class="mt-2 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Gửi</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection
