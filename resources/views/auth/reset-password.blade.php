@extends('layout.html')

@section('meta')
<x-shared.meta title="reset password">
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <x-item.page-title title="reset password" />
        <p class="mt-2 text-center text-sm text-gray-600">
            <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Đến Đăng Nhập</a>
        </p>
    </div>
    <x-shared.error-msg />
    <form class="mt-8 space-y-6" action="{{route('password.update')}}" method="POST">
        {{ csrf_field() }}
        <div class="rounded-md shadow-sm -space-y-px">
            <input type="hidden" name="token" value="{{$request->token}}" />
            <x-form.row>
                <x-form.input hideError="true" type="email" name="email" place="e-mail" inpClass="rounded-none rounded-t-lg"/>
            </x-form.row>
            <x-form.row>
                <x-form.input hideError="true" type="password" name="password" place="mật khẩu" inpClass="rounded-none"/>
            </x-form.row>
            <x-form.row>
                <x-form.input hideError="true" type="password" name="password_confirmation" place="xác nhận mật khẩu" inpClass="rounded-none rounded-b-lg"/>
            </x-form.row>
        </div>

        <div>
            <x-item.button>Đăng ký</x-item.button>
        </div>
    </form>
</x-shared.content-box>
@endsection
