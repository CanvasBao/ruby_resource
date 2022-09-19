<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ユーザー登録</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="h-full">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-4">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Update your profile</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    <a href="{{route('profile.show')}}" class="font-medium text-indigo-600 hover:text-indigo-500"> Back
                        your profile
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
            <form class="mt-8 space-y-6" action="{{route('user-profile-information.update')}}" method="POST">
                @method('PUT')
                {{ csrf_field() }}
                <div class="rounded-md shadow-sm space-y-3">
                    <x-form.row rowTitle="Họ và Tên">
                        <x-form.input type="text" name="name" place="Họ và Tên" value="{{ $user->name }}"/>
                    </x-form.row>
                    <x-form.row rowTitle="Tên Công Ty">
                        <x-form.input type="text" name="company" place="Tên Công Ty" value="{{ $user->company }}"/>
                    </x-form.row>
                    <x-form.row rowTitle="e-mail">
                        <x-form.input type="email" name="email" place="samplemail@info.vn" value="{{ $user->email }}"/>
                    </x-form.row>
                    <x-form.row rowTitle="Đại chỉ">
                        <x-form.input type="text" name="address" place="TP HCM" value="{{ $user->address }}"/>
                    </x-form.row>
                    <x-form.row rowTitle="Số điện thoại">
                        <x-form.input type="text" name="tel" place="08012345678" value="{{ $user->tel }}"/>
                    </x-form.row>
                </div>

                <div>
                    <x-item.button>Update</x-item.button>
                </div>
            </form>
            <form class="mt-2" action="{{route('profile.delete')}}" method="POST">
                @method('delete')
                {{ csrf_field() }}
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Remove
                </button>
            </form>
        </div>
    </div>
</body>

</html>
