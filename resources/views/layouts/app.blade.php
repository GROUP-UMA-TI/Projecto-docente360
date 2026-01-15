<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/ubold/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jan 2026 02:31:57 GMT -->
<head>
    <meta charset="utf-8">
    <title>Dashboard | UBold - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UBold is a modern, responsive admin dashboard available on ThemeForest. Ideal for building CRM, CMS, project management tools, and custom web applications with a clean UI, flexible layouts, and rich features.">
    <meta name="keywords" content="UBold, admin dashboard, ThemeForest, Bootstrap 5 admin, responsive admin, CRM dashboard, CMS admin, web app UI, admin theme, premium admin template">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="/assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="/assets/css/vendors.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">

    @yield('link')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
            <a href="index.html" class="logo">
                <span class="logo logo-light">
                    <span class="logo-lg"><img src="/assets/images/logo-uma.png" alt="logo"></span>
                    <span class="logo-sm"><img src="/assets/images/logo-sm.png" alt="small logo"></span>
                </span>

                <span class="logo logo-dark">
                    <span class="logo-lg"><img src="/assets/images/logo-black.png" alt="dark logo"></span>
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

                <!-- User -->
                <div class="sidenav-user">

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="users-profile.html" class="link-reset">
                                <img src="/assets/images/users/user-3.jpg" alt="user-image" class="rounded-circle mb-2 avatar-md">
                                <span class="sidenav-user-name fw-bold">Geneva K.</span>
                                <span class="fs-12 fw-semibold" data-lang="user-role">Art Director</span>
                            </a>
                        </div>
                        <div>
                            <a class="dropdown-toggle drop-arrow-none link-reset sidenav-user-set-icon" data-bs-toggle="dropdown" data-bs-offset="0,12" href="#!" aria-haspopup="false" aria-expanded="false">
                                <i class="ti ti-settings fs-24 align-middle ms-1"></i>
                            </a>

                            <div class="dropdown-menu">
                                <!-- Header -->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome back!</h6>
                                </div>

                                <!-- My Profile -->
                                <a href="profile.html" class="dropdown-item">
                                    <i class="ti ti-user-circle me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Profile</span>
                                </a>

                                <!-- Notifications -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-bell-ringing me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Notifications</span>
                                </a>

                                <!-- Settings -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-settings-2 me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Account Settings</span>
                                </a>

                                <!-- Support -->
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-headset me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Support Center</span>
                                </a>

                                <!-- Divider -->
                                <div class="dropdown-divider"></div>

                                <!-- Lock -->
                                <a href="auth-lock-screen.html" class="dropdown-item">
                                    <i class="ti ti-lock me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Lock Screen</span>
                                </a>

                                <!-- Logout -->
                                <a href="javascript:void(0);" class="dropdown-item fw-semibold">
                                    <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

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
                        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                            <span class="menu-icon"><i data-lucide="inbox"></i></span>
                            <span class="menu-text" data-lang="email">Email</span>
                            <span class="badge text-bg-danger">New</span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="email.html" class="side-nav-link">
                                        <span class="menu-text" data-lang="email-inbox">Inbox</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="email-details.html" class="side-nav-link">
                                        <span class="menu-text" data-lang="email-details">Details</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarCRM" aria-expanded="false" aria-controls="sidebarCRM" class="side-nav-link">
                            <span class="menu-icon"><i data-lucide="users"></i></span>
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
                                    <a href="#" class="side-nav-link">
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
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <img src="/assets/images/logo-uma.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="/assets/images/logo-sm.png" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <img src="/assets/images/logo-black.png" alt="dark logo">
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

            <div class="container-fluid">

                
                @yield('content')

            </div>
            <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            © <script>document.write(new Date().getFullYear())</script> Desarrallado con ❤️<span class="fw-semibold">por Developers UMA</span> 
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
                            <input class="form-check-input" type="radio" name="data-skin" id="demo-skin-saas" value="saas">
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

    @stack('script')

</body>


</html>