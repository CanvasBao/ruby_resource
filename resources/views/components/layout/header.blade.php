<header>
  <nav class="bg-white shadow fixed w-full t-0 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <x-layout.header.logo />
        </div>
        <div class="hidden sm:flex sm:items-center">
          <div class="hidden sm:flex sm:space-x-4">
            <x-layout.header.navbar />
          </div>
        </div>
        <div class="-mr-2 flex items-center sm:hidden">
          <x-layout.header.menu-button />
        </div>
      </div>
    </div>

    <div class="sm:hidden" id="mobile-menu">
      <div class="menu pt-2 pb-3 space-y-1">
        <x-layout.header.navbar />
      </div>
    </div>
  </nav>
  <script></script>
</header>
