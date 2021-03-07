<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idDocumento= $_POST['idDocumento'];
    $sql="DELETE FROM anteproyectos_doc WHERE idDocumento=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idDocumento));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Documento eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el documento'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}