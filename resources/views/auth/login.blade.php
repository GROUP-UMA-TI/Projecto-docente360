<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>Login | Projecto-docente360</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Projecto-docente360 es una plataforma integral para la gestión educativa que permite la observación, evaluación y seguimiento de docentes, control de asistencia, encuestas de satisfacción, y generación de reportes detallados para una administración eficiente y completa del desempeño académico." />
        <meta content="Developers UMA" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    
    <body>

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <img src="/assets/images/logo-uma.png" alt="" width="180">
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Correo</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" name="email" placeholder="Ingrese su correo" required>
                                                 <span class="bx bx-user"></span>
                                            </div>
                                        </div>
                
                                        <div class="mb-3">
                                            {{-- <div class="float-end">
                                                <a href="auth-recoverpw.html" class="text-muted text-decoration-underline">¿Olvidaste tu contraseña?</a>
                                            </div> --}}
                                            <label class="form-label" for="password">Contraseña</label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                            </div>
                                        </div>

                                        @error('email')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @enderror

                                        <div class="form-check py-1">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Recuérdame</label>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Iniciar sesión</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>© <script>document.write(new Date().getFullYear())</script> Plataforma. Creado con <i class="mdi mdi-heart text-danger"></i> por Developres - UMA</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>



        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/eva-icons/eva.min.js"></script>

        <script src="/assets/js/pages/pass-addon.init.js"></script>

    </body>


</html>