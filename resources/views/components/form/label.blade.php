<div class="{{ $boxclass ?? '' }}">
  @if (!empty($title))
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $title ?? '' }}
      @if (!empty($redtitle))
        <span class="pl-1 text-[#9D0000] text-[80%]">{{ $redtitle ?? '' }}</span>
      @endif
    </label>
  @endif
  <div class="">
    <label {{ $attributes->except(['boxclass', 'class', 'hideError', 'redtitle', 'value']) }}
      class="block w-full rounded-bl-md border-x-0 border-t-0 border-b border-gray-300 shadow-sm
       sm:text-sm {{ $class ?? '' }}">
      @if (is_array($value))
        @foreach ($value as $text)
          {{ $text ?? '' }}<br>
        @endforeach
      @else
        {{ $value ?? '' }}
      @endif
    </label>
  </div>
</div>
