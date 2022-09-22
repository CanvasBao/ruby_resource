<div class="{{ $boxclass ?? '' }}">
  <dt class="text-sm font-medium text-gray-500">{{ $title ?? '' }}</dt>
  <dd class="mt-1 text-sm text-gray-900 {{ $class ?? '' }}">
    @if (isset($value))
      {{ $value ?? '' }}
    @elseif (isset($slot))
      {{ $slot ?? '' }}
    @endif
  </dd>
</div>
