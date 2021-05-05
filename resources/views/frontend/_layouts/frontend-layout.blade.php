<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shoply.cz</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="/theme-v1/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/theme-v1/vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/theme-v1/vendor/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="/theme-v1/vendor/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="/theme-v1/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/theme-v1/css/style.ltr.css">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="/theme-v1/vendor/fontawesome/css/all.min.css">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="/theme-v1/fonts/stroyka/stroyka.css">

    <link href="{{ mix('/css/frontend/frontend.css') }}" rel="stylesheet">
</head>

<body>
    <div class="site">
        @include('frontend._layouts.includes.menu')

        @if (session('error'))
            <div class="alert alert-danger mb-3">
                {{ session('error') }}
            </div>
        @endif
        @yield("container")
        @include('frontend._layouts.includes.footer')
        @include('frontend._layouts.includes.others')
    </div>


    <script src="/theme-v1/vendor/jquery/jquery.min.js"></script>
    <script src="/theme-v1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/theme-v1/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="/theme-v1/vendor/nouislider/nouislider.min.js"></script>
    <script src="/theme-v1/vendor/photoswipe/photoswipe.min.js"></script>
    <script src="/theme-v1//vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/theme-v1/vendor/select2/js/select2.min.js"></script>
    <script src="/theme-v1/js/number.js"></script>
    <script src="/theme-v1/js/main.js"></script>
    <script src="/theme-v1/js/header.js"></script>
    <script src="/theme-v1/vendor/svg4everybody/svg4everybody.min.js"></script>
    <script>
        svg4everybody();

    </script>
    <script src="{{ mix('/js/frontend/frontend.js') }}"></script>

</body>

</html>
