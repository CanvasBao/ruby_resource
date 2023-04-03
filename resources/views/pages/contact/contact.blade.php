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
        <div class="relative overflow-hidden bg-indigo-700 py-10 px-6 sm:px-10 xl:p-12">
          <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="343" height="388" viewBox="0 0 343 388" fill="none"
              preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z" fill="url(#linear1)"
                fill-opacity=".1" />
              <defs>
                <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66"
                  gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 sm:block lg:hidden"
            aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="359" height="339" viewBox="0 0 359 339" fill="none"
              preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z" fill="url(#linear2)"
                fill-opacity=".1" />
              <defs>
                <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66"
                  gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 lg:block" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="160" height="678" viewBox="0 0 160 678" fill="none"
              preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z" fill="url(#linear3)"
                fill-opacity=".1" />
              <defs>
                <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66"
                  gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <h3 class="text-lg font-medium text-white">Thông tin liên hệ</h3>
          <p class="mt-6 max-w-3xl text-base text-indigo-50">
            Hãy nhập vào tất cả các mục, sau đó nhấn nút GỬI<br>
            Nếu bạn đang gấp, xin vui lòng liên hệ với chúng tôi qua điện thoại.
          </p>
          <dl class="mt-8 space-y-6">
            <dt><span class="sr-only">Phone number</span></dt>
            <dd class="flex text-base text-indigo-50">
              <!-- Heroicon name: outline/phone -->
              <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
              <span class="ml-3">028.220 363 79</span>
            </dd>
            <dt><span class="sr-only">Email</span></dt>
            <dd class="flex text-base text-indigo-50">
              <!-- Heroicon name: outline/envelope -->
              <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
              <span class="ml-3">info@rubylabel.net<br>Ruby.biendegi@gmail.com</span>
            </dd>
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
