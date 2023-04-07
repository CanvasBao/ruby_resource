<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="shortcut icon" href="{{ asset('storage/images/favicon.ico') }}" />

  @production
    {{-- analytics here --}}
  @else
    <meta name="robots" content="noindex, nofollow">
  @endproduction

  @yield('meta')

  <link rel="stylesheet" href="{{ mix('css/swiper-bundle.min.css') }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ mix('css/common.css') }}">

  {{-- your scripts here --}}
  <script src="{{ mix('js/swiper-bundle.min.js') }}"></script>
  <script src="{{ mix('js/gsap.min.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  @livewireScripts
  <script>
    document.addEventListener('livewire:load', () => {
        Livewire.onPageExpired((response, message) => {})
    })
</script>
  @yield('scripts')

@show
</head>

<body>
<x-layout.header />

<main class="pt-16">
  @yield('content')
</main>

<x-layout.footer />
</body>

</html>
