<div class="flex flex-wrap w-full h-full {{ !empty($rowClass) ? $rowClass : '' }}">
  @if (isset($rowTitle))
    <div class="w-full flex items-center font-medium">
      <span>{{ $rowTitle }}
        @if (!empty($redtitle))
          <span class="pl-2 text-[#9D0000] text-[80%]">{{ $redtitle }}</span>
        @endif
      </span>
    </div>
    <div class="w-full gap-2.5 flex {{ !empty($class) ? $class : '' }}">
      {{ $slot }}
    </div>
  @else
    <div class="w-full gap-2.5 flex {{ !empty($class) ? $class : '' }}">
      {{ $slot }}
    </div>
  @endif
</div>
