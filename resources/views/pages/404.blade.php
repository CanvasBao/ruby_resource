@extends('layout.html')

@section('meta')
  <x-shared.meta title="404">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="min-h-full bg-white px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
    <div class="mx-auto max-w-max">
      <main class="sm:flex">
        <p class="text-4xl font-bold tracking-tight text-indigo-600 sm:text-5xl">404</p>
        <div class="sm:ml-6">
          <div class="sm:border-l sm:border-gray-200 sm:pl-6">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Trang không tồn tại</h1>
            <p class="mt-1 text-base text-gray-500">Hãy kiểm tra lại url trên thanh địa chỉ và thử lại</p>
          </div>
          <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
            <a href="{{ route('top') }}"
              class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              Trở về Trang Chủ</a>
            <a href="{{ route('contact.show') }}"
              class="inline-flex items-center rounded-md border border-transparent bg-indigo-100 px-4 py-2 text-sm font-medium text-indigo-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Liên
              hệ</a>
          </div>
        </div>
      </main>
    </div>
  </div>
@endsection
