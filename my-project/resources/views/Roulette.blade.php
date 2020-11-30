<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="UTF-8">
    <title>Roulette</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div id="app">
     <roulette-list-component></roulette-list-component>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>