<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">                
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            @include('includes.menusuperior')
        </nav>        
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>        
        <footer class="page-footer font-small blue pt-4">
            @include('includes.footer')
        </footer>        
    </div>
    @include('includes.scripts')
</body>

    
        
    @yield('scriptsown')
    @yield('scriptsbar')

</html>