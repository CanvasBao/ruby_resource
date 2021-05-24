@extends('guest.master')
@section('main')
<link href="{{ asset('assets/css/guest/contact.css') }}" rel="stylesheet">
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="subheader" class="subheader">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>{{ $sub_header }}</h2>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <div class="map-section">
    <iframe style="border:0; width: 100%; height: 350px;" src="{{ $about['map'] ?? '' }}" frameborder="0" allowfullscreen></iframe>
  </div>

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>{{ $about['street_address'] ?? '' }}<br>
                    {{ $about['area_address'] ?? '' }}<br>
                  {{ $about['city_address'] ?? '' }}, {{ $about['country_address'] ?? '' }}<br><br>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $about['email'] ?? '' }}</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>{{ $about['phone'] ?? '' }}</p>
              </div>
            </div>
          </div>

        </div>

      </div>
      
    <x-FrameSendContact ></x-FrameSendContact>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection