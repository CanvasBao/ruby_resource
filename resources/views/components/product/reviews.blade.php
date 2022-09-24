<h3 class="sr-only">Reviews</h3>
<div class="flex items-center">
    <div class="flex items-center">
        @php $star = $star ?? 0; $max = 5; @endphp
        @for ($i = 0; $i < $max; $i++)
            @if($i < $star)
                <x-item.star color="text-indigo-500"/>
            @else
                <x-item.star color="text-gray-300" />
            @endif
        @endfor
    </div>
    <p class="sr-only">4 out of 5 stars</p>
</div>