<!DOCTYPE html>
<html lang="es">
<head>

    <!--META-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--TITLE-->
    <title> @yield('title') </title>

    <!--STYLE-->
    <link href="{{ asset('static/home/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--SCRIPT-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('static/home/js/main.js') }}"></script>
   
</head>
<body class="font-poppins text-white relative">

    <!-- CONTENT -->
    @yield('content')
    <!-- /CONTENT -->

</body>
</html>