@extends('guest.master')
@section('main')
<main id="main">
  <x-ProductList :products="$products ?? []" ></x-ProductList>
  <section id="about" class="about">
    <div class="container">
    <x-FrameSendContact ></x-FrameSendContact>
    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection