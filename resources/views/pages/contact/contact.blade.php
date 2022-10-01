@extends('layout.html')

@section('meta')
  <x-shared.meta title="Liên hệ">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <x-shared.content-box class="max-w-lg">
    <div>
      <x-item.page-title class="text-center text-30fs text-wood-color" title="LIÊN HỆ" />
    </div>
    <div class="mx-auto mt-8 space-y-6 border py-8 px-4 lg:px-6 bg-white sm:rounded-lg border-gray-200 shadow-sm">
      <div class="text-base sm:text-sm font-medium">
        <span>Hãy nhập vào các mục bắt buộc, sau đó nhấn nút GỬI</span> <br class="md:hidden">
        <span>Nếu bạn đang gấp, xin vui lòng liên hệ với chúng tôi qua điện thoại.</span>
      </div>
      <form id="contactForm" class="mt-4 grid grid-cols-1 gap-y-6 sm:gap-x-4" action="{{ route('contact.send') }}"
        method="POST">
        {{ csrf_field() }}
        <x-form.field title="Họ và Tên" type="text" name="name" redtitle="bắt buộc" />
        <x-form.field title="Tên Công Ty" type="text" name="company" redtitle="bắt buộc" />
        <x-form.field title="e-mail" type="text" name="email" redtitle="bắt buộc" />
        <x-form.field title="Số điện thoại" type="text" name="phone" redtitle="bắt buộc" />
        <x-form.field title="Nội dung liên hệ" type="textarea" name="content" redtitle="bắt buộc" />

        <div>
          <x-item.button>GỬI</x-item.button>
        </div>

      </form>
    </div>
  </x-shared.content-box>
@endsection
