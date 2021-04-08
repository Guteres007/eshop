<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Eshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($menu_categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.category.show', $category->slug) }}">
                            {{ $category->name }} </a>
                    </li>
                @endforeach
            </ul>

            <div class="d-flex">
                <a class="text-light" href="{{ route('frontend.cart.index') }}">Košík {{ $cart_total_price }}
                    {{ config('price.currency') }}</a>
            </div>
        </div>
    </div>
</nav>
