@isset($product)
  <div data-cat="{{ $product->category->category_slug ?? 'ALL' }}" class="productEl group">
    <a href="#" class="relative z-0 block bg-white rounded-lg shadow-lg cursor-pointer">
      <div class=" aspect-w-3 aspect-h-2">
        <img class="  rounded-t-lg object-cover "
          src="{{ $product->images->count() > 0 ? asset('storage/uploads/product/' . $product->images[0]->image) : asset('storage/images/no_image.jpg') }}"
          alt="" />
      </div>
      <div
        class="rounded-b-lg px-2 py-1 group-hover/item:bg-slate-500 text-center text-base shadow-red-600 text-blue-700 bg-gray-50 shadow-twe-inner">
        {{ $product->name }}</div>
      <div
        class="group-hover:visible invisible absolute inline-flex items-center z-10 top-1/2 -translate-x-1/2 -translate-y-1/2 left-1/2 px-2 py-1 rounded-lg text-white bg-blue-500 animate-pulse">
        <span class=" text-lg pr-0.5">chi tiết</span>
        <svg width="22px" height="22px" viewBox="0 0 24 24" class=" stroke-white" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M5.5 5L11.7929 11.2929C12.1834 11.6834 12.1834 12.3166 11.7929 12.7071L5.5 19" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" />
          <path d="M13.5 5L19.7929 11.2929C20.1834 11.6834 20.1834 12.3166 19.7929 12.7071L13.5 19" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </a>
  </div>
@endisset
