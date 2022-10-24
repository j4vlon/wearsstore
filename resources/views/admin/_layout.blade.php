<!doctype html>
<html>
<head>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    </head>
<body>
<div class="container-scroller container" style="padding-top: 80px">
    <!-- partial:../../partials/_navbar.html -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="display: flex;justify-content: space-between;">

        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="width: 23%;">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Products List</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/categories">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Add Product</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Notification</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"href="#charts">
                        <i class="menu-icon mdi mdi-chart-line"></i>
                        <span class="menu-title">Orders</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel" style="width: 100%;">
            <div class="content-wrapper">
                <div class="row">
        @yield('content')
                </div>
            </div>
        </div>
        </div>
        </div>
<footer class="footer container" style="margin-top: 60px">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
    </div>
</footer>
</body>
</html>
