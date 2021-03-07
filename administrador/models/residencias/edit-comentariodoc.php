<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idDocumento=$_GET['idDocumento'];
    
    $sql="SELECT idDocumento,idResidencia, archivo, mime, comentarios FROM residencias_doc WHERE idDocumento = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($idDocumento));
    $result=$query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}