<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['apellidoPaterno']) || empty($_POST['apellidoMaterno'])  || empty($_POST['correo']) || empty($_POST['tel'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idprofesor = $_POST['idprofesor'];
        $nombre = $_POST['nombre'];
        $apelllidop = $_POST['apellidoPaterno'];
        $apelllidom = $_POST['apellidoMaterno'];
        $ncontrol = $_POST['ncontrol'];
        $correo = $_POST['correo'];
        $tel = $_POST['tel'];
        $estado = $_POST['listEstado'];

        
        $sql = 'SELECT * FROM profesor WHERE ncontrol =? AND profesor_id != ? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($ncontrol,$idprofesor));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Ese numero de control ya existe');
        } else {
            if ($idprofesor == 0) {
                $clave = password_hash($_POST['ncontrol'], PASSWORD_DEFAULT);
                $sqlInsert = 'INSERT INTO profesor(nombre,apellido_p,apellido_m,ncontrol,correo,telefono,clave,estado) VALUES(?,?,?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo, $tel, $clave, $estado));
                $accion = 1;
            } else {
                if (empty($_POST['clave'])) {
                    $sqlUpdate = 'UPDATE  profesor SET nombre=?,apellido_p=?,apellido_m=?,ncontrol=?,correo=?,telefono=?,estado=? WHERE profesor_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo, $tel, $estado, $idprofesor));
                    $accion = 2;
                } else {
                    $claveUpdate=password_hash($_POST['clave'],PASSWORD_DEFAULT);
                    $sqlUpdate = 'UPDATE  profesor SET nombre=?,apellido_p=?,apellido_m=?,ncontrol=?,correo=?,telefono=?,clave=?,estado=? WHERE profesor_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo, $tel, $claveUpdate, $estado, $idprofesor));
                    $accion = 3;
                }
            }


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Profesor creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Profesor actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
