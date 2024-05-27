<div class="relative py-4 mt-20 rounded-lg sm:py-6 lg:py-8">
  <div class="relative">
    <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
      {{-- <h2 class="text-lg font-semibold text-cyan-600">kinh doanh</h2> --}}
      <p class="mt-2 text-3xl font-bold tracking-tight text-gray-50 sm:text-4xl">dịch vụ</p>
      {{-- <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">Phasellus lorem quam molestie id quisque diam
        aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.
      </p> --}}
    </div>
    <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-full lg:max-w-7xl grid-cols-1 lg:px-8 ">
      @foreach ($materials  as $idx => $material)
        <div class="flex flex-col lg:flex-row overflow-hidden rounded-lg lg:gap-x-6">
          <div class="flex-shrink-0 rounded-lg {{ $idx % 2 == 0 ? "lg:order-last" : '' }}">
            <img class="h-48 sm:h-56 lg:h-80 w-full lg:w-auto rounded-t-xl lg:rounded-lg lg:aspect-[4/3] object-cover" src="{{ asset('storage/images/' . $material['image']) }}"
              alt="" />
          </div>
          <div class="flex flex-1 flex-col justify-between p-6 bg-slate-50 lg:bg-inherit lg:from-slate-50 rounded-b-xl lg:rounded-lg {{ $idx % 2 == 0 ? "lg:text-right lg:pr-12 lg:bg-gradient-to-l" : 'lg:pl-12 lg:bg-gradient-to-r' }}">
            <div class="flex {{ $idx % 2 == 0 ? "md:justify-end" : '' }}">
              <a href="#" class="mt-2 block lg:w-3/4">
                <p class="text-xl font-semibold text-cyan-600">{{ $material['title'] }}</p>
                <p class="mt-3 text-sm md:text-base text-gray-900">{{ $material['description'] }}</p>
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
