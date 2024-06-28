<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script type='text/javascript' src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script type="text/javascript" charset="utf8" src="{{URL::asset('js/jquery.min.js')}}"></script> 
</head>
<body>
    <!-- Navbar -->
    <div  id="app" style='background:black'>
        <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="{{ url('/') }}" style='padding-left:20px' >
                    <p style='color:white'>Sistema_crm</p> 
                </a>
        </nav>
    </div><!-- EndNavbar -->
    <div class="container-fluid">
    <div class="row">
        <!-- Aside -->
        <div class="col-2" style='background-color:#068FFF; color:black; text-align: center;'><br>
        <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item" >
                        <a class="nav-link" style='background-color:black' href="{{URL::to('grupos')}}">
                                <h6 style='color:white;'>grupos</h6>
                        </a>
                    </li>
                    <br>
                    <li class="nav-item" >
                        <a class="nav-link" style='background-color:black' href="{{URL::to('proveedores')}}">
                                <h6 style='color:white;'>proveedores</h6>
                        </a>
                    </li>
                    <br>
                    <li class="nav-item" >
                        <a class="nav-link" style='background-color:black' href="{{URL::to('productos')}}">
                                <h6 style='color:white;'>productos</h6>
                        </a>
                    </li>
                    <br>
                </ul>
            </nav>
        </div><!-- EndAside -->

        <!-- Content -->
        <div class="col-10"><br>
            <main class="py-4">
                <div class=container>
                    @yield('content')
                </div>
            </main>
        </div><!-- EndContent -->
    </div><!-- EndRow -->
</div><!-- EndContainer -->

</body>

<footer class="main-footer" style='background:#F6F1F1'>
    <div class="float d-none d-sm-block">
    <span> <small><b>MODULO: COMPRAS Versión 1.0</b></small></span>
    </div>
</footer>

</html>