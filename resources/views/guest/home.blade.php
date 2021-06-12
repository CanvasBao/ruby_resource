@extends('guest.master')
@section('main')
    <section id="banner">
        <div id="bannerCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach( $banner_list as $item)
            <div class="carousel-item {{ $item['active'] ?? null }}" style="background-image: url({{ $item['img'] ?? '' }});">
            <div class="carousel-container">
                <div class="carousel-content animate__animated animate__fadeInUp">
                <h2>{{ $item['title'] ?? '' }}</h2>
                <p>{{ $item['content'] ?? '' }}</p>
                </div>
            </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <ol class="carousel-indicators" id="banner-carousel-indicators"></ol>

        </div>
    </section>
    <main id="main">
        <x-AboutUsTop :about="$about" ></x-AboutUsTop>
        <x-ProductList :products="$products ?? []" ></x-ProductList>
        <section id="contact" class="contact">
            <div class="container">
                <x-FrameSendContact ></x-FrameSendContact>
            </div>
        </section>
    </main>
@endsection