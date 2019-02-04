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
        @yield('main')

    </div>
</body>
</html>
