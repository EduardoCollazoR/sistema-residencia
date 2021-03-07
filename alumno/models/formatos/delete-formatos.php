<?php
require_once  'C:\xampp\htdocs\Sistema\includes\conexion.php';

if($_POST){
    $idArchivo= $_POST['idArchivo'];

    $sql="DELETE FROM formatos WHERE idArchivo=?";
    $query=$pdo->prepare($sql);
    $result=$query->execute(array($idArchivo));

    if($result){
      $respuesta= array('status'=>true,'msg'=>'Formato eliminado correctamente');
    }else{
        $respuesta= array('status'=>false,'msg'=>'Error al eliminar el Formato'); 
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}