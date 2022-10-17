<x-shared.filter-bar method="GET" action="{{ route('product.list') }}"
  boxclass="rounded-sm border sm:rounded-lg border-gray-200 shadow-sm w-full h-full mb-5 p-3 text-sm bg-gray-100 {{ $boxclass ?? '' }}"
  {{ $attributes->except(['method', 'action', 'boxclass']) }}>
  @php
    $filter_list = ['đề xuất', 'mới nhất'];
    $filter = request()->filter;
  @endphp
  <x-slot:leftSlot>
    <div class="flex md:flex-row">
      @isset(request()->cate)
        <input type="hidden" name="cate" value="{{ request()->cate }}" />
      @endisset
      @isset(request()->keyword)
        <input type="hidden" name="keyword" value="{{ request()->keyword }}" />
      @endisset
      <span class="mr-3 flex md:items-center">ソート: </span>

      <div>
        @foreach ($filter_list as $key => $value)
          <input id="filter_{{ $key }}" class="hidden" type="radio" name="filter" @checked($filter == $value)
            value="{{ $value }}" onchange="this.form.submit()">
          <label
            class="relative m-1 md:m-0 md:mr-1 inline-block px-6 py-2.5 font-medium text-xs leading-tight uppercase rounded {{ $filter == $value
                ? 'cursor-default bg-indigo-500 text-white'
                : 'cursor-pointer bg-gray-200 text-gray-700 hover:bg-gray-300 hover:shadow-sm focus:outline-none focus:ring-0' }}"
            for="filter_{{ $key }}">{{ $value }}
            @if ($filter == $value)
              <span onclick="unCheckedFilterSort(event, 'filter')"
                class="absolute top-1 right-1 h-3 w-3 cursor-pointer">✕</span>
            @endif
          </label>
        @endforeach
      </div>
      <div class="hidden md:flex md:ml-1 items-center">
        <span>(Toàn bộ {{ $total }})</span>
      </div>
    </div>
  </x-slot:leftSlot>
  <x-slot:rightSlot>
    @isset($perPage)
      <span>Số kiện hiển thị：</span>
      <select name="per_page" onchange="this.form.submit()"
        class="bg-slate-50 inline-block pl-5 pr-7 py-2 font-medium text-sm leading-tight rounded">
        @foreach ([10, 20, 50] as $value)
          <option class="px-4" @selected($perPage == $value) value="{{ $value }}">{{ $value }}
          </option>
        @endforeach
      </select>
    @endisset
  </x-slot:rightSlot>
</x-shared.filter-bar>
