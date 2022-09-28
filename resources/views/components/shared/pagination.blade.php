@if (isset($paginator))
  <div class="flex items-center justify-between border-t px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
      <a href="{{ $paginator->url($paginator->currentPage() - 1) . $queryString }}" @disabled($paginator->currentPage() == 1)
        class="{{ $paginator->currentPage() == 1 ? 'pointer-events-none bg-gray-100' : 'bg-white' }} relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
      <span class="text-sm py-2">{{ $paginator->currentPage() }}/{{ $paginator->lastPage() }} pages</span>
      <a href="{{ $paginator->url($paginator->currentPage() + 1) . $queryString }}" @disabled($paginator->currentPage() == $paginator->lastPage())
        class="{{ $paginator->currentPage() == $paginator->lastPage() ? 'pointer-events-none bg-gray-100' : 'bg-white' }} relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
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
          <a href="{{ $paginator->url($paginator->currentPage() - 1) . $queryString }}" @disabled($paginator->currentPage() == 1)
            class="{{ $paginator->currentPage() == 1 ? 'pointer-events-none bg-gray-100' : 'bg-white' }} relative inline-flex items-center rounded-l-md border border-gray-300 px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
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
          <!-- first page -->
          @if ($paginator->currentPage() > 1)
            <a href="{{ $paginator->url(1) . $queryString }}"
              class="relative inline-flex items-center border px-4 py-2 text-sm font-medium text-gray-500 focus:z-20
              {{ $paginator->currentPage() == 1 ? 'pointer-events-none z-10 bg-indigo-50 border-indigo-500 text-indigo-600' : 'bg-white border-gray-300 hover:bg-gray-50' }}">1</a>
          @endif

          <!-- befor current page -->
          @if ($paginator->currentPage() > 2)
            @if ($paginator->currentPage() - 2 > 1)
              <span
                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">...</span>
            @endif
            <a href="{{ $paginator->url($paginator->currentPage() - 1) . $queryString }}"
              class="relative inline-flex items-center border px-4 py-2 text-sm font-medium focus:z-20 bg-white border-gray-300 text-gray-500 hover:bg-gray-50">{{ $paginator->currentPage() - 1 }}</a>
          @endif

          <!-- current page -->
          <a href="{{ $paginator->url($paginator->currentPage()) . $queryString }}"
            class="relative inline-flex items-center border px-4 py-2 text-sm font-medium focus:z-20 pointer-events-none z-10 bg-indigo-50 border-indigo-500 text-indigo-600">{{ $paginator->currentPage() }}</a>

          <!-- after current page -->
          @if ($paginator->currentPage() + 1 < $paginator->lastPage())
            <a href="{{ $paginator->url($paginator->currentPage() + 1) . $queryString }}"
              class="relative inline-flex items-center border px-4 py-2 text-sm font-medium focus:z-20 bg-white border-gray-300 text-gray-500 hover:bg-gray-50">{{ $paginator->currentPage() + 1 }}</a>
            @if ($paginator->currentPage() + 2 < $paginator->lastPage())
              <span
                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">...</span>
            @endif
          @endif

          <!-- last page -->
          @if ($paginator->currentPage() < $paginator->lastPage())
            <a href="{{ $paginator->url($paginator->lastPage()) . $queryString }}"
              class="relative inline-flex items-center border px-4 py-2 text-sm font-medium text-gray-500 focus:z-20
            {{ $paginator->currentPage() == $paginator->lastPage() ? 'pointer-events-none z-10 bg-indigo-50 border-indigo-500 text-indigo-600' : 'bg-white border-gray-300 hover:bg-gray-50' }}">{{ $paginator->lastPage() }}</a>
          @endif

          <a href="{{ $paginator->url($paginator->currentPage() + 1) . $queryString }}" @disabled($paginator->currentPage() == $paginator->lastPage())
            class="{{ $paginator->currentPage() == $paginator->lastPage() ? 'pointer-events-none bg-gray-100' : 'bg-white' }} relative inline-flex items-center rounded-r-md border border-gray-300 px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
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
