<x-shared.filter-bar method="GET" action="{{ route('news.list') }}"
  boxclass="rounded-sm border sm:rounded-lg border-gray-200 shadow-sm w-full h-full mb-5 p-3 text-sm bg-gray-100 {{ $boxclass ?? '' }}"
  {{ $attributes->except(['method', 'action', 'boxclass']) }}>
  @php
    $year = request()->year;
    $nowYear = Carbon\Carbon::now()->format('Y');
  @endphp
  <x-slot:leftSlot>
    <div class="flex md:flex-row">
      <span class="mr-3 flex md:items-center">ソート: </span>
      <select name="year" onchange="this.form.submit()"
        class="bg-slate-50 inline-block pl-5 pr-7 py-2 font-medium text-sm leading-tight rounded">
        <option @selected('' == $year) value="">-</option>
        @for ($i = $nowYear; $i >= 2019; $i--)
          <option @selected($i == $year) value="{{ $i }}">{{ $i }}
          </option>
        @endfor
      </select>
      <div class="hidden md:flex md:ml-3 items-center">
        <span>(全 {{ $total }}件)</span>
      </div>
    </div>
  </x-slot:leftSlot>
  <x-slot:rightSlot>
    @isset($perPage)
      <span>表示件数：</span>
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
