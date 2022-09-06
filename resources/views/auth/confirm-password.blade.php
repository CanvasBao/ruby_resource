@extends('layout.html')

@section('meta')
<x-shared.meta title="パスワードの確認">
</x-shared.meta>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full space-y-8">
        <div>
            <x-item.page-title title="パスワードを確認" />
            <p class="mt-2 text-center text-sm text-gray-600">
                <a href="/" class="font-medium text-indigo-600 hover:text-indigo-500">トップページへ</a>
            </p>
        </div>
        <x-shared.error-msg />
        <form class="mt-8 space-y-6" action="{{route('password.confirm')}}" method="POST">
            {{ csrf_field() }}
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <x-form.row>
                        <x-form.input hideError="true" type="password" name="password" place="パスワード"/>
                    </x-form.row>
                </div>
            </div>

            <div>
                <x-item.button>確認</x-item.button>
            </div>
        </form>
    </div>
</div>
@endsection
