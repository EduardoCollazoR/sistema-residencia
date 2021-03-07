<?php
require_once '../../../includes/conexion.php';

if($_POST){
    $idusuario= $_POST['idusuario'];
    $sql="DELETE FROM usuarios WHERE usuario_id=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idusuario));
   
    if($result){
      $respuesta= array('status'=>true,'msg'=>'Usuario eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el usuario'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}