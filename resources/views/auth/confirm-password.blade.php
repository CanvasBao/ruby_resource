@extends('layout.html')

@section('meta')
<x-shared.meta title="Xác nhận mật khẩu">
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <x-item.page-title title="Xác nhận mật khẩu" />
        <p class="mt-2 text-center text-sm text-gray-600">
            <a href="/" class="font-medium text-indigo-600 hover:text-indigo-500">Đến Trang Chủ</a>
        </p>
    </div>
    <x-shared.error-msg />
    <form class="mt-8 space-y-6" action="{{route('password.confirm')}}" method="POST">
        {{ csrf_field() }}
        <div class="rounded-md shadow-sm -space-y-px">
            <div>
                <x-form.row>
                    <x-form.input hideError="true" type="password" name="password" place="mật khẩu"/>
                </x-form.row>
            </div>
        </div>

        <div>
            <x-item.button>Xác nhận</x-item.button>
        </div>
    </form>
</x-shared.content-box>
@endsection
