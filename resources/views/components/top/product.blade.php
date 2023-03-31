<div class="relative bg-white py-16 sm:py-24 lg:py-32">
  <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-lg font-semibold text-cyan-600">Sản phẩm đa dạng</h2>
    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Mọi thứ bạn cần</p>
    <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">
      Mọi nhu cầu về in tem nhãn chất lượng cao của khách hàng cho từng ngành nghề, những yêu cầu kỹ thuật đặc biệt, chúng tôi luôn đáp ứng, giúp khách hàng đạt được mục tiêu thương hiệu của mình.
    </p>
    <div class="mt-12">
      <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">

        @foreach ($products as $product)
          <li class="relative">
            <div
              class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
              @isset($product['images'][0]->image)
                <img src="{{ asset('storage/uploads/product/' . $product['images'][0]->image) }}" alt=""
                  class="pointer-events-none object-cover group-hover:opacity-75">
              @else
                <img src="{{ asset('storage/images/no_image.jpg') }}" alt=""
                  class="pointer-events-none object-cover group-hover:opacity-75 border rounded-lg">
              @endisset
              <button type="button" class="absolute inset-0 focus:outline-none">
                <span class="sr-only">View details for IMG_4985.HEIC</span>
              </button>
            </div>
            <p class="text-left pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">
              {{ $product['name'] }}
            </p>
            <p class="text-left pointer-events-none block text-sm font-medium text-gray-500">{{ $product['short_des'] }}
            </p>
          </li>
        @endforeach
        <!-- More files... -->
      </ul>
    </div>
  </div>
</div>
