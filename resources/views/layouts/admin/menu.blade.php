<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('category.index') }}" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Categories
        </p>
    </a>
    <a href="{{ route('product.index') }}" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cubes"></i>
        <p>
            Produits
        </p>
    </a>
</li>
