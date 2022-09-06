@extends('layout.html')

@section('meta')
<x-shared.meta title="パスワードを再設定">
</x-shared.meta>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <x-item.page-title title="パスワードを再設定" />
            <p class="mt-2 text-center text-sm text-gray-600">
                <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">ログインへ </a>
            </p>
        </div>
        <x-shared.error-msg />
        <form class="mt-8 space-y-6" action="{{route('password.update')}}" method="POST">
            {{ csrf_field() }}
            <div class="rounded-md shadow-sm -space-y-px">
                <input type="hidden" name="token" value="{{$request->token}}" />
                <x-form.row>
                    <x-form.input hideError="true" type="email" name="email" place="メールアドレス" inpClass="rounded-none rounded-t-lg"/>
                </x-form.row>
                <x-form.row>
                    <x-form.input hideError="true" type="password" name="password" place="パスワード" inpClass="rounded-none"/>
                </x-form.row>
                <x-form.row>
                    <x-form.input hideError="true" type="password" name="password_confirmation" place="パスワード確認" inpClass="rounded-none rounded-b-lg"/>
                </x-form.row>
            </div>

            <div>
                <x-item.button>登録</x-item.button>
            </div>
        </form>
    </div>
</div>
@endsection
