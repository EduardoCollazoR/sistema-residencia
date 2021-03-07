<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
   
        $idAnteproyecto = $_POST['idAnteproyecto'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $estatus = $_POST['listEstado'];

                $sqlUpdate = 'UPDATE anteproyectos SET nombre =?, tipo=?, estatus=? WHERE idAnteproyecto=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre,$tipo,$estatus, $idAnteproyecto));
                    $accion = 2;

            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Usuario creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Anteproyecto actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
