@isset($categories)
  <div>
    <div class="sm:hidden">
      <label for="tabs" class="sr-only">Select a tab</label>
      <select id="tabs" name="tabs"
        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        <option value="all" selected>Tất cả</option>
        @foreach ($categories as $category)
          <option value="{{ $category->category_slug }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>
    <div class="hidden sm:block">
      <nav class="flex space-x-4" aria-label="Tabs">
        <div data-cat="{{'all'}}" class="productTab active rounded-md px-3 py-2 text-sm font-medium cursor-pointer">Tất cả</div>
        @foreach ($categories as $category)
          <div data-cat="{{$category->category_slug}}" class="productTab rounded-md px-3 py-2 text-sm font-medium cursor-pointer">
            {{ $category->category_name }}</div>
        @endforeach
      </nav>
    </div>

    <script>
      function productTabClick(e) {
        document.querySelector('.productsList').innerHTML = ''
        window.livewire.emit('fetchProductList', this.getAttribute('data-cat'));
        document.querySelectorAll('div.productTab').forEach(tabEl => {
          tabEl.classList.remove("active");
        });
        if (this.classList.contains('active')) {
          this.classList.remove("active");
        } else {
          this.classList.add("active");
        }
      }
      window.addEventListener("load", () => {
        document.querySelectorAll('div.productTab').forEach(tabEl => {
          tabEl.addEventListener("click", productTabClick, false);
        })
      });
    </script>
  </div>
@endisset
