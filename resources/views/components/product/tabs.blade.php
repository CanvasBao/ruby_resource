@isset($categories)

  <div>
    <div class="sm:hidden">
      <label for="tabs" class="sr-only">Select a tab</label>
      <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
      <select id="tabs" name="tabs"
        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        <option value="all" selected>Tất cả</option>
        @foreach ($categories as $category)
          <option value="{{ $category->category_slug }}">{{ $category->category_name }}</option>
        @endforeach

        <option>Team Members</option>

        <option>Billing</option>
      </select>
    </div>
    <div class="hidden sm:block">
      <nav class="flex space-x-4" aria-label="Tabs">
        <!-- Current: "bg-indigo-100 text-indigo-700", Default: "text-gray-500 hover:text-gray-700" -->
        <div class="productTab bg-indigo-100 text-indigo-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer">Tất cả</div>

        @foreach ($categories as $category)
          <div class="productTab text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium cursor-pointer">
            {{ $category->category_name }}</div>
        @endforeach
      </nav>
    </div>
  </div>
@endisset
