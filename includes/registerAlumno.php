<?php

require_once 'conexion.php';

if(!empty($_POST)){
    if(empty($_POST['nombre'])|| empty($_POST['apellidoPaterno'])|| empty($_POST['apellidoMaterno'])|| empty($_POST['ncontrol'])|| empty($_POST['correo'])|| empty($_POST['semestre'])|| empty($_POST['telefono'])|| empty($_POST['clave']) ){
        echo '<div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" href="#"></a>Todos los campos son requeridos.
      </div>';
    }else{
        $nombre=$_POST['nombre'];
        $apelllidop=$_POST['apellidoPaterno'];
        $apelllidom=$_POST['apellidoMaterno'];
        $ncontrol=$_POST['ncontrol'];
        $semestre=$_POST['semestre'];
        $correo=$_POST['correo'];
        $tel=$_POST['telefono'];
        $clave=$_POST['clave'];
        $estado=$_POST['estado'];

        $validacioncorreo=preg_match('/^([a-z]+.+[a-z]+([0-9]+[0-9])*@tectijuana.edu.mx+$|^[a-z]+.+[a-z]+([0-9]+[0-9])*@tectijuana.mx+$)/', $correo);
        $validacionNombre=preg_match('/(^[A-Z]+[a-z]+$|^[A-Z]+[a-z]+\s+[A-Z]+[a-z]+$)/',$nombre);
        $validacionApellidop=preg_match('/^[A-Z]+[a-z]+$/',$apelllidop);
        $validacionApellidom=preg_match('/^[A-Z]+[a-z]+$/',$apelllidom);
        $validacionNcontrol=preg_match('/^[0-9]{8}+$/',$ncontrol);
        $validacionTelefono=preg_match('/(^[0-9]{10})+$/',$tel);
        $validacionSemestre=preg_match('/^[0-9]+$/',$semestre);
        $validacionContra=preg_match('/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/',$clave);


        if(!$validacionNombre){
          echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Nombre Invalido</div>';
        }elseif(!$validacionApellidop) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Apellido Invalido</div>';
        }elseif(!$validacionApellidom) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Apellido Invalido</div>';
        }elseif(!$validacionNcontrol) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Numero de control Invalido</div>';
        }elseif(!$validacionSemestre) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Seleccione un semestre</div>';
        }elseif(!$validacioncorreo) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Correo Invalido</div>';
        }elseif(!$validacionTelefono) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Telefono Invalido</div>';
        }elseif(!$validacionContra) {echo '<div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link"></a>Contraseña debe ser de 8 a 16 caracteres.
          Debe incluir una mayuscula y  1 numero</div>';
        }else{
        
        
    
        $clave=password_hash($clave,PASSWORD_DEFAULT);
        $sql ='SELECT * FROM alumno WHERE ncontrol =?';
        $query=$pdo-> prepare($sql);
        $query->execute(array($ncontrol));
        $result=$query->fetch(PDO::FETCH_ASSOC);
        
        if($result>0){
            echo '<div class="alert alert-dismissible alert-warning">
        <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" ></a>El numero de control ya existe.
      </div>';
        }else{

          
            $sqlInsert="INSERT INTO alumno (nombre,apellido_p,apellido_m,ncontrol,correo,clave,telefono,semestre,estado) VALUES(?,?,?,?,?,?,?,?,?)";
            $queryInsert=$pdo->prepare($sqlInsert);
            $resultInsert=$queryInsert->execute(array($nombre,$apelllidop,$apelllidom,$ncontrol,$correo,$clave,$tel,$semestre,$estado));
            
            if($resultInsert){
                echo '<div class="alert alert-dismissible alert-warning">
        <button class="close" type="button" data-dismiss="alert">×</button><strong>Registro con exito, ahora espera la autorizacion del administrador para poder ingresar al sistema.</strong><a class="alert-link" ></a>
      </div>';

            }else{
                echo '<div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button><strong>Error al realizar el registro.</strong><a class="alert-link" ></a>
              </div>';
            }

        }
      }

    
  }
}
