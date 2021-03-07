<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $empresa_id=$_GET['empresa_id'];
    
    $sql="SELECT * FROM empresa WHERE empresa_id = ?";
    $query=$pdo->prepare($sql);
    $query->execute(array($empresa_id));
    $result=$query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}