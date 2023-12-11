@isset($product)
  <div data-cat="{{$product->category->category_slug ?? 'ALL'}}" class="productEl">
    <div class="space-y-4">
      <div class="aspect-w-3 aspect-h-2">
        <img class="rounded-lg object-cover shadow-lg"
          src="{{ $product->images->count() > 0 ? asset('storage/uploads/product/' . $product->images[0]->image) : asset('storage/images/no_image.jpg') }}"
          alt="">
      </div>

    </div>
  </div>
@endisset
