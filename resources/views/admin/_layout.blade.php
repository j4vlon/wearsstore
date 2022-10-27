<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->

    <link rel="stylesheet" href="{{ asset('admin/css/feather.css') }}">
       <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

        <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vendor.bundle.base.css') }}">



</head>
<body>
<div class="container-scroller">
    <div class="container container-fluid page-body-wrapper">

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav" style="padding-top: 1.5rem;">

        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/categories">
                <span class="menu-title">Categories list</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/categories/create">
                <span class="menu-title">Add category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/products">
                <span class="menu-title">Product list</span>
            </a>

        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/products/create">
                <span class="menu-title">Add product</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"href="/admin/orders">
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"href="/admin/notifications">
                <span class="menu-title">Notifications</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/users">
                <span class="menu-title">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin/users/create">
                <span class="menu-title">Add users</span>
            </a>
        </li>
    </ul>
</nav>
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
@yield('content')

        </div>
        </div>
        </div>
        </div>
        </div>

</body>

<!-- Script cdns -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap framework js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- All js plugins included in this file. -->
</body>

</html>
