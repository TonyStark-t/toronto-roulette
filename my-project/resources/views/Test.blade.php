<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div id="app">
     <test-component></test-component>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>