@extends('layout.html')

@section('meta')
<x-shared.meta title="ユーザー登録">
</x-shared.meta>
@endsection

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-[500px] w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">アカウントを登録</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                また
                <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500"> ログインへ
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
                <x-form.row rowTitle="お名前" redtitle="必須">
                    <x-form.input type="text" name="last_name" place="姓"/>
                    <x-form.input type="text" name="first_name" place="名"/>
                </x-form.row>
                <x-form.row rowTitle="フリガナ" redtitle="必須">
                    <x-form.input type="text" name="last_name_kana" place="セイ"/>
                    <x-form.input type="text" name="first_name_kana" place="メイ"/>
                </x-form.row>
                <x-form.row rowTitle="メールアドレス" redtitle="必須">
                    <x-form.input type="email" name="email" place="samplemail@info.co.jp"/>
                </x-form.row>
                <x-form.row rowTitle="パスワード" redtitle="必須">
                    <x-form.input type="password" name="password" place="⚫⚫⚫⚫⚫⚫⚫⚫"/>
                </x-form.row>
                <x-form.row rowTitle="パスワード確認" redtitle="必須">
                    <x-form.input type="password" name="password_confirmation" place="⚫⚫⚫⚫⚫⚫⚫⚫"/>
                </x-form.row>
                <x-form.row rowTitle="郵便番号" redtitle="必須">
                    <x-form.input type="text" name="post_code" place="09300015"/>
                </x-form.row>
                <x-form.row rowTitle="都道府県・市区町村・番地" redtitle="必須">
                    <x-form.input type="text" name="address_1" place="富山県富山市婦中町西本郷436-62"/>
                </x-form.row>
                <x-form.row rowTitle="建物名・号室">
                    <x-form.input type="text" name="address_2" place="富山アパート 102号室"/>
                </x-form.row>
                <x-form.row rowTitle="TEL" redtitle="必須">
                    <x-form.input type="text" name="tel" place="08012345678"/>
                </x-form.row>
                <x-form.row rowTitle="生年月日" redtitle="必須">
                    <x-form.input type="date" name="birthday" place=""/>
                </x-form.row>
            </div>

            <div>
                <x-item.button>登録</x-item.button>
            </div>
        </form>
    </div>
</div>
@endsection
