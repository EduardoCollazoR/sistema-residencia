<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idproyecto= $_POST['idproyecto'];
    $sql="DELETE FROM proyecto WHERE proyecto_id=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idproyecto));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Proyecto eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el proyecto'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}