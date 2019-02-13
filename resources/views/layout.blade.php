<!-- Master Layout -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <!-- Yields Title from invoices.blade.php section tag -->
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Yields out the main section -->
    <div class="container-fluid">
        <ul class="nav">
            @if (Auth::check())
            <li class="nav-item">
                <a href="/profile" class="nav-link">Signup</a>
            </li>
            <li class="nav-item">
                <a href="/invoices" class="nav-link">Invoices</a>
            </li>
            <li class="nav-item">
                <a href="/logout" class="nav-link">Logout</a>
            </li>
            @else
            <li class="nav-item">
                <a href="/signup" class="nav-link">Sign Up</a>
            </li>
            <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
            </li>
            @endif

        </ul>
        @yield('main')

    </div>
</body>
</html>
