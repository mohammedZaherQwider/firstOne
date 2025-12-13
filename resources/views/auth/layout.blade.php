<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <link href="{{ asset('assets/auth/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back_end/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @yield('content')
    <script src="{{ asset('assets/back_end/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/back_end/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/auth/js/general.js') }}"></script>

</body>

</html>
