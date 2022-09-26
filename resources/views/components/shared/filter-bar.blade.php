<div class="w-full {{ $boxclass ?? '' }}">
  <form method="{{ $method }}" action="{{ $action }}"
    {{ $attributes->except(['method', 'action', 'class', 'boxclass']) }}
    class="w-full md:w-fit flex flex-row m-0 md:mr-3 justify-between {{ $class ?? '' }}">
    <div>
      {{ $leftSlot ?? '' }}
    </div>
    <div>
      {{ $rightSlot ?? '' }}
    </div>
  </form>
</div>
