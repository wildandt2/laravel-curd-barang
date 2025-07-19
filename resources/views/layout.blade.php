<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Laravel CRUD')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    @if(session('ok'))
      <div class="alert alert-success">{{ session('ok') }}</div>
    @endif
    @yield('content')
  </div>
</body>
</html>
