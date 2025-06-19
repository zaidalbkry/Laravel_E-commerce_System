<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="description"
        content="شركة تبارك للعقارات - نحن متخصصون في شراء وبيع العقارات وتقديم خدمات الاستثمار العقاري. ابحث عن منازل وشقق وفيلات وأراضي للبيع أو الإيجار عبر موقعنا.">
    <meta name="keywords"
        content="عقارات، شراء عقارات، بيع عقارات، استثمار عقاري، منازل للبيع، شقق للإيجار، فيلات، أراضي، تبارك للعقارات">


    <!-- Title -->
    <title> @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ URL::asset('assets/img/brand/favicon.png') }}" />
    <!-- Icons css -->
    <link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet">
    <!--- Style css -->
    <link href="{{ URL::asset('assets/css-rtl/style.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ URL::asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet">
    {{-- My New Edits --}}
    <link href="{{ URL::asset('assets/css/my-new-edits.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css-rtl/my-new-edits.css') }}" rel="stylesheet">
    {{-- My Custom Css Files --}}
    @yield('css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="main-body bg-primary-transparent">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    @yield('content')


    <!-- JQuery min js -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/popper.js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- My New Edits --}}
    <script src="{{ URL::asset('assets/js/my-new-edits.js') }}"></script>


    <script>
        $(document).ready(function() {
            // ______________LOADER
            $("#global-loader").fadeOut("slow");
        })
    </script>
</body>

</html>
