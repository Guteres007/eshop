<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrace</title>
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">

</head>

<body class="c-app flex-row align-items-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Administrace</h1>
                            <p class="text-muted">Přihlášení do administrace</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="c-icon cil-user">

                                        </i>
                                    </span></div>
                                <input class="form-control" type="text" name="name" placeholder="Jméno"
                                    autocomplete="off">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="c-icon cil-lock-locked">

                                        </i></span></div>
                                <input class="form-control" type="password" name="password" placeholder="Heslo"
                                    autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="button">Přihlásit se</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body justify-content-center d-flex align-items-center">

                            <img style="width: 220px;" src="{{ asset('images/admin/logo.svg') }}" alt="logo">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- modal end -->

    <script src="{{ mix('/js/admin/admin.js') }}"></script>


</body>

</html>
