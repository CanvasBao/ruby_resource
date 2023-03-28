<div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
  <div class="relative">
    <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class="text-lg font-semibold text-cyan-600">kinh doanh</h2>
      <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Loại sản phẩm kinh doanh</p>
      {{-- <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">Phasellus lorem quam molestie id quisque diam
        aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.
      </p> --}}
    </div>
    <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-3 lg:px-8">
      @foreach ($materials as $material)
        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
          <div class="flex-shrink-0">
            <img class="h-48 w-full object-cover" src="{{ asset('storage/images/' . $material['image']) }}"
              alt="" />
          </div>
          <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
              <p class="text-sm font-medium text-cyan-600">
                <a href="#" class="hover:underline">{{ $material['category_name'] }}</a>
              </p>
              <a href="#" class="mt-2 block">
                <p class="text-xl font-semibold text-gray-900">{{ $material['title'] }}</p>
                <p class="mt-3 text-base text-gray-500">{{ $material['description'] }}</p>
              </a>
            </div>
            {{-- <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
              <a href="#">
                <img class="h-10 w-10 rounded-full"
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                  alt="Roel Aufderehar" />
              </a>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">
                <a href="#" class="hover:underline">Roel Aufderehar</a>
              </p>
              <div class="flex space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-16">Mar 16, 2020</time>
                <span aria-hidden="true">&middot;</span>
                <span>6 min read</span>
              </div>
            </div>
          </div> --}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
