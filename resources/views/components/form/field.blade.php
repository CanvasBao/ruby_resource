<div class="{{ $boxclass ?? '' }}">
  <div class="flex justify-between">
    @if (!empty($title))
      <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $title ?? '' }}
        @if (!empty($redtitle))
          <span class="pl-1 text-[#9D0000] text-[80%]">{{ $redtitle ?? '' }}</span>
        @endif
      </label>
    @endif
    @if (!empty($note))
      <span id="phone-optional" class="text-sm text-gray-500">{{ $note ?? '' }}</span>
    @endif
  </div>
  <div class="mt-1">
    <x-item.input {{ $attributes->except(['boxclass', 'class', 'hideError', 'redtitle', 'note']) }}
      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm {{ $class ?? '' }}">
      {{ old("$name", $value ?? '') }}
    </x-item.input>
  </div>
  @if (empty($hideError) || $hideError == false)
    @error("$name")
      <div class="my-1 font-medium text-[80%] leading-[120%] text-red-600 shadow-none">{{ $message }}</div>
    @enderror
  @endif
</div>
