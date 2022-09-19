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
        <x-item.page-title title="Hoàn Thành Liên Hệ" />
        <p class="mt-2 text-center text-sm text-gray-600">
            <a href="{{route('top')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Đến Trang Chủ</a>
        </p>
    </div>
    <div class="w-full text-sm md:text-base">
        <div class="smd:text-[17px] smd:leading-[26px] text-[24px] leading-[28px] text-wood-color smd:p-0">Cảm ơn quý khách đã liên hệ</div>
        <div class="pt-[50px] smd:text-[14px] smd:leading-[22px]">
            Sau khi xác nhận nội dung, người phụ trách sẽ liên hệ với quý khách. <br><br>
            Ngoài ra, chúng tôi đã gửi một e-mail hoàn tất việc tiếp nhận đến địa chỉ e-mail của quý khách đã nhập. <br>
            Nếu bạn không nhận được email hoàn thành, quá trình này có thể không được thực hiện bình thường. <br>
            Chúng tôi xin lỗi vì sự bất tiện này, nhưng vui lòng thử lại quy trình.<br>
        </div>
    </div>
</x-shared.content-box>
@endsection