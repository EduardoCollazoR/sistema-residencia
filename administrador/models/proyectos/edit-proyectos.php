<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idproyecto=$_GET['idproyecto'];
    
    $sql=" SELECT * FROM proyecto as py INNER JOIN empresa as e ON py.empresa_id= e.empresa_id  WHERE py.proyecto_id = ? ";
    
    $query=$pdo->prepare($sql);
    $query->execute(array($idproyecto));
    $result=$query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}