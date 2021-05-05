     @extends('frontend._layouts.frontend-layout')

     @section('container')
         <!-- site__body -->
         <div class="site__body">
             <div class="page-header">
                 <div class="page-header__container container">
                     <div class="page-header__breadcrumb">
                         <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item">
                                     <a href="index.html">Domů</a>
                                     <svg class="breadcrumb-arrow" width="6px" height="9px">
                                         <use xlink:href="/theme-v1/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                     </svg>
                                 </li>

                                 <li class="breadcrumb-item active" aria-current="page">Můj profil</li>
                             </ol>
                         </nav>
                     </div>
                     <div class="page-header__title">
                         <h1>Můj profil</h1>
                     </div>
                 </div>
             </div>

             @if ($errors->any())
                 <div class="alert alert-danger mb-3">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>

                 </div>
             @endif

             <div class="block">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-6 d-flex flex-column">
                             <div class="card flex-grow-1 mb-md-0">
                                 <div class="card-body">
                                     <h3 class="card-title">Přihlášení</h3>
                                     <form action="{{ route('login') }}" method="POST">
                                         @csrf

                                         <div class="form-group">
                                             <label>Email</label>
                                             <input type="email" name="email" class="form-control" placeholder="Email">
                                         </div>
                                         <div class="form-group">
                                             <label>Heslo</label>
                                             <input type="password" name="password" class="form-control"
                                                 placeholder="Heslo">
                                         </div>
                                         <div class="form-group">
                                             <div class="form-check">
                                                 <span class="form-check-input input-check">
                                                     <span class="input-check__body">
                                                         <input class="input-check__input" type="checkbox"
                                                             id="login-remember">
                                                         <span class="input-check__box"></span>
                                                         <svg class="input-check__icon" width="9px" height="7px">
                                                             <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                         </svg>
                                                     </span>
                                                 </span>
                                                 <label class="form-check-label" name="remember"
                                                     for="login-remember">Zapamatovat pro přístě</label>
                                             </div>
                                         </div>
                                         <button type="submit" class="btn btn-primary mt-4">Přihlásit</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6 d-flex flex-column mt-4 mt-md-0">
                             <div class="card flex-grow-1 mb-0">
                                 <div class="card-body">
                                     <h3 class="card-title">Registrace</h3>

                                     <form action="{{ route('register.store') }}" method="POST">
                                         @csrf
                                         <div class="form-group">
                                             <label>Jméno a přijmení</label>
                                             <input type="text" name="name" class="form-control"
                                                 placeholder="Jméno a přijmení" value="{{ old('name') }}">
                                         </div>
                                         <div class="form-group">
                                             <label>Email</label>
                                             <input type="email" name="email" class="form-control" placeholder="Email"
                                                 value="{{ old('email') }}">
                                         </div>
                                         <div class="form-group">
                                             <label>Heslo</label>
                                             <input type="password" name="password" class="form-control"
                                                 placeholder="Heslo">
                                         </div>
                                         <div class="form-group">
                                             <label>Heslo znovu</label>
                                             <input type="password" name="password_confirmation" class="form-control"
                                                 placeholder="Heslo znovu">
                                         </div>
                                         <button type="submit" class="btn btn-primary mt-4">Registrovat</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- site__body / end -->

     @endsection
