<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idAnteproyecto= $_POST['idAnteproyecto'];
    $sql="DELETE FROM anteproyectos WHERE idAnteproyecto=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idAnteproyecto));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Anteproyecto eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el anteproyecto'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}