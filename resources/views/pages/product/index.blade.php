@extends('layout.html')

@section('meta')
  <x-shared.meta title="Sản Phẩm">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="flex flex-col items-center justify-center bg-slate-100 text-2xl">
    <x-shared.content-box>
      <div class="bg-white mx-auto max-w-2xl py-16 px-4 sm:py-20 sm:px-8 lg:max-w-7xl lg:px-10">
        Sản Phẩm
      </div>
    </x-shared.content-box>
  </div>
@endsection
