<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idempresa= $_POST['idempresa'];
    $sql="DELETE FROM empresa WHERE empresa_id=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idempresa));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Empresa eliminada correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar la empresa'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}