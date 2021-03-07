<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_anteproyecto.php';
require_once '../includes/conexion.php';


$idResidencia=$_SESSION['idResidencia'];
          if($idResidencia!=null)
          {
            $idResidencia=$_SESSION['idResidencia'];
            $sql= 'SELECT residencias.idResidencia, concat(profesor.nombre," ",profesor.apellido_p," ",profesor.apellido_m) as asesor,
            profesor.correo, anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,periodos.nombre_periodo AS nombre_periodo 
            FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id
            INNER JOIN residencias on anteproyectos.idAnteproyecto = residencias.idAnteproyecto INNER JOIN profesor on residencias.idAsesor = profesor.profesor_id WHERE idResidencia=?';
            $query= $pdo->prepare($sql);
            $query->execute(array($idResidencia));

            $consulta = $query->fetchAll(PDO::FETCH_ASSOC);

            for($i = 0; $i < count($consulta); $i++){
                $nombre_asesor = $consulta[$i]['asesor'];
                $correo = $consulta[$i]['correo'];
                $nombre_anteproyecto = $consulta[$i]['nombre_anteproyecto'];
                $nombre_periodo = $consulta[$i]['nombre_periodo'];
            }



            if(!isset($_POST['action'])){
            
                
            }else if (isset($_POST['action'])&&$_FILES['user_file']['name']!=null){
            $descripcion= $_POST['nombre'];
            $idResidencia = $_SESSION['idResidencia'];
            $name= $_FILES['user_file']['name'];
            $type= $_FILES['user_file']['type'];
            $data = file_get_contents($_FILES['user_file']['tmp_name']);

            $sql = 'INSERT INTO residencias_doc (idResidencia,descripcion,archivo,mime,data) VALUES(?,?,?,?,?)';
            $query = $pdo->prepare($sql); 
            $query->execute(array($idResidencia,$descripcion,$name,$type,$data));


            }


            echo '
            
                <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>MI RESIDENCIA</h1>
                        <hr class="red"></hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <div class="widget-small primary"><i class="icon fas fa-chalkboard-teacher fa-3x"></i>
                        <div class="info">
                        <h4>Asesor Interno</h4>
                        <p><b>'.$nombre_asesor.'</b></p>
                        <p><b>'.$correo.'</b></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3-1">
                    <div class="widget-small info"><i class="icon fas fa-award fa-3x"></i>
                        <div class="info">
                        <h4>Residencia</h4>
                        <p><b>'.$nombre_anteproyecto.'</b></p>
                        <p><b>'.$nombre_periodo.'</b></p>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="row user">
                    <div class="col-md-3">
                        <div class="tile p-0">
                            <ul class="nav flex-column nav-tabs user-tabs">
                            <li class="nav-item"><a class="nav-link active" href="#user-documentos" data-toggle="tab">Documentos</a></li>
                                <li class="nav-item"><a class="nav-link " href="#user-acuerdo" data-toggle="tab">Acuerdo de Colaboracion</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-solicitud" data-toggle="tab">Solicitud de Residencia Profesional</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-rfc" data-toggle="tab">RFC de la Empresa</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-1seguimiento" data-toggle="tab">1er. Seguimiento</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-2seguimiento" data-toggle="tab">2do. Seguimiento</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-3seguimiento" data-toggle="tab">3er. Seguimiento</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-reporte" data-toggle="tab">Reporte Final de Residencia</a></li>
                                <li class="nav-item"><a class="nav-link" href="#user-carta" data-toggle="tab">Carta de Terminacion</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="user-acuerdo">
                                <div class="tile user-acuerdo">
                                    <h4 class="line-head">Acuerdo de Colaboracion</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="Acuerdo de Colaboracion">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="user-solicitud">
                                <div class="tile user-solicitud">
                                    <h4 class="line-head">Solicitud de Residencia Profesional</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="Solicitud de Residencia Profesional">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="user-rfc">
                                <div class="tile user-rfc">
                                    <h4 class="line-head">RFC de la Empresa</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="RFC de la Empresa">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-1seguimiento">
                                <div class="tile user-1seguimiento">
                                    <h4 class="line-head">1er. Seguimiento</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="1er. Seguimiento">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-2seguimiento">
                                <div class="tile user-2seguimiento">
                                    <h4 class="line-head">2do. Seguimiento</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="2do. Seguimiento">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-3seguimiento">
                                <div class="tile user-3seguimiento">
                                    <h4 class="line-head">3er. Seguimiento</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="3er. Seguimiento">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-reporte">
                                <div class="tile user-reporte">
                                    <h4 class="line-head">Reporte Final de Residencia</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="Reporte Final de Residencia">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="user-carta">
                                <div class="tile user-carta">
                                    <h4 class="line-head">Carta de Terminacion</h4>
                                    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                            <label>Archivo</label>
                                                <input type="hidden" name="nombre" id="nombre" value="Carta de Terminacion">
                                                <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <div class="col-md-12">
                                            <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
                            <div class="tab-pane active" id="user-documentos">
                                <div class="tile user-documentos">
                                    <h4 class="line-head">Documentos</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="tableResidencia">
                                            <thead>
                                                <tr>
                                                    <th>Acciones</th>
                                                    <th>Descripcion</th>
                                                    <th>Archivo</th>
                                                    <th>Comentario</th>
                                                    <th>Fecha</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="tile mb-4">
          
                <div class="tile-body">
                <div class="bs-component">
                    <p>© 2020-2021 Ing. en Sistemas Computacionales. ® - Tu sistema de residencia profesional.</p>
                </div>
                </div>
            </div>';
            
            
          }else{
            echo '<main class="app-content">

            <div class="page-error tile">
              <h1><i class="fas fa-exclamation-circle"></i>Error 404: No se encontro la direccion</h1>
              <p>Espera a que activen tu residencia.</p>
              
            </div>
          <br>
          <div class="tile mb-4">
          
            <div class="tile-body">
            <div class="bs-component">
                <p>© 2020-2021 Ing. en Sistemas Computacionales. ® - Tu sistema de residencia profesional.</p>
            </div>
            </div>
        </div>
          
          </main>';
          }

require_once 'includes/footer.php';

?>

<script type="text/javascript">
 if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
 </script>