@extends('layout.html')

@section('meta')
<x-shared.meta title="Quên mật khẩu">
</x-shared.meta>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <x-item.page-title title="Quên mật khẩu？" />
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
        <form class="mt-8 space-y-6" action="{{route('password.email')}}" method="POST">
            {{ csrf_field() }}
            <div class="rounded-md shadow-sm -space-y-px">
                <x-form.row>
                    <x-form.input hideError="true" type="text" name="email" place="e-mail"/>
                </x-form.row>
            </div>

            <div>
               <x-item.button>Gửi</x-item.button>
            </div>
        </form>
    </div>
</div>
@endsection
