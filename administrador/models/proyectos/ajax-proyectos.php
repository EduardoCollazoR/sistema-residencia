<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['listEmpresa']) || empty($_POST['descripcion']) ) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idproyecto = $_POST['idproyecto'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['listTipo'];
        $empresa = $_POST['listEmpresa'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['listEstado'];

        $sql = 'SELECT * FROM proyecto WHERE empresa_id=?  AND estado_proyecto !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($idproyecto));
        $result = $query->fetch(PDO::FETCH_ASSOC);

       
            if ($idproyecto == 0) {
                $sqlInsert = 'INSERT INTO proyecto(nombre,tipo_proyecto,empresa_id,descripcion,estado_proyecto) VALUES(?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $tipo, $empresa, $descripcion, $estado));
                $accion = 1;
            } else {
                    $sqlUpdate = 'UPDATE  proyecto SET nombre=?,tipo_proyecto=?,empresa_id=?,descripcion=?,estado_proyecto=? WHERE proyecto_id=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre, $tipo, $empresa, $descripcion, $estado,  $idproyecto));
                    $accion = 2;
                }
            
        


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Proyecto creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Proyecto actualizado correctamente');
                }
            } 
        }
    
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}

