@extends('layout.html')

@section('meta')
  <x-shared.meta title="Trang chủ">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  </x-shared.meta>
@endsection

@section('content')
  <div class="bg-white">
    @php
      $topImage = [''];
    @endphp
    <div class="h-[calc(100vh-65px)]">
      <x-top.slider :images="$topImage" />
    </div>

    <!-- Feature section with screenshot -->
    <div class="relative bg-gray-50 pt-16 sm:pt-24 lg:pt-32">
      <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
        <div>
          <h2 class="text-lg font-semibold text-cyan-600">Giới thiệu</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">No server? No problem.</p>
          <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">Phasellus lorem quam molestie id quisque diam
            aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.
          </p>
        </div>
        <div class="mt-12 -mb-10 sm:-mb-24 lg:-mb-80">
          <img class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5"
            src="https://tailwindui.com/img/component-images/green-project-app-screenshot.jpg" alt="" />
        </div>
      </div>
    </div>

    <!-- Feature section with grid -->
    <x-top.product />

    <!-- Testimonial section -->
    <div class="bg-gradient-to-r from-teal-500 to-cyan-600 pb-16 lg:relative lg:z-10 lg:pb-0">
      <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-8 lg:px-8">
        <div class="relative lg:-my-8">
          <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"></div>
          <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:h-full lg:p-0">
            <div
              class="aspect-w-10 aspect-h-6 overflow-hidden rounded-xl shadow-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
              <img class="object-cover lg:h-full lg:w-full"
                src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2102&q=80"
                alt="" />
            </div>
          </div>
        </div>
        <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
          <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
            <blockquote>
              <div>
                <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                </svg>
                <p class="mt-6 text-2xl font-medium text-white">Lorem ipsum dolor sit amet, consectetur adipiscing
                  elit. Sed urna nulla vitae laoreet augue. Amet feugiat est integer dolor auctor adipiscing nunc
                  urna, sit.</p>
              </div>
              <footer class="mt-6">
                <p class="text-base font-medium text-white">Judith Black</p>
                <p class="text-base font-medium text-cyan-100">CEO at PureInsights</p>
              </footer>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <!-- Blog section -->
    <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
      <div class="relative">
        <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-lg font-semibold text-cyan-600">Learn</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Helpful Resources</p>
          <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">Phasellus lorem quam molestie id quisque diam
            aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.
          </p>
        </div>
        <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-3 lg:px-8">
          <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            <div class="flex-shrink-0">
              <img class="h-48 w-full object-cover"
                src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                alt="" />
            </div>
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
              <div class="flex-1">
                <p class="text-sm font-medium text-cyan-600">
                  <a href="#" class="hover:underline">Article</a>
                </p>
                <a href="#" class="mt-2 block">
                  <p class="text-xl font-semibold text-gray-900">Boost your conversion rate</p>
                  <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis
                    dolorum.</p>
                </a>
              </div>
              <div class="mt-6 flex items-center">
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
              </div>
            </div>
          </div>

          <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            <div class="flex-shrink-0">
              <img class="h-48 w-full object-cover"
                src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                alt="" />
            </div>
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
              <div class="flex-1">
                <p class="text-sm font-medium text-cyan-600">
                  <a href="#" class="hover:underline">Video</a>
                </p>
                <a href="#" class="mt-2 block">
                  <p class="text-xl font-semibold text-gray-900">How to use search engine optimization to drive sales
                  </p>
                  <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore
                    optio animi., tempore temporibus quo laudantium.</p>
                </a>
              </div>
              <div class="mt-6 flex items-center">
                <div class="flex-shrink-0">
                  <a href="#">
                    <img class="h-10 w-10 rounded-full"
                      src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                      alt="Brenna Goyette" />
                  </a>
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">
                    <a href="#" class="hover:underline">Brenna Goyette</a>
                  </p>
                  <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-10">Mar 10, 2020</time>
                    <span aria-hidden="true">&middot;</span>
                    <span>4 min read</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
            <div class="flex-shrink-0">
              <img class="h-48 w-full object-cover"
                src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                alt="" />
            </div>
            <div class="flex flex-1 flex-col justify-between bg-white p-6">
              <div class="flex-1">
                <p class="text-sm font-medium text-cyan-600">
                  <a href="#" class="hover:underline">Case Study</a>
                </p>
                <a href="#" class="mt-2 block">
                  <p class="text-xl font-semibold text-gray-900">Improve your customer experience</p>
                  <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque
                    corporis perferendis hic.</p>
                </a>
              </div>
              <div class="mt-6 flex items-center">
                <div class="flex-shrink-0">
                  <a href="#">
                    <img class="h-10 w-10 rounded-full"
                      src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                      alt="Daniela Metz" />
                  </a>
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">
                    <a href="#" class="hover:underline">Daniela Metz</a>
                  </p>
                  <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-02-12">Feb 12, 2020</time>
                    <span aria-hidden="true">&middot;</span>
                    <span>11 min read</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="relative bg-gray-900">
      <div class="relative h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <img class="h-full w-full object-cover"
          src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&sat=-100"
          alt="" />
        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 mix-blend-multiply">
        </div>
      </div>
      <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">
        <div class="md:ml-auto md:w-1/2 md:pl-10">
          <h2 class="text-lg font-semibold text-gray-300">Award winning support</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">We’re here to help</p>
          <p class="mt-3 text-lg text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas
            tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et fermentum, augue. Aliquet amet
            volutpat quisque ut interdum tincidunt duis.</p>
          <div class="mt-8">
            <div class="inline-flex rounded-md shadow">
              <a href="#"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-medium text-gray-900 hover:bg-gray-50">
                Visit the help center
                <!-- Heroicon name: mini/arrow-top-right-on-square -->
                <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z"
                    clip-rule="evenodd" />
                  <path fill-rule="evenodd"
                    d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z"
                    clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
