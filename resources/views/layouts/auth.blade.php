<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel</title>
  <link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
  <link href="{{ asset('css/misp-theme.css') }}" rel="stylesheet">
</head>

<body class="d-flex content">
  <main class="d-flex flex-column-fluid align-items-center justify-content-center py-2">
    {{ $slot }}
  </main>
</div>


  <script async src="{{ asset('js/bundle.js') }}"></script>
</body>

</html>
