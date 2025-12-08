<ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('marketplace') }}">Marketplace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.guide') }}">User Guide</a>
                </li>
            </ul>
=======
            <!-- LEFT NAV -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('marketplace') }}">Marketplace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.guide') }}">User Guide</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">My Orders</a>
                    </li>
                @endauth
            </ul>
