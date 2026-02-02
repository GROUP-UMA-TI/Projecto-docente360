<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }} | Projecto Docente360 – Plataforma de Gestión y Evaluación Educativa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projecto-docente360 es una plataforma integral para la gestión educativa que permite la observación, evaluación y seguimiento de docentes, control de asistencia, encuestas de satisfacción, y generación de reportes detallados para una administración eficiente y completa del desempeño académico." />
    <meta name="keywords" content="gestión educativa, evaluación docente, seguimiento docente, observación de clases, control de asistencia, encuestas educativas, reportes académicos, desempeño docente, plataforma educativa, sistema de gestión escolar, administración educativa, educación digital">
    <meta content="Developers UMA" name="author" />
    <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Datatables css -->
    <link href="/assets/plugins/datatables/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css">

    <!-- Sweet Alert css-->
    <link href="/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- Summernote Plugin CSS -->
    <link href="/assets/plugins/summernote/summernote-bs5.min.css" rel="stylesheet">    
     <!-- Select Plugin CSS -->
    <link rel="stylesheet" href="/assets/plugins/select2/select2.min.css">

    <!-- Theme Config Js -->
    <script src="/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="/assets/css/vendors.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link href="/assets/css/divloading.css" rel="stylesheet">

    @yield('link')
</head>

<body>

<!-- LOADING OVERLAY UMA -->
<div id="divLoading">
    <div id="subdivLoading" class="text-center">
        <div class="spinner-border text-primary" role="status" style="width: 4rem; height: 4rem;">
            <span class="visually-hidden">Cargando...</span>
        </div>
        <p class="mt-3 mb-0 text-primary fw-medium">
            Cargando plataforma UMA, por favor espere...
        </p>
    </div>
</div>




    
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="logo">
                <span class="logo logo-light">
                    <span class="logo-lg"><img src="/assets/images/logo-uma.png" alt="logo" style="height:70px;"></span>
                    <span class="logo-sm"><img src="/assets/images/logo-sm.png" alt="small logo"></span>
                </span>

                <span class="logo logo-dark">
                    <span class="logo-lg"><img src="/assets/images/logo-uma.png" alt="logo" style="height:70px;"></span>
                    <span class="logo-sm"><img src="/assets/images/logo-sm.png" alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button class="button-on-hover">
                <i class="ti ti-menu-4 fs-22 align-middle"></i>
            </button>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-offcanvas">
                <i class="ti ti-x align-middle"></i>
            </button>

            <div class="scrollbar" data-simplebar>

 

                <!--- Sidenav Menu -->
                <ul class="side-nav">
                    <li class="side-nav-title mt-2" data-lang="menu-title">Aplicaciones</li>

                    <li class="side-nav-item">
                        <a href="{{ route('home') }}" class="side-nav-link">
                            <span class="menu-icon"><i data-lucide="home"></i></span>
                            <span class="menu-text" data-lang="chat"> Inicio </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-users"></i></span>
                            <span class="menu-text" data-lang="maps">Gestión Usuarios</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMaps">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('admin.usuarios') }}" class="side-nav-link">
                                        <span class="menu-text" data-lang="maps-vector">Lista Usuarios</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('admin.usuarios.permisos') }}" class="side-nav-link">
                                        <span class="menu-text" data-lang="maps-leaflet">Permisos Usuarios</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarCRM" aria-expanded="false" aria-controls="sidebarCRM" class="side-nav-link">
                            <span class="menu-icon"><i data-lucide="file-pen-line"></i></span>
                            <span class="menu-text" data-lang="users"> Gestión Docente </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCRM">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('docente.evaluacion') }}" class="side-nav-link">
                                        <span class="menu-text" data-lang="crm-contacts">Evaluación Docente</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('docente.vista.historial-evaluacion') }}" class="side-nav-link">
                                        <span class="menu-text" data-lang="crm-opportunities">Historial de Evaluaciones</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="#" class="side-nav-link">
                                        <span class="menu-text" data-lang="crm-deals">Encuestas</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarInvoice" aria-expanded="false" aria-controls="sidebarInvoice" class="side-nav-link">
                            <span class="menu-icon"><i data-lucide="file-pen-line"></i></span>
                            <span class="menu-text" data-lang="invoice"> Gestión Director</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarInvoice">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('director.evaluacion.index') }}" class="side-nav-link">
                                        <span class="menu-text" data-lang="invoices">Evaluaciones</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('director.evaluacion.historial') }}" class="side-nav-link">
                                        <span class="menu-text" data-lang="invoice-details">Historial Evaluaciones</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="container-fluid topbar-menu">
                <div class="d-flex align-items-center gap-2">
                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ route('home') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="/assets/images/logo-uma.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="/assets/images/logo-sm.png" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="{{ route('home') }}" class="logo-dark">
                            <span class="logo-lg">
                                <img src="/assets/images/logo-uma.png" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="/assets/images/logo-sm.png" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button btn btn-default btn-icon">
                        <i class="ti ti-menu-4 fs-22"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="ti ti-menu-4 fs-22"></i>
                    </button>


                </div> <!-- .d-flex-->

                <div class="d-flex align-items-center gap-2">
                    <!-- Theme Mode Dropdown -->
                    <div class="topbar-item">
                        <div class="dropdown">
                            <button class="topbar-link" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                                <i data-lucide="sun" class="fs-xxl"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end thememode-dropdown">

                                <li>
                                    <label class="dropdown-item">
                                        <i data-lucide="sun" class="align-middle me-1 fs-16"></i>
                                        <span class="align-middle">Light</span>
                                        <input class="form-check-input" type="radio" name="data-bs-theme" value="light">
                                    </label>
                                </li>

                                <li>
                                    <label class="dropdown-item">
                                        <i data-lucide="moon" class="align-middle me-1 fs-16"></i>
                                        <span class="align-middle">Dark</span>
                                        <input class="form-check-input" type="radio" name="data-bs-theme" value="dark">
                                    </label>
                                </li>

                                <li>
                                    <label class="dropdown-item">
                                        <i data-lucide="monitor-cog" class="align-middle me-1 fs-16"></i>
                                        <span class="align-middle">System</span>
                                        <input class="form-check-input" type="radio" name="data-bs-theme" value="system">
                                    </label>
                                </li>

                            </ul> <!-- end dropdown-menu-->
                        </div> <!-- end dropdown-->
                    </div> <!-- end topbar item-->

                    <!-- FullScreen -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" type="button" data-toggle="fullscreen">
                            <i data-lucide="maximize" class="fs-xxl fullscreen-off"></i>
                            <i data-lucide="minimize" class="fs-xxl fullscreen-on"></i>
                        </button>
                    </div>

                    <!-- Light/Dark Mode Button -->
                    <div class="topbar-item d-none">
                        <button class="topbar-link" id="light-dark-mode" type="button">
                            <i data-lucide="moon" class="fs-xxl mode-light-moon"></i>
                        </button>
                    </div>



                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" href="#!" aria-haspopup="false" aria-expanded="false">
                                <img src="/assets/images/users/user-3.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                                <div class="d-lg-flex align-items-center gap-1 d-none">
                                    <h5 class="my-0">Geneva</h5>
                                    <i class="ti ti-chevron-down align-middle"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- My Profile -->
                                <a href="users-profile.html" class="dropdown-item">
                                    <i class="ti ti-user-circle me-1 fs-17 align-middle"></i>
                                    <span class="align-middle">Perfil</span>
                                </a>

                                <!-- Divider -->
                                <div class="dropdown-divider"></div>

                                <!-- Logout -->
                                <a href="{{ route('logout') }}" class="dropdown-item fw-semibold" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="ti ti-logout-2 me-1 fs-17 align-middle"></i>
                                    <span class="align-middle">Cerrar sesión</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none">
                                        @csrf
                            </form>
                             
                            </div>

                        </div>
                    </div>

                    <!-- Button Trigger Customizer Offcanvas -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                            <i class="ti ti-settings icon-spin fs-24"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End -->

        

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="container-fluid pt-3">

                
                @yield('content')

            </div>
            <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            © <script>document.write(new Date().getFullYear())</script> Desarrollado con <i data-lucide="heart-handshake" class="text-primary fill-primary"></i>por <span class="fw-semibold">Developers UMA</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end overflow-hidden" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex justify-content-between text-bg-primary gap-2 p-3" style="background-image: url(/assets/images/user-bg-pattern.png);">
            <div>
                <h5 class="mb-1 fw-bold text-white text-uppercase">Personaliza tu experiencia</h5>
            </div>

            <div class="flex-grow-0">
                <button type="button" class="d-block btn btn-sm bg-white bg-opacity-25 text-white rounded-circle btn-icon" data-bs-dismiss="offcanvas"><i class="ti ti-x fs-lg"></i></button>
            </div>
        </div>

        <div class="offcanvas-body p-0 h-100" data-simplebar>
            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fw-bold">Select Theme</h5>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="form-check card-radio shadow">
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-modern" value="modern">
                            <label class="form-check-label p-0 w-100" for="demo-skin-modern">
                                <img src="/assets/images/layouts/themes/theme-modern.png" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Modern</h5>
                    </div>

                    <div class="col-6">
                        <div class="form-check card-radio shadow">
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-material" value="material">
                            <label class="form-check-label p-0 w-100" for="demo-skin-material">
                                <img src="/assets/images/layouts/themes/theme-material.png" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Material</h5>
                    </div>

                    <div class="col-6">
                        <div class="form-check card-radio shadow">
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-default" value="default">
                            <label class="form-check-label p-0 w-100" for="demo-skin-default">
                                <img src="/assets/images/layouts/themes/theme-default.png" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Default</h5>
                    </div>

                    <div class="col-6">
                        <div class="form-check card-radio shadow">
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-saas" value="saas" checked>
                            <label class="form-check-label p-0 w-100" for="demo-skin-saas">
                                <img src="/assets/images/layouts/themes/theme-saas.png" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">SaaS</h5>
                    </div>

                    <div class="col-6">
                        <div class="form-check card-radio shadow">
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-flat" value="flat">
                            <label class="form-check-label p-0 w-100" for="demo-skin-flat">
                                <img src="/assets/images/layouts/themes/theme-flat.png" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Flat</h5>
                    </div>

                    <div class="col-6">
                        <div class="form-check card-radio shadow">
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-minimal" value="minimal">
                            <label class="form-check-label p-0 w-100" for="demo-skin-minimal">
                                <img src="/assets/images/layouts/themes/theme-minimal.png" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Minimal</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fw-bold">Color Scheme</h5>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
                            <label class="form-check-label p-0 w-100" for="layout-color-light">
                                <img src="/assets/images/layouts/light.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Light</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
                            <label class="form-check-label p-0 w-100" for="layout-color-dark">
                                <img src="/assets/images/layouts/dark.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Dark</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-system" value="system">
                            <label class="form-check-label p-0 w-100" for="layout-color-system">
                                <img src="/assets/images/layouts/system.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">System</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fw-bold">Topbar Color</h5>

                <div class="row g-3">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                            <label class="form-check-label p-0 w-100" for="topbar-color-light">
                                <img src="/assets/images/layouts/topbar-light.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="text-center text-muted mt-2 mb-0">Light</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                            <label class="form-check-label p-0 w-100" for="topbar-color-dark">
                                <img src="/assets/images/layouts/topbar-dark.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Dark</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-gray" value="gray">
                            <label class="form-check-label p-0 w-100" for="topbar-color-gray">
                                <img src="/assets/images/layouts/topbar-gray.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Gray</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-gradient" value="gradient">
                            <label class="form-check-label p-0 w-100" for="topbar-color-gradient">
                                <img src="/assets/images/layouts/topbar-gradient.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Gradient</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fw-bold">Sidenav Color</h5>

                <div class="row g-3">
                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-light" value="light">
                            <label class="form-check-label p-0 w-100" for="sidenav-color-light">
                                <img src="/assets/images/layouts/light.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Light</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-dark" value="dark">
                            <label class="form-check-label p-0 w-100" for="sidenav-color-dark">
                                <img src="/assets/images/layouts/side-dark.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Dark</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-gray" value="gray">
                            <label class="form-check-label p-0 w-100" for="sidenav-color-gray">
                                <img src="/assets/images/layouts/side-gray.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Gray</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-gradient" value="gradient">
                            <label class="form-check-label p-0 w-100" for="sidenav-color-gradient">
                                <img src="/assets/images/layouts/side-gradient.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Gradient</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-image" value="image">
                            <label class="form-check-label p-0 w-100" for="sidenav-color-image">
                                <img src="/assets/images/layouts/side-image.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-sm text-center text-muted mt-2 mb-0">Image</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fw-bold">Sidebar Size</h5>

                <div class="row g-3">
                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-default" value="default">
                            <label class="form-check-label p-0 w-100" for="sidenav-size-default">
                                <img src="/assets/images/layouts/light.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">Default</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-compact" value="compact">
                            <label class="form-check-label p-0 w-100" for="sidenav-size-compact">
                                <img src="/assets/images/layouts/sidebar-compact.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">Compact</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small" value="condensed">
                            <label class="form-check-label p-0 w-100" for="sidenav-size-small">
                                <img src="/assets/images/layouts/sidebar-sm.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">Condensed</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small-hover" value="on-hover">
                            <label class="form-check-label p-0 w-100" for="sidenav-size-small-hover">
                                <img src="/assets/images/layouts/sidebar-sm.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">On Hover</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small-hover-active" value="on-hover-active">
                            <label class="form-check-label p-0 w-100" for="sidenav-size-small-hover-active">
                                <img src="/assets/images/layouts/light.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="mb-0 fs-base text-center text-muted mt-2">On Hover - Show</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-offcanvas" value="offcanvas">
                            <label class="form-check-label p-0 w-100" for="sidenav-size-offcanvas">
                                <img src="/assets/images/layouts/sidebar-full.svg" alt="layout-img" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="mb-0 text-center text-muted mt-2">Offcanvas</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">Layout Position</h5>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                        <label class="btn btn-sm btn-soft-warning w-sm" for="layout-position-fixed">Fixed</label>

                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                        <label class="btn btn-sm btn-soft-warning w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>
            </div>

            <div class="p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><label class="fw-bold m-0" for="sidebaruser-check">Sidebar User Info</label></h5>
                
                    <div class="form-check form-switch fs-lg">
                        <input type="checkbox" class="form-check-input" name="sidebar-user" id="sidebaruser-check">
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light fw-semibold py-2 w-100" id="reset-layout">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="/assets/js/vendors.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>

    <!-- E Charts js -->
    <script src="/assets/plugins/chartjs/chart.umd.js"></script>

    <!-- Custom table -->
    <script src="/assets/js/pages/custom-table.js"></script>

    <!-- Dashboard Page js -->
    <script src="/assets/js/pages/dashboard.js"></script>

    <!-- Jquery for Datatables-->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Datatables js -->
    <script src="/assets/plugins/datatables/dataTables.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/uma/uma-functions.js"></script>

    <!-- Sweet Alerts js -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Select2 Plugin Js -->
    <script src="/assets/plugins/select2/select2.min.js"></script>

    <!--Select 2 Demo js-->
    <script src="/assets/js/pages/form-select2.js"></script>

    <!-- Sweet alert demo js-->
    <script src="/assets/js/pages/misc-sweetalerts.js"></script>

    @yield('script')

</body>


</html>