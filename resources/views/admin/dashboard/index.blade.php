@extends('admin.master')

@section('main')
    <x-TwocolGridView title="Home Carousel" :griddata="$carousel_grid"  :edit-flag="0" ></x-TwocolGridView>
@endsection