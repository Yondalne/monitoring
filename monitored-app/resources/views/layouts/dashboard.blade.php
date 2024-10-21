<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaydan Monitoring CI | Tableau de bord</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/front/logo.png') }}" type="image/x-icon" />

    @include('components.admin.css')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('components.admin.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            @include('components.admin.topbar')

            @yield('content')

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="#">DATARIUM</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->

    @include('components.admin.scripts')
</body>

</html>
