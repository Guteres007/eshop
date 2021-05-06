<div class="c-sidebar-brand d-lg-down-none">
    <img class="c-sidebar-brand-full" style="width: 120px;" src="{{ asset('images/admin/logo.svg') }}" alt="logo">
    <img class="c-sidebar-brand-minimized" style="width: 120px;" src="{{ asset('images/admin/logo.svg') }}" alt="logo">
</div>

<ul class="c-sidebar-nav">

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-list-numbered">
            </i> Kategorie</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.category.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.category.create') }}">
                    Přidat
                </a></li>
        </ul>
    </li>

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-couch">
            </i> Produkty</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.product.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item">

                <a class="c-sidebar-nav-link" data-toggle="modal" data-target="#add-product" href="#">
                    Přidat
                </a>
            </li>
        </ul>
    </li>

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-credit-card
            ">
            </i> Platba</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.payment.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.payment.create') }}">
                    Přidat
                </a></li>
        </ul>
    </li>

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-bus-alt">
            </i> Doprava</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.delivery.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.delivery.create') }}">
                    Přidat
                </a></li>
        </ul>
    </li>


    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-car-alt">
            </i> Doprava a platba</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('admin.delivery-payment.index') }}">
                    Seznam </a> </li>
        </ul>
    </li>

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-cart
            ">
            </i> Objednávky <span class="badge badge-danger">2</span></a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('admin.delivery-payment.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('admin.delivery-payment.index') }}">
                    Stavy </a>
            </li>
        </ul>
    </li>

    <li class="c-sidebar-nav-title">Nastavení</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="#">
            <i class="c-sidebar-nav-icon cil-speedometer"></i> Feedy
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="#">
            <i class="c-sidebar-nav-icon cil-speedometer"></i> Widgety
            <span class="badge badge-primary">Novinka</span>
        </a>
    </li>
    <li class="c-sidebar-nav-item nav-dropdown">
        <a class="c-sidebar-nav-link nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-puzzle"></i> Menu
        </a>
    </li>

    <li class="c-sidebar-nav-item nav-dropdown">
        <a class="c-sidebar-nav-link nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-puzzle"></i> Konfigurace e-shopu
        </a>
    </li>
</ul>
