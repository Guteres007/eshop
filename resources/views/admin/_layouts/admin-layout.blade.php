<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrace</title>
    <link href="{{ mix('/css/admin/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">

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




    <!--Modal -->


<!-- Modal -->
<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form  action="{{ route('admin.product-temporary.store') }}" method="POST" class="modal-content">
        @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Přidání produktu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Jméno produktu <span
                                class="color-red">{{ $errors->first('name') }}</span></label>
                        <input class="form-control" name="name" type="text" >

                    </div>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
            <button type="submit" class="btn btn-success">Uložit</button>
            </div>
        </form>
    </div>
  </div>

  <!-- modal end -->

    <script src="{{ mix('/js/admin/admin.js') }}"></script>


</body>

</html>
