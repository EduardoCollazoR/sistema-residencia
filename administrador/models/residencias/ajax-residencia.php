<?php

require_once '../../../includes/conexion.php';

if (!empty($_POST)) {
    if (empty($_POST['idAnteproyecto'])|| empty($_POST['idAsesor']) || empty($_POST['fecha_inicio']) ){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idResidencia = $_POST['idResidencia'];
        $idAnteproyecto = $_POST['idAnteproyecto'];
        $idAsesor = $_POST['idAsesor'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $estado = $_POST['estado'];
        
       
        $sql = 'SELECT * FROM residencias WHERE idResidencia =?';
        $query = $pdo->prepare($sql);
        $query->execute(array($idResidencia));
        $result = $query->fetch(PDO::FETCH_ASSOC);

            if($idResidencia==0){
                $sqlInsert = 'INSERT INTO residencias (idAnteproyecto,idAsesor,fecha_inicio,fecha_fin,estatus) VALUES(?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($idAnteproyecto,$idAsesor,$fecha_inicio,$fecha_fin,$estado));
                $accion = 1; 
            } else {
                $sqlUpdate = 'UPDATE residencias SET idAsesor=?, fecha_inicio=?, fecha_fin=?, estatus=?  WHERE idResidencia=?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($idAsesor,$fecha_inicio,$fecha_fin,$estado ,$idResidencia));
                    $accion = 2;
            }
               


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Residencia creada correctamente');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Residencia actualizada correctamente');
                }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
