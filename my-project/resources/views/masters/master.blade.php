<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="UTF-8">
    <title>master</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"></script>
    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
    </script>
</head>
 
<body>
    <div id="app">
        <v-app>
            <router-view />
        </v-app>
    </div>
</body>
<!-- <script src="{{ mix('js/app.js') }}"></script> -->
</html>