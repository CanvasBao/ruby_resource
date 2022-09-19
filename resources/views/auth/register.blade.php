@extends('layout.html')

@section('meta')
<x-shared.meta title="regist user">
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Đăng ký tài khoản</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Hoặc 
            <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Đăng nhập
            </a>
        </p>
    </div>
    {{-- @if ($errors->any())
    <div class="mb-4">
        @foreach ($errors->all() as $error)
        <div class="mb-1 font-medium text-sm text-red-600">
            {{ $error }}
        </div>
        @endforeach
    </div>
    @endif --}}
    <form class="mt-8 space-y-6" action="{{route('register')}}" method="POST">
        {{ csrf_field() }}
        <div class="rounded-md shadow-sm space-y-3">
            <x-form.row rowTitle="Họ và Tên" redtitle="*">
                <x-form.input type="text" name="name" place="Họ và Tên"/>
            </x-form.row>
            <x-form.row rowTitle="Tên Công Ty" redtitle="*">
                <x-form.input type="text" name="company" place="Tên Công Ty"/>
            </x-form.row>
            <x-form.row rowTitle="e-mail" redtitle="*">
                <x-form.input type="email" name="email" place="samplemail@info.vn"/>
            </x-form.row>
            <x-form.row rowTitle="mật khẩu" redtitle="*">
                <x-form.input type="password" name="password" place="*******"/>
            </x-form.row>
            <x-form.row rowTitle="Nhập lại mật khẩu" redtitle="*">
                <x-form.input type="password" name="password_confirmation" place="********"/>
            </x-form.row>
            <x-form.row rowTitle="Đại chỉ" redtitle="*">
                <x-form.input type="text" name="address" place="TP HCM"/>
            </x-form.row>
            <x-form.row rowTitle="Số điện thoại" redtitle="*">
                <x-form.input type="text" name="tel" place="08012345678"/>
            </x-form.row>
        </div>

        <div>
            <x-item.button>Đăng ký</x-item.button>
        </div>
    </form>
</x-shared.content-box>
@endsection
