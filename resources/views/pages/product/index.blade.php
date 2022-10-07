@extends('layout.html')

@section('meta')
  <x-shared.meta title="Sản Phẩm">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="flex flex-col items-center justify-center bg-slate-100 text-2xl">
    <x-shared.content-box>
      <x-product.list :products="$products" />
    </x-shared.content-box>
  </div>
@endsection
