@extends('layout.html')

@section('meta')
  <x-shared.meta title="{{ $product->name }}">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('scripts')
<script type="text/javascript">
  const chooseImage = (imgId) => {
    for(let button of document.querySelectorAll('.imageTab')){
      button.classList.remove('isShow')
    }
    document.getElementById('tab-'+imgId)?.classList.add('isShow')
    for(let button of document.querySelectorAll('.imagePanel')){
      button.classList.remove('isShow')
    }
    document.getElementById('panel-'+imgId)?.classList.add('isShow')
  }
</script>
@endsection

@section('content')
  <div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
        <!-- Image gallery -->
        <div class="productImage sticky top-16 flex flex-col-reverse">
          <!-- Image selector -->
          <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">

              @foreach ($product->images as $image)
                <button id="tab-{{ $image->id }}"
                  onclick="chooseImage('{{$image->id}}')"
                  class="group imageTab relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4"
                  aria-controls="tabs-1-panel-1" role="tab" type="button">
                  <span class="sr-only">Angled view</span>
                  <span class="absolute inset-0 overflow-hidden rounded-md">
                    <img src="{{ asset('storage/uploads/product/' . $image->image) }}" alt=""
                      class="h-full w-full object-cover object-center">
                  </span>
                  <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                  <span class="borderSelected pointer-events-none absolute inset-0 rounded-md"
                    aria-hidden="true"></span>
                </button>
              @endforeach

              <!-- More images... -->
            </div>
          </div>

          <div class="aspect-h-1 aspect-w-1 w-full imagesPanelSection">
            @foreach ($product->images as $key => $image)
              <!-- Tab panel, show/hide based on tab state. -->
              <div id="panel-{{ $image->id }}" class="imagePanel {{ $key == 0 ? 'isShow' : ''}}" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                <img src="{{ asset('storage/uploads/product/' . $image->image) }}" alt=""
                  class="h-full w-full object-cover object-center sm:rounded-lg">
              </div>
            @endforeach

          </div>
        </div>

        <!-- Product info -->
        <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>

          @isset($product->price)
            <div class="mt-3">
              <h2 class="sr-only">Product information</h2>
              <p class="text-3xl tracking-tight text-gray-900">{{ $product->price }}</p>
            </div>
          @endisset

          <!-- Reviews -->
          <div class="mt-3">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <!-- Active: "text-indigo-500", Inactive: "text-gray-300" -->
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                    clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                    clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                    clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                    clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor"
                  aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                    clip-rule="evenodd" />
                </svg>
              </div>
              <p class="sr-only">4 out of 5 stars</p>
            </div>
          </div>

          <div class="mt-6">
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6 text-base text-gray-700">
              <p>{!! nl2br(htmlentities($product->short_des)) !!}</p>
            </div>
          </div>


          <section aria-labelledby="details-heading" class="mt-12">
            <h2 id="details-heading" class="sr-only">Additional details</h2>

            <div class="desSection toggleSection divide-y divide-gray-200 border-t">
              @foreach ($product->descriptions as $key => $description)
              <div class="toggleItem isOpened">
                <h3 class="toggleItemHeader">
                  <!-- Expand/collapse question button -->
                  <button type="button" class="group relative flex w-full items-center justify-between py-6 text-left"
                    aria-controls="disclosure-1" aria-expanded="false">
                    <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                    <span class="text-sm font-medium">{{ $description->title }}</span>
                    <span class="ml-6 flex items-center toggleItemButton">
                      <!-- Open: "hidden", Closed: "block" -->
                      <svg class="toggleItemClosed block h-6 w-6 text-gray-400 group-hover:text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                      </svg>
                      <!-- Open: "block", Closed: "hidden" -->
                      <svg class="toggleItemOpened h-6 w-6 text-indigo-400 group-hover:text-indigo-500" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                      </svg>
                    </span>
                  </button>
                </h3>
                <div class="prose prose-sm pb-6 toggleItemContent" id="disclosure-1">
                  {!! $description->content !!}
                </div>
              </div>
              @endforeach
              <!-- More sections... -->
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection
