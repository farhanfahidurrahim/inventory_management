<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ request()->routeIs('home') ? 'active':'' }}">
                <a href="{{ route('admin') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{ request()->is('supplier/*') || request()->is('supplier') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Suppliers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('supplier.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('supplier.index') }}">All Supplier</a></li>
                    <li class="{{ request()->routeIs('supplier.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('supplier.create') }}">Add Supplier</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Customers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('customer.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('customer.index') }}">All Customer</a></li>
                    <li class="{{ request()->routeIs('customer.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('customer.create') }}">Add Customer</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('category.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('category.index') }}">All Category</a></li>
                    <li class="{{ request()->routeIs('category.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('category.create') }}">Add Category</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('product.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('product.index') }}"><i class="fas fa-pencil-ruler"></i>
                <span>Product</span></a>
            </li>
            <li class="{{ request()->routeIs('unit.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('unit.index') }}"><i class="far fa-file-alt"></i>
                <span>Unit</span></a>
            </li>
            <li class="{{ request()->routeIs('purchase.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('purchase.index') }}"><i class="fas fa-plug"></i>
                <span>Purchase</span></a>
            </li>

            <li class="menu-header">Stisla</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i>
                    <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                    <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                    <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                    <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                    <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                    <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                    <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                    <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                    <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                    <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                    <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                    <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                    <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="errors-503.html">503</a></li>
                    <li><a class="nav-link" href="errors-403.html">403</a></li>
                    <li><a class="nav-link" href="errors-404.html">404</a></li>
                    <li><a class="nav-link" href="errors-500.html">500</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                    <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                    <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                    <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                    <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                    <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                    <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                <span>Credits</span></a>
            </li>
        </ul>

    </aside>
</div>
