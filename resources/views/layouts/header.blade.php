<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Logo</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ request()->is('/category') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('category.index') }}">Category</a>
            </li>
            <li class="nav-item {{ request()->is('/product') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('product.index') }}">Product</a>
            </li>
        </ul>
    </div>
</nav>
