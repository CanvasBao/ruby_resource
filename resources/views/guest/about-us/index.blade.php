@extends('guest.master')
@section('main')
<main id="main">

  <section id="about" class="about">
    
    <x-AboutUsTop :about="$about" ></x-AboutUsTop>
    <div class="container">
      
    <x-FrameSendContact ></x-FrameSendContact>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection