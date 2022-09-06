@extends('layout.html')

@section('meta')
<x-shared.meta title="パスワードを忘れた方">
    {{--
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
</x-shared.meta>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full space-y-8">
        <div>
            <x-item.page-title title="再送確認？" />
            <p class="mt-2 text-center text-sm text-gray-600">
                <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">ログインへ </a>
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
                <x-item.button>送信</x-item.button>
            </div>
        </form>
    </div>
</div>
@endsection
