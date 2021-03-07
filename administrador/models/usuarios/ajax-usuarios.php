<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['apellidoPaterno']) || empty($_POST['apellidoMaterno'])  || empty($_POST['correo']) || empty($_POST['tel'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idusuario = $_POST['idusuario'];
        $nombre = $_POST['nombre'];
        $apelllidop = $_POST['apellidoPaterno'];
        $apelllidom = $_POST['apellidoMaterno'];
        $ncontrol = $_POST['ncontrol'];
        $correo = $_POST['correo'];
        $tel = $_POST['tel'];
        $rol = $_POST['listRol'];
        $estado = $_POST['listEstado'];


        $sql = 'SELECT * FROM usuarios WHERE ncontrol =? AND usuario_id != ? AND estado!=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($ncontrol,$idusuario));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Ese numero de control ya existe');
        } else {
            if ($idusuario == 0) {
                $clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);
                $sqlInsert = 'INSERT INTO usuarios(nombre,apellido_p,apellido_m,ncontrol,correo,telefono,clave,rol,estado) VALUES(?,?,?,?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo, $tel, $clave, $rol, $estado));
                $accion = 1;
            } else {
                if (empty($_POST['clave'])) {
                    $sqlUpdate = 'UPDATE  usuarios SET nombre=?,apellido_p=?,apellido_m=?,ncontrol=?,correo=?,telefono=?,rol=?,estado=? WHERE usuario_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo, $tel, $rol, $estado, $idusuario));
                    $accion = 2;
                } else {
                    $claveUpdate=password_hash($_POST['clave'],PASSWORD_DEFAULT);
                    $sqlUpdate = 'UPDATE  usuarios SET nombre=?,apellido_p=?,apellido_m=?,ncontrol=?,correo=?,telefono=?,clave=?,rol=?,estado=? WHERE usuario_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $apelllidop, $apelllidom, $ncontrol, $correo, $tel, $claveUpdate, $rol, $estado, $idusuario));
                    $accion = 3;
                }
            }


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Usuario creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Usuario actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
