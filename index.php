<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('Location:administrador/');
} else if (!empty($_SESSION['activeP'])) {
    header('Location:profesor/');
} else if (!empty($_SESSION['activeA'])) {
    header('Location:alumno/');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="description" content="Residencias profesionales">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">

    <link rel="shortcut icon" href="images/favicon.ico" />
    <script src="https://kit.fontawesome.com/291c7d6873.js" crossorigin="anonymous"></script>

    <title>ITT - Sistemas de residencias profesionales.</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>SISTEMA DE RESIDENCIAS PROFESIONALES</h1>
            <hr class="red"></hr>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#nav-admin" id="nav-admin-tab">Administrador</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#nav-prof" id="nav-prof-tab">Profesor</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#nav-alumn" id="nav-alumn-tab">Alumno</a></li>
        </ul>
        </li>
        <div class="login-box">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-admin" role="tabpanel">
                    <form action="" onsubmit="return validar()" class="login-form">
                        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-shield"> </i>&nbsp;&nbsp;INICIAR SESION</h3>
                        <div class="form-group">
                            <label class="control-label">CORREO INSTITUCIONAL</label>
                            <input class="form-control" name="correo" id="correo" type="email" aria-describedby="emailHelp" placeholder="Correo Institucional" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="control-label">CONTRASEÑA</label>
                            <input class="form-control" name="contra" id="contra" type="password" placeholder="Contraseña" required>
                        </div>
                        <h3 class="login-head"></h3>
                        <div id="messageAdmin"></div>
                        <button id="loginAdmin" class="btn btn-primary btn-lg btn-block" type="button">INICIAR SESION</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-prof" role="tabpanel">
                    <form action="" onsubmit="return validar()" class="login-form">
                        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-tie"></i>&nbsp;INICIAR SESION</h3>
                        <div class="form-group">
                            <label class="control-label">CORREO INSTITUCIONAL</label>
                            <input class="form-control" name="correo" id="correoProfesor" type="email" aria-describedby="emailHelp" placeholder="Correo Institucional" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="control-label">CONTRASEÑA</label>
                            <input class="form-control" name="contra" id="contraProfesor" type="password" placeholder="Contraseña" required>
                        </div>
                        <h3 class="login-head"></h3>
                        <div id="messageProfesor"></div>
                        <button id="loginProfesor" class="btn btn-primary btn-lg btn-block" type="button">INICIAR SESION</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-alumn" role="tabpanel">
                    <form action="" onsubmit="return validar()" class="login-form">
                        <h3 class="login-head"><i class="fas fa-lg fa-fw fa-user-graduate"></i>&nbsp;INICIAR SESION</h3>
                        <div class="form-group">
                            <label class="control-label">CORREO INSTITUCIONAL</label>
                            <input class="form-control" name="correo" id="correoAlumno" type="email" aria-describedby="emailHelp" placeholder="Correo Institucional" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="control-label">CONTRASEÑA</label>
                            <input class="form-control" name="contra" id="contraAlumno" type="password" placeholder="Contraseña" required>
                        </div>
                        <h3 class="login-head"></h3>
                        <div id="messageAlumno"></div>
                        <div class="utility">
                            <p class="semibold-text mb-2"><a href='registro.php'>¿No tienes cuenta?, Registrate</a></p>
                        </div>
                        <button id="loginAlumno" class="btn btn-primary btn-lg btn-block" type="button">INICIAR SESION</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
</body>

</html>