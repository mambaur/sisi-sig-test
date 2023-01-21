<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header', ['title' => @$title])

    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('/') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div> --}}

        @include('layouts.navbar')

        @include('layouts.sidebar', ['menu' => @$menu])

        @yield('content')

        <footer class="main-footer">
            <strong></strong>
            <div class="float-right d-none d-sm-inline-block">
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('layouts.footer')

    @yield('scripts')
</body>

</html>
