<!DOCTYPE html>
<html>
<head>
    <title> @yield('title','Default') | Panel de Administracion </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
</head>
<body>
    @include('admin.template.partials.nav')
    @include('flash::message')
    @include('admin.template.partials.errores')


    <section>
        @yield('content')
    </section>

    <script src="{{asset('plugins/jquery/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>