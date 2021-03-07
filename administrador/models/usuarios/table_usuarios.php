<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM usuarios as u INNER JOIN rol as r ON u.rol=r.rol_id WHERE u.estado !=0';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estado']==1){
        $consulta[$i]['estado']= '<span class="badge badge-success">ACTIVO</span>';
    }else{
        $consulta[$i]['estado']= '<span class="badge badge-danger">INACTIVO</span>';
    }

$consulta[$i]['acciones']= '
<button class="btni btn-info" title="Editar" onclick="editUsuario('.$consulta[$i]['usuario_id'].')"
><i class="fas fa-edit "></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="deleteUsuario('.$consulta[$i]['usuario_id'].')"
><i class=" fas fa-trash-alt"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();