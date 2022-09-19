@extends('layout.html')

@section('meta')
<x-shared.meta title="Thông tin tài khoản">
</x-shared.meta>
@endsection


@section('content')
<x-shared.content-box class="max-w-md">
    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Thông tin Tài khoản</h2>
    </div>
    <div class="mt-8 space-y-6">
        <div class="rounded-md shadow-sm space-y-3">
            <x-form.row rowTitle="Họ và Tên">
                <x-form.input type="text" name="name" place="Họ và Tên" value="{{ $user->name }}" readonly />
            </x-form.row>
            <x-form.row rowTitle="Tên Công Ty">
                <x-form.input type="text" name="company" place="Tên Công Ty" value="{{ $user->company }}" readonly />
            </x-form.row>
            <x-form.row rowTitle="e-mail">
                <x-form.input type="email" name="email" place="samplemail@info.vn" value="{{ $user->email }}" readonly />
            </x-form.row>
            <x-form.row rowTitle="Đại chỉ">
                <x-form.input type="text" name="address" place="TP HCM" value="{{ $user->address }}" readonly />
            </x-form.row>
            <x-form.row rowTitle="Số điện thoại">
                <x-form.input type="text" name="tel" place="08012345678" value="{{ $user->tel }}" readonly />
            </x-form.row>
        </div>

        <div>
            <a href="{{route('profile.edit')}}"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Edit profile
            </a>
            <a href="{{route('profile.password')}}"
                class="group relative w-full flex justify-center py-2 px-4 mt-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Change password
            </a>
        </div>
    </div>
</x-shared.content-box>
@endsection
