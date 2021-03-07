<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idperiodo= $_POST['idperiodo'];
    $sql="DELETE FROM periodos WHERE periodo_id=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idperiodo));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Periodo eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el periodo'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}