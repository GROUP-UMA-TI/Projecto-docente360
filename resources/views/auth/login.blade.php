<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Sign In | UBold - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Projecto-docente360 es una plataforma integral para la gestión educativa que permite la observación, evaluación y seguimiento de docentes, control de asistencia, encuestas de satisfacción, y generación de reportes detallados para una administración eficiente y completa del desempeño académico." />
    <meta name="keywords" content="gestión educativa, evaluación docente, seguimiento docente, observación de clases, control de asistencia, encuestas educativas, reportes académicos, desempeño docente, plataforma educativa, sistema de gestión escolar, administración educativa, educación digital">
    <meta content="Developers UMA" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="assets/css/vendors.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="auth-box overflow-hidden align-items-center d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-md-6 col-sm-8">
                    <div class="card p-4">                       
                        <div class="auth-brand text-center mb-4">
                            <a href="index.html" class="logo-dark">
                                <img src="/assets/images/logo-uma-.png" alt="dark logo" height="80">
                            </a>
                            <a href="index.html" class="logo-light">
                                <img src="assets/images/logo-uma-.png" alt="logo" height="28">
                            </a>
                        </div>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="tu@ejemplo.com" required>
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label for="userPassword" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                                </div>
                            </div>
    
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input-light fs-14" type="checkbox" checked id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Mantenerme conectado</label>
                                </div>
                                
                            </div>
    
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger fw-semibold py-2">INGRESAR</button>
                            </div>
                        </form>
    
                    </div>
    
                    <p class="text-center text-muted mt-4 mb-0">
                        © <script>document.write(new Date().getFullYear())</script> Desarrollado con <i class="ti ti-heart"></i> por<span class="fw-semibold"> Developers UMA</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    

    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="/assets/js/vendors.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>


</html>