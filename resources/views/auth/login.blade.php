@extends('layout.html')

@section('meta')
<x-shared.meta title="Đăng nhập">
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Đăng nhập</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            hoặc
            <a href="{{route('register')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Đăng Ký
            </a>
        </p>
    </div>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="mb-4">
        @foreach ($errors->all() as $error)
        <div class="mb-1 font-medium text-sm text-red-600">
            {{ $error }}
        </div>
        @endforeach
    </div>
    @endif
    <form class="mt-8 space-y-6" action="{{route('login')}}" method="POST">
        {{ csrf_field() }}
        <div class="rounded-md shadow-sm -space-y-px">
            <x-form.row>
                <x-form.input hideError="true" type="email" name="email" place="e-mail" inpClass="rounded-none rounded-t-lg"/>
            </x-form.row>
            <x-form.row>
                <x-form.input hideError="true" type="password" name="password" place="mật khẩu" inpClass="rounded-none rounded-b-lg"/>
            </x-form.row>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    @checked(old('remember')==='on' )>
                <label for="remember" class="ml-2 block text-sm text-gray-900">Ghi nhớ đăng nhập</label>
            </div>

            <div class="text-sm">
                <a href="{{route('password.request')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Quên mật khẩu？
                </a>
            </div>
        </div>

        <div>
            <x-item.button>Đăng nhập</x-item.button>
        </div>
    </form>
</x-shared.content-box>
@endsection
