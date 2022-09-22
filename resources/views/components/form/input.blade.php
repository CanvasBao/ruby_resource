<div class="w-full {{ $boxclass ?? '' }}">
  @php
    $commonClass = "appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900
              rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm";
  @endphp
  <x-item.input {{ $attributes->except(['inpClass', 'class', 'hideError']) }}
    class="{{ $commonClass }} {{ !empty($class) ? $class : '' }}">
    {{ old("$name", $value ?? '') }}
  </x-item.input>
  @if (empty($hideError) || $hideError == false)
    @error("$name")
      <div class="my-1 font-medium text-[80%] leading-[120%] text-red-600 shadow-none">{{ $message }}</div>
    @enderror
  @endif
</div>
