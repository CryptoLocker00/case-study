<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('_meta')
  @stack('head')
  <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
</head>
<body>
<main>
  @yield('main')
</main>
<script src="{{ mix('js/backend.js') }}"></script>
@stack('script')
</body>
</html>
