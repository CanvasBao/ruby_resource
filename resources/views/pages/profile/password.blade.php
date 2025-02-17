@extends('layout.html')

@section('meta')
  <x-shared.meta title="Thay đổi mật khẩu">
  </x-shared.meta>
@endsection

@section('content')
  <x-shared.content-box class="max-w-md">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Thay đổi mật khẩu</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        hoặc
        <a href="{{ route('profile.show') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> Về thông tin tài
          khoản
        </a>
      </p>
    </div>
    <div class="mx-auto mt-8 space-y-6 border py-8 px-4 lg:px-6 bg-white sm:rounded-lg border-gray-200 shadow-sm max-w-lg">

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
      <form class="mt-8 space-y-6" action="{{ route('user-password.update') }}" method="POST">
        @method('PUT')
        {{ csrf_field() }}
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="current_password" class="sr-only">Current password</label>
            <input id="current_password" name="current_password" type="password" autocomplete="current-password" required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Current password" value="{{ old('current_password') }}">
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password">
          </div>
          <div>
            <label for="password_confirmation" class="sr-only">Password confirm</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
              required
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password confirm">
          </div>
        </div>

        <div>
          <button type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                  clip-rule="evenodd" />
              </svg>
            </span>
            Change
          </button>
        </div>
      </form>
    </div>
  </x-shared.content-box>
@endsection
