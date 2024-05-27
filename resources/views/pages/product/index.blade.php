@extends('layout.html')

@section('meta')
  <x-shared.meta title="Sản Phẩm">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="flex w-full items-center justify-center text-2xl">
    <x-shared.content-box boxclass="w-full" class="max-w-7xl">
      <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
        <h2 class="text-3xl font-bold tracking-tight sm:text-4xl text-blue-400">Sản phẩm</h2>
      </div>
      <x-product.tabs />
      <x-product.list :products="$products" />
    </x-shared.content-box>
  </div>
@endsection
