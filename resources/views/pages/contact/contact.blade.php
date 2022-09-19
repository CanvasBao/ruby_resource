@extends('layout.html')

@section('meta')
<x-shared.meta title="Liên hệ">
    {{--
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <x-item.page-title class="text-center text-30fs text-wood-color" title="Liên hệ" />
    </div>
    <div class="smd:bg-[#ffff] smd:pt-[39px] smd:pr-[25px] smd:pb-[70px] smd:pl-[21px] smd:mt-[51px] pt-[80px]">
        <div class="smd:text-[14px] smd:leading-[22px] text-16fs-28lh font-medium text-wood-color smd:p-0">
            <span>Hãy nhập vào các mục bắt buộc, sau đó nhấn nút GỬI</span> <br class="md:hidden">
            <span class="md:hidden">Nếu bạn đang gấp, xin vui lòng liên hệ với chúng tôi qua điện thoại.</span>
        </div>
        <form id="contactForm" class="pt-[60px] pb-20" action="{{route('contact.send')}}" method="POST">
            {{ csrf_field() }}
            <div class="space-y-[30px] text-[14px] leading-[22px] md:text-[16px] md:leading-[24px]">
                <x-form.row rowTitle="Tên" redtitle="bắt buộc">
                    <x-form.input type="text" name="name" place="Họ và Tên"/>
                </x-form.row>
                <x-form.row rowTitle="Tên Công Ty" redtitle="bắt buộc">
                    <x-form.input type="text" name="company" place="Ruby label"/>
                </x-form.row>
                <x-form.row rowTitle="địa chỉ mail" redtitle="bắt buộc">
                    <x-form.input type="text" name="email" place="samplemail@info.co.jp"/>
                </x-form.row>
                <x-form.row rowTitle="điện thoại" redtitle="bắt buộc">
                    <x-form.input type="text" name="tel" place="08012345678"/>
                </x-form.row>
                <x-form.row rowTitle="nội dung" redtitle="bắt buộc">
                    <x-form.input type="textarea" name="content" place=""/>
                </x-form.row>
            </div>

            <div class="pt-[90px] max-w-[285px] m-auto">
                <x-item.button>GỬI</x-item.button>
            </div>

        </form>
    </div>
    <script>
    document.querySelector('#contactForm').addEventListener("submit", () => {
        showLoading();
    });
    </script>
</x-shared.content-box>
@endsection