@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    {{-- Bootstrap --}}

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- DataTable --}}

    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">

    {{-- Sweetalert --}}
    <link rel="stylesheet" href="{{ asset('sweetalert/dist/sweetalert2.min.css') }}">
    
    <div class="wrapper">

        {{-- Preloader Animation (fullscreen mode) --}}
        @if($preloaderHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
        {{-- Jquery --}}
        <script type="text/javascript" charset="utf8" src="{{URL::asset('js/jquery.min.js')}}"></script> 

        {{-- Bootstrap --}}
        <script type='text/javascript' src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

        {{-- DataTable --}}
        <script type='text/javascript' src="{{ asset('DataTables/datatables.min.js') }}" defer></script>
        
        {{-- Select2 --}}
        <script type='text/javascript' src="{{ asset('select2/dist/js/select2.min.js') }}"></script>
        <script type='text/javascript' src="{{ asset('select2/dist/js/i18n/es.js') }}"></script>

        {{-- Sweetalert2 --}}
        <script type='text/javascript' src="{{ asset('sweetalert/dist/sweetalert2.min.js') }}" defer></script>
    @yield('js')
@stop
