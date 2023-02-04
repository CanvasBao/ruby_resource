<div class="space-y-12">
  <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
    <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Our Products</h2>
    <p class="text-xl text-gray-500">Odio nisi, lectus dis nulla. Ultrices maecenas vitae rutrum dolor ultricies
      donec risus sodales. Tempus quis et.</p>
  </div>
  <ul role="list"
    class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
    @foreach ($products as $product)
      <x-product.card :product="$product" />
    @endforeach
  </ul>
</div>
