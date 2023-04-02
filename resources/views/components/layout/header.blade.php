<header>
  <nav class="bg-white shadow fixed w-full t-0 z-40">
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
  </nav>
  <div id="mobileMenu" class="menu sm:hidden bg-white z-30 h-screen w-full flex-none block fixed px-3 pb-4 pt-[80px]">
    <div class="mt-6 flow-root">
      <div class="-my-6 divide-y divide-gray-500/10">
        <div class="space-y-2 py-6">
          <x-layout.header.navbar />
        </div>
      </div>
    </div>
  </div>
  <script>
    function menuClick(e) {
      let menuEl = document.querySelector('div#mobileMenu')
      if (this.classList.contains('active')) {
        this.classList.remove("active");
        this.classList.add("unactive");
        menuEl.classList.remove("active");
        menuEl.classList.add("unactive");
      } else {
        this.classList.add("active");
        this.classList.remove("unactive");
        menuEl.classList.add("active");
        menuEl.classList.remove("unactive");
      }
    }
    window.addEventListener("load", () => {
      const menubtn = document.querySelector('div.menu-button-icon')
      menubtn.addEventListener("click", menuClick, false);
    });
  </script>
</header>
