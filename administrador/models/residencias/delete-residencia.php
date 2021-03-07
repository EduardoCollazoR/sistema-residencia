<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idResidencia= $_POST['idResidencia'];
    $sql="DELETE FROM residencias WHERE idResidencia=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idResidencia));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Residencia eliminada correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar la Residencia'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}