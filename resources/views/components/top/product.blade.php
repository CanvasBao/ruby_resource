<div class="relative bg-white py-16 sm:py-24 lg:py-32">
  @php
    $products = [
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
        [
            'name' => 'Push to Deploy',
            'short_des' => "Ac tincidunt sapien vehicula erat auctor pellentesque
                rhoncus. Et magna sit morbi vitae lobortis.",
            'image' => 'https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80',
        ],
    ];
  @endphp
  <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-lg font-semibold text-cyan-600">Sản phẩm đa dạng</h2>
    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need to deploy
      your app</p>
    <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">Phasellus lorem quam molestie id quisque diam
      aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.
    </p>
    <div class="mt-12">
      <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">

        @foreach ($products as $product)
          <li class="relative">
            <div
              class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
              <img src="{{ $product['image'] }}" alt=""
                class="pointer-events-none object-cover group-hover:opacity-75">
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
