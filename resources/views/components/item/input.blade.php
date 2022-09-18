@php
    if(!empty($height) && is_int(intval($height))){
        $height = "{$height}px";
    }else{
        $height = "38px";
    }
@endphp
@if($type == 'textarea')
    <textarea id="{{$name}}" name="{{$name}}" rows="{{ !empty($rows) ? $rows : '7' }}" class="{{ !empty($inpClass) ? $inpClass : '' }}"></textarea>
@elseif($type == 'select')
    <select id="{{$name}}" name="{{$name}}" style="height:{{$height}};" class="{{ !empty($inpClass) ? $inpClass : '' }}">
        @if(!empty($options))
        @foreach($options as $option)
            @if (!empty($slot) && intval($option['value']) == intval($oldVal))
            <option selected {{ !empty($option['hidden']) ? $option['hidden'] : '' }} value="{{ $option['value'] }}">{{ $option['text'] }}</option>
            @else
            <option {{ !empty($option['hidden']) ? $option['hidden'] : '' }} value="{{ $option['value'] }}">{{ $option['text'] }}</option>
            @endif
        @endforeach
        @endif
    </select>
@else
<input {{$attributes->only('readonly')}} id="{{$name}}" name="{{$name}}" type="{{$type}}" autocomplete="off"  style="height:{{$height}};"
    class="{{ !empty($inpClass) ? $inpClass : '' }}" placeholder="{{!empty($place) ? $place : ''}}" value="{{$slot}}">
@endif