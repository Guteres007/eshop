<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Frontend</title>
    <link href="{{ mix('/css/frontend/frontend.css') }}" rel="stylesheet">
</head>

<body>

    @include('frontend.layouts.includes.menu')
    @yield("container")

    <script src="{{ mix('/js/frontend/frontend.js') }}"></script>


</body>

</html>
