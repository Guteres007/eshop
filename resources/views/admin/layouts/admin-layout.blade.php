<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrace</title>
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
</head>

<body>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-error">
            {{ Session::get('error') }}
        </div>
    @endif
    @yield("container")
    <script src="{{ mix('/js/admin/admin.js') }}"></script>


</body>

</html>
