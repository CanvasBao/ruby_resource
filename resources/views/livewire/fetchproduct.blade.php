<ul role="list"
  class="productsList space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
  @if (!empty($records))
    @foreach ($records as $product)
      <x-product.card :product="$product" />
    @endforeach
  @endif
</ul>
