<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrace</title>
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
</head>

<body class="c-app">
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

    <div class="c-sidebar c-sidebar-dark c-sidebar-show">
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-title">Nav Title</li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="#">
                    <i class="c-sidebar-nav-icon cil-speedometer"></i> Nav item
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="#">
                    <i class="c-sidebar-nav-icon cil-speedometer"></i> With badge
                    <span class="badge badge-primary">NEW</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item nav-dropdown">
                <a class="c-sidebar-nav-link nav-dropdown-toggle" href="#">
                    <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown item
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-puzzle"></i> Nav dropdown item
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <button class="c-sidebar-minimizer c-brand-minimizer" type="button"></button>
    </div>

    <div class="c-wrapper">
        <header class="c-header">
            <!-- Header content here -->
            header
        </header>
        <div class="c-body">
            <main class="c-main">
                @yield("container")
            </main>
        </div>
        <footer class="c-footer">
            <!-- Footer content here -->
        </footer>
    </div>


    <script src="{{ mix('/js/admin/admin.js') }}"></script>


</body>

</html>
