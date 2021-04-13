

@include('sb-admin/header')
@stack('header')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('sweetalert::alert')
        <!-- Sidebar -->
        @include('sb-admin/sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
               @include('sb-admin/topbar')
        
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!--content -->                   
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('sb-admin/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('sb-admin/modal-logout')

    <!-- Bootstrap core JavaScript-->
    
    @include('sb-admin/js')
    @stack('js')
    {{-- @yield('js') --}}
</body>

</html>