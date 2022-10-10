@extends('layout.html')

@section('meta')
  <x-shared.meta title="{{ $product->name }}">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="bg-white">
    <div class="mx-auto max-w-2xl py-24 px-4 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $product->name }}</h2>
        <p class="mt-4 text-gray-500">As a digital creative, your laptop or tablet is at the center of your work. Keep your
          device safe with a fabric sleeve that matches in quality and looks.</p>
      </div>

      <div class="mt-16 space-y-16">
        <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-8">
          <div class="mt-6 lg:mt-0 lg:row-start-1 lg:col-span-5 xl:col-span-4 lg:col-start-1">
            <h3 class="text-lg font-medium text-gray-900">Minimal and thoughtful</h3>
            <p class="mt-2 text-sm text-gray-500">Our laptop sleeve is compact and precisely fits 13&quot; devices. The
              zipper allows you to access the interior with ease, and the front pouch provides a convenient place for your
              charger cable.</p>
          </div>
          <div class="flex-auto lg:row-start-1 lg:col-span-7 xl:col-span-8 lg:col-start-6 xl:col-start-5">
            <div class="aspect-w-5 aspect-h-2 overflow-hidden rounded-lg bg-gray-100">
              <img src="https://tailwindui.com/img/ecommerce-images/product-feature-07-detail-01.jpg"
                alt="White canvas laptop sleeve with gray felt interior, silver zipper, and tan leather zipper pull."
                class="object-cover object-center" />
            </div>
          </div>
        </div>

        <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-8">
          <div class="mt-6 lg:mt-0 lg:row-start-1 lg:col-span-5 xl:col-span-4 lg:col-start-8 xl:col-start-9">
            <h3 class="text-lg font-medium text-gray-900">Refined details</h3>
            <p class="mt-2 text-sm text-gray-500">We design every detail with the best materials and finishes. This laptop
              sleeve features durable canvas with double-stitched construction, a felt interior, and a high quality zipper
              that hold up to daily use.</p>
          </div>
          <div class="flex-auto lg:row-start-1 lg:col-span-7 xl:col-span-8 lg:col-start-1">
            <div class="aspect-w-5 aspect-h-2 overflow-hidden rounded-lg bg-gray-100">
              <img src="https://tailwindui.com/img/ecommerce-images/product-feature-07-detail-02.jpg"
                alt="Detail of zipper pull with tan leather and silver rivet." class="object-cover object-center" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
