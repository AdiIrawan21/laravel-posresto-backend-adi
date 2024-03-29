<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('home') }}"><i class="fa fa-cutlery" aria-hidden="true"></i> Kepiting Mas Gembul</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('home') }}">KMG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin Panel</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-home"
                        aria-hidden="true"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('home') }}"><i class="fa fa-tachometer"
                                aria-hidden="true"></i>General</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-database"
                        aria-hidden="true"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li '>
                        <a class="nav-link" href="{{ route('user.index') }}"><i class="fa fa-users" aria-hidden="true"></i>Users</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('categories.index') }}"><i class="fa fa-bars" aria-hidden="true"></i>Categories</a>
                        
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('products.index') }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Products</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-calendar" aria-hidden="true"></i><span>Transaction</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('home') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('reports') }}"><i class="fa-solid fa-cart-shopping"></i>Orders</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
