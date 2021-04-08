<ul class="c-sidebar-nav">

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-speedometer">
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
            <i class="c-sidebar-nav-icon cil-speedometer">
            </i> Produkty</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.product.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.product.create') }}">
                    Přidat
                </a></li>
        </ul>
    </li>

    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="c-sidebar-nav-icon cil-speedometer">
            </i> Doprava</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.delivery.index') }}">
                    Seznam </a> </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.delivery.create') }}">
                    Přidat
                </a></li>
        </ul>
    </li>

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
