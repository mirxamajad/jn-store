<aside class="sidebar-wrapper" data-simplebar="true">
    <a href="{{ url('') }}">
        <div class="sidebar-header">
            <div>
                    <img src="{{asset('admin/images/logo-icon-2.png')}}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Dashboard</h4>
                </div>
                <div class="toggle-icon ms-auto">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>
            </div>
        </a>
        <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.route') }}" >
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Product Management</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                <ion-icon name="briefcase-sharp"></ion-icon>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li>
                <a href="{{ route('catgeory.index') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>All Categories
                </a>
                </li>
                <li>
                <a href="{{ route('subcatgeory.index') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>All Sub Categories
                </a>
                </li>
                <li>
                <a href="{{ route('childcatgeory.index') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>All Child Categories
                </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                <ion-icon name="briefcase-sharp"></ion-icon>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('products.create') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Add Product
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>All Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('productvariant.create') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Add Variant
                    </a>
                </li>
                <li>
                    <a href="{{ route('productvariant.index') }}">
                        <ion-icon name="ellipse-outline"></ion-icon>All Variants
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                <ion-icon name="briefcase-sharp"></ion-icon>
                </div>
                <div class="menu-title">Shpping</div>
            </a>
            <ul>
                <li>
                <a href="{{ route('shipping.index') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>All Shipping
                </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                <ion-icon name="briefcase-sharp"></ion-icon>
                </div>
                <div class="menu-title">Order</div>
            </a>
            <ul>
                <li>
                <a href="{{ route('order') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>All Order
                </a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                <ion-icon name="briefcase-sharp"></ion-icon>
                </div>
                <div class="menu-title">Payments</div>
            </a>
            <ul>
                <li>
                <a href="{{ route('productvariant.index') }}">
                    <ion-icon name="ellipse-outline"></ion-icon>All Payment
                </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</aside>
<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-menu-button">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                <a class="nav-link" href="javascript:;">
                    <div class="">
                    <ion-icon name="search-sharp"></ion-icon>
                    </div>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link dark-mode-icon" href="javascript:;">
                    <div class="mode-icon">
                    <ion-icon name="moon-sharp"></ion-icon>
                    </div>
                </a>
                </li>
                <li class="nav-item dropdown dropdown-user-setting">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                    <div class="user-setting">
                    <img src="{{asset('admin/images/avatars/06.png')}}" class="user-img" alt="">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                    <a class="dropdown-item" href="javascript:;">
                        <div class="d-flex flex-row align-items-center gap-2">
                        <img src="{{asset('admin/images/avatars/06.png')}}" alt="" class="rounded-circle" width="54" height="54">
                        <div class="">
                            <h6 class="mb-0 dropdown-user-name">{{Auth::user()->name}}</h6>
                        </div>
                        </div>
                    </a>
                    </li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="d-flex align-items-center">
                        <div class="">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </div>
                        <div class="ms-3"><span>Logout</span></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </div>
                    </a>
                    </li>
                </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
