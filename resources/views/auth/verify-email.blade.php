@extends('layout.html')

@section('meta')
<x-shared.meta title="resend verify mail">
    {{--
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <x-item.page-title title="Tái xác nhận e-mail?" />
        <p class="mt-2 text-center text-sm text-gray-600">
            <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Đến Đăng Nhập</a>
        </p>
    </div>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <x-shared.error-msg />
    <form class="mt-8 space-y-6" action="{{route('verification.send')}}" method="POST">
        {{ csrf_field() }}
        <div>
            <x-item.button>Gửi</x-item.button>
        </div>
    </form>
</x-shared.content-box>
@endsection
