<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['apellidoPaterno']) || empty($_POST['apellidoMaterno'])  || empty($_POST['correo']) || empty($_POST['tel']) || empty($_POST['semestre'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idalumno = $_POST['idalumno'];
        $nombre = $_POST['nombre'];
        $apelllidop = $_POST['apellidoPaterno'];
        $apelllidom = $_POST['apellidoMaterno'];
        $ncontrol = $_POST['ncontrol'];
        $correo = $_POST['correo'];
        $semestre = $_POST['semestre'];
        $tel = $_POST['tel'];
        $estado = $_POST['listEstado'];

    
        $sql = 'SELECT * FROM alumno WHERE ncontrol =? AND alumno_id != ? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($ncontrol,$idalumno));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Ese numero de control ya existe');
        } else {
            if ($idalumno == 0) {
                $clave = password_hash($_POST['ncontrol'],PASSWORD_DEFAULT);
                $sqlInsert = 'INSERT INTO alumno(nombre,apellido_p,apellido_m,ncontrol,correo,semestre,telefono,clave,estado) VALUES(?,?,?,?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo,$semestre, $tel, $clave, $estado));
                $accion = 1;
            } else {
                if(empty($_POST['clave'])){
                    $sqlUpdate = 'UPDATE  alumno SET nombre=?,apellido_p=?,apellido_m=?,ncontrol=?,correo=?,semestre=?,telefono=?,estado=? WHERE alumno_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo,$semestre, $tel, $estado, $idalumno));
                    $accion = 2;

                }else {
                    $claveUpdate=password_hash($_POST['ncontrol'],PASSWORD_DEFAULT);
                    $sqlUpdate = 'UPDATE  alumno SET nombre=?,apellido_p=?,apellido_m=?,ncontrol=?,correo=?,semestre=?,telefono=?,clave=?,estado=? WHERE alumno_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo,$semestre, $tel,$claveUpdate, $estado, $idalumno));
                    $accion = 3;
                }
                 
            }


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Alumno creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Alumno actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
