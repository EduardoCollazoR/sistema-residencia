<!DOCTYPE html>
<html lang="en">

<head>
<meta name="description" content="Residencias profesionales">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/section.css?v=<?php echo time(); ?>">
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
                
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#nav-alumn" id="nav-alumn-tab">Alumno</a></li>
              </ul>
              

</li>
<div class="login-box">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <form action="" onsubmit="return validar()" id="formAlumno" name="formAlumno" class="login-form">
                    <h3 class="login-head"><i class="fas fa-lg fa-fw fa-user-graduate"></i>&nbsp;REGISTRARME</h3>
                        <div class="form-group">
                        <label for="control-label">NOMBRE</label>
                            <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" autofocus required>
                        </div>

                        <div class="form-group">
                        <label for="control-label">APELLIDO PATERNO</label>
                            <input class="form-control" id="apellidoPaterno" name="apellidoPaterno" type="text" placeholder="Apellido Paterno" required>
                           
                        </div>

                        <div class="form-group">
                        <label for="control-label">APELLIDO MATERNO</label>
                            <input class="form-control" id="apellidoMaterno" name="apellidoMaterno" type="text" placeholder="Apellido Materno" required>
                            
                        </div>

                        <div class="form-group">
                        <label for="control-label">CORREO INSTITUCIONAL</label>
                            <input class="form-control" id="correo" name="correo" type="email" placeholder="Correo" aria-describedby="emailHelp" required>
                            
                        </div>

                        <div class="form-group">
                        <label for="control-label">NUMERO DE CONTROL</label>
                            <input class="form-control" id="ncontrol" name="ncontrol" type="text" placeholder="Numero de Control" required>
                        </div>
                        <div class="form-group">
                        <label for="control-label">SEMESTRE</label>
                            <select class="form-control"  id="semestre" name="semestre" required>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="12">13</option>
                                <option value="12">14</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                        <label for="control-label">TELEFONO</label>
                            <input class="form-control"  id="telefono" name="telefono" type="num" placeholder="Telefono" required>
                            
                        </div>
                        <div class="form-group">
                        <label for="control-label">CONTRASEÑA</label>
                            <input class="form-control"   id="clave" name="clave" type="password" placeholder="Contraseña" required>
            
                        </div>
                        <input type="hidden" name="estado" id="estado" value="2">

                        <h3 class="login-head"></h3>
                        <div id="messageAlumno"></div>
                        <div class="utility">
                            <p class="semibold-text mb-2"><a href='index.php'>¿Ya tienes cuenta?, Inicia Sesion</a></p>
                        </div>
                        <button id="registerAlumno" class="btn btn-primary btn-lg btn-block" type="button">REGISTRARME</button>
                    </form>
                </div>
            </div>
        </div>
      </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/register.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
</body>

</html>