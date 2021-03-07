<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['rfc'])  || empty($_POST['direccion']) || empty($_POST['tel']) || empty($_POST['responsable'])) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idempresa = $_POST['idempresa'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $rfc = $_POST['rfc'];
        $direccion = $_POST['direccion'];
        $responsable = $_POST['responsable'];
        $tel = $_POST['tel'];
        $estado = $_POST['listEstado'];


        $sql = 'SELECT * FROM empresa WHERE rfc =? AND empresa_id != ? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($rfc, $idempresa));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $respuesta = array('status' => false, 'msg' => 'Ese numero de RFC ya existe');
        } else {
            if ($idempresa == 0) {
                $sqlInsert = 'INSERT INTO empresa(nombre_empresa,correo,rfc,direccion,responsable,telefono,estado) VALUES(?,?,?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $correo, $rfc, $direccion, $responsable, $tel, $estado));
                $accion = 1;
            } else {
                $sqlUpdate = 'UPDATE  empresa SET nombre_empresas=?,correo=?,rfc=?,direccion=?,responsable=?,telefono=?,estado=? WHERE empresa_id=?';
                $queryUpdate = $pdo->prepare($sqlUpdate);
                $request = $queryUpdate->execute(array($nombre, $correo, $rfc, $direccion, $responsable, $tel, $estado, $idempresa));
                $accion = 2;
            }
        }


        if ($request > 0) {
            if ($accion == 1) {
                $respuesta = array('status' => true, 'msg' => 'Empresa creada correctamente');
            } else {
                $respuesta = array('status' => true, 'msg' => 'Empresa actualizada correctamente');
            }
        }
    }

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
