@if ($type == 'textarea')
  <textarea {{ $attributes->except(['place', 'rows']) }} rows={{ $rows ?? 6 }} autocomplete="off"
    placeholder="{{ !empty($place) ? $place : '' }}">{{ $slot }}</textarea>
@elseif($type == 'select')
  <select {{ $attributes->except('place') }}>
    @if (!empty($options))
      @foreach ($options as $option)
        <option {{ $option['hidden'] ?? '' }} @selected($option['value'] == $slot) value="{{ $option['value'] }}">
          {{ $option['text'] }}</option>
      @endforeach
    @endif
  </select>
@else
  <input {{ $attributes->except(['place', 'type']) }} type={{ $type ?? 'text' }} autocomplete="off"
    placeholder="{{ !empty($place) ? $place : '' }}" value="{{ $slot }}">
@endif
