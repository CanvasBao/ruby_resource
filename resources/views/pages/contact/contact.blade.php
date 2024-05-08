@extends('layout.html')

@section('meta')
  <x-shared.meta title="Liên hệ">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <x-shared.content-box class="max-w-7xl">
    <div class="relative bg-white shadow-xl">
      <h2 class="sr-only">Contact us</h2>
      
      <div class="grid grid-cols-1 lg:grid-cols-3">
        <!-- Contact information -->
        <div class="relative z-0 overflow-hidden  py-10 px-6 sm:px-10 xl:p-12">
          <div
          class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-gray-100 ring-1 ring-gray-900/10  sm:w-[99%] sm:rounded-xl">
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
          <p class="mt-6 max-w-3xl text-base text-gray-600">
            Hãy nhập vào tất cả các mục, sau đó nhấn nút GỬI<br>
            Nếu bạn đang gấp, xin vui lòng liên hệ với chúng tôi qua điện thoại.
          </p>
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
          <ul role="list" class="mt-8 flex space-x-4">
            <li>
              <a href="https://www.facebook.com/label.ruby.3" target="_blank">
                <figure class="">
                  <img class="h-6 w-6 rounded-lg shadow-xl ring-1 ring-black ring-opacity-5"
                    src="{{ asset('storage/images/facebook-icon.png') }}" alt="" />
                </figure>
              </a>
            </li>
            {{-- <li>
              <a class="" href="#">
                <figure class="">
                  <img class="h-6 w-6 rounded-lg shadow-xl ring-1 ring-black ring-opacity-5"
                    src="{{ asset('storage/images/zalo-icon.png') }}" alt="" />
                </figure>
              </a>
            </li> --}}

          </ul>
        </div>

        <!-- Contact form -->
        <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
          <h3 class="text-lg font-medium text-gray-900">Gửi liên hệ đến chúng tôi</h3>
          <form action="{{ route('contact.send') }}" method="POST"
            class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
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
          </form>
        </div>
      </div>
    </div>
  </x-shared.content-box>
@endsection
