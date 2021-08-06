<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="jetbrains://php-storm/navigate/reference?project=ecommerce&path=resources/js/custom.js">
<head>
    <title>@yield('title')</title>
</head>
<body>
@section('sidebar')

@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
