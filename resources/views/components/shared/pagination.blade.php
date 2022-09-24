@if (isset($paginator) && $paginator->lastPage() > 1)

  {{-- <ul class="pagination flex text-base">
    @php
      $interval = isset($interval) ? abs(intval($interval)) : 3;
      $from = $paginator->currentPage() - $interval;
      if ($from < 1) {
          $from = 1;
      }
      $to = $paginator->currentPage() + $interval;
      if ($to > $paginator->lastPage()) {
          $to = $paginator->lastPage();
      }
      $params = '';
      if (isset(request()->per_page)) {
          $params .= '&per_page=' . request()->per_page;
      }
      if (isset(request()->cate)) {
          $params .= '&cate=' . request()->cate;
      }
      if (isset(request()->filter)) {
          $params .= '&filter=' . request()->filter;
      }
      if (isset(request()->keyword)) {
          $params .= '&keyword=' . request()->keyword;
      }
    @endphp
    <!-- first/previous -->
    @if ($paginator->currentPage() > 1)
      <li>
        <a href="{{ $paginator->url(1) . $params }}" aria-label="First">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li>
        <a href="{{ $paginator->url($paginator->currentPage() - 1) . $params }}" aria-label="Previous">
          <span aria-hidden="true">&lsaquo;</span>
        </a>
      </li>
    @endif
    <!-- links -->
    @for ($i = $from; $i <= $to; $i++)
      @php
        $isCurrentPage = $paginator->currentPage() == $i;
      @endphp
      <li class="{{ $isCurrentPage ? 'active' : '' }}">
        <a href="{{ !$isCurrentPage ? $paginator->url($i) . $params : '#' }}">
          {{ $i }}
        </a>
      </li>
    @endfor
    <!-- next/last -->
    @if ($paginator->currentPage() < $paginator->lastPage())
      <li>
        <a href="{{ $paginator->url($paginator->currentPage() + 1) . $params }}" aria-label="Next">
          <span aria-hidden="true">&rsaquo;</span>
        </a>
      </li>
      <li>
        <a href="{{ $paginator->url($paginator->lastpage()) . $params }}" aria-label="Last">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    @endif
  </ul> --}}
  {{-- {{ dd($paginator) }} --}}
  {{-- {{ $paginator }} --}}
  {{-- {{ dd(explode('&', request()->getQueryString())) }} --}}
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="flex items-center justify-between border-t px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
      <a href="#"
        class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
      <a href="#"
        class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Showing
          <span class="font-medium">{{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }}</span>
          to
          <span
            class="font-medium">{{ $paginator->currentPage() < $paginator->lastPage() ? $paginator->currentPage() * $paginator->perPage() : $paginator->total() }}</span>
          of
          <span class="font-medium">{{ $paginator->total() }}</span>
          results
        </p>
      </div>
      <div>
        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
          <a href="#"
            class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
            <span class="sr-only">Previous</span>
            <!-- Heroicon name: mini/chevron-left -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              aria-hidden="true">
              <path fill-rule="evenodd"
                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                clip-rule="evenodd" />
            </svg>
          </a>
          <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
          @for ($i = 0; $i < $paginator->lastPage(); $i++)
            <a href="{{ $paginator->url($i + 1) . '&' . $queryString }}"
              class="relative inline-flex items-center border px-4 py-2 text-sm font-medium text-gray-500 focus:z-20 
              {{ $paginator->currentPage() == $i + 1 ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' }}">{{ $i + 1 }}</a>
          @endfor
          <a href="#"
            class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
            <span class="sr-only">Next</span>
            <!-- Heroicon name: mini/chevron-right -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              aria-hidden="true">
              <path fill-rule="evenodd"
                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                clip-rule="evenodd" />
            </svg>
          </a>
        </nav>
      </div>
    </div>
  </div>
@endif
