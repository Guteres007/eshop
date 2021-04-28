<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrace</title>
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@9.0.5/dist/css/autoComplete.min.css">


</head>

<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-show" id="sidebar">
        @include('admin._layouts.includes.sidebar')
    </div>

    <div class="c-wrapper">
        <header class="c-header">
            @include('admin._layouts.includes.header')
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @include('admin._layouts.includes.messages')
                    @yield("container")
                </div>
            </main>
        </div>
        <footer class="c-footer">
            <!-- Footer content here -->
        </footer>
    </div>


    <script src="{{ mix('/js/admin/admin.js') }}"></script>


</body>

</html>
