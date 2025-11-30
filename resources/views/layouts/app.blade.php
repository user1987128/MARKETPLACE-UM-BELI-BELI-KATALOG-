<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UM Beli Beli</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- CUSTOM STYLE -->
    <style>
        body {
            background-color: #f5f7fa;
        }
        .navbar {
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            background: #ffffff !important;
        }
        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 700;
            color: #0d6efd !important;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
        }
        .nav-link:hover {
            color: #0d6efd !important;
        }
        .content-wrapper {
            background: #ffffff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('marketplace') }}">UM Beli Beli</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            
            <!-- LEFT NAV -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('marketplace') }}">Marketplace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                </li>
            </ul>

            <!-- RIGHT NAV -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger ml-2">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="container mt-4">
        <div class="content-wrapper">

            <!-- ALERTS -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- MAIN CONTENT -->
            @yield('content')

        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
