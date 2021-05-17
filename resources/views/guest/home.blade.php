@extends('guest.master')
@section('main')
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach( $listside as $item)
            <div class="carousel-item {{ $item['active'] ?? null }}" style="background-image: url(assets/img/{{ $item['img'] }});">
            <div class="carousel-container">
                <div class="carousel-content animate__animated animate__fadeInUp">
                <h2>{{ $item['title'] }}</h2>
                <p>{{ $item['content'] }}</p>
                </div>
            </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section>
    <main id="main">
    </main>
@endsection