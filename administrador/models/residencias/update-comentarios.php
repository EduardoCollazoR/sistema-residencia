<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
   
        $idDocumento = $_POST['idDocumento'];
        $comentarios = $_POST['comentarios'];

                $sqlUpdate = 'UPDATE residencias_doc SET comentarios=? WHERE idDocumento=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($comentarios, $idDocumento));
                    $accion = 2;

            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Usuario creado correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Comentario actualizado correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
