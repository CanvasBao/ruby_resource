<div class="w-full {{ !empty($class) ? $class : '' }} ">
    <figure class="w-full h-100">
        @if (isset($item))
            <img class="w-full h-full object-cover" src="{{ $item }}" alt="slider image">
        @else
            <img class="w-full h-full object-cover" src="https://via.placeholder.com/1000x400?text=No+Image" alt="slider image">
        @endif
    </figure>
</div>
