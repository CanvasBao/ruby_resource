@isset($product)
  <a href="{{ route('product.show', ['id' => $product->id, 'text' => urlencode($product->name)]) }}" class="group">
    <div class="aspect-w-1 aspect-h-1 w-full shadow-md overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
      <img
        src="{{ $product->images->count() > 0 ? asset('storage/uploads/product/' . $product->images[0]->image) : asset('storage/images/no_image.jpg') }}"
        alt="{{ $product->name }}" class="h-full w-full object-cover object-center group-hover:opacity-75" />
    </div>
    <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
    <p class="mt-1 text-lg font-medium text-gray-900">
      @empty($product->price)
        <span>Liên hệ</span>
      @else
        {{ number_format($product->price) }}<span class="text-[60%]"> VNĐ</span>
      @endempty
    </p>
  </a>
@endisset
