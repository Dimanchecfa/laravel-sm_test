<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/product') }}" class="brand-link">
        <i class="fas fa-home"></i>
        <span class="brand-text font-weight-light">
            Acceuil
        </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.admin.menu')
            </ul>
        </nav>
    </div>

</aside>
