<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM proyecto as py INNER JOIN empresa as e ON py.empresa_id= e.empresa_id  WHERE py.estado_proyecto !=0 AND py.tipo_proyecto!=0';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estado_proyecto']==1){
        $consulta[$i]['estado_proyecto']= '<span class="badge badge-success">ACTIVO</span>';   
    }else{
        $consulta[$i]['estado_proyecto']= '<span class="badge badge-danger">INACTIVO</span>';   
    }
 if($consulta[$i]['tipo_proyecto']==1){
    $consulta[$i]['tipo_proyecto']= '<span class="badge badge-primary">INTERNO</span>';
}else{
    $consulta[$i]['tipo_proyecto']= '<span class="badge badge-secondary">EXTERNO</span>';
}

$consulta[$i]['acciones']= '
<button class="btni btn-info" title="Editar" onclick="editProyecto('.$consulta[$i]['proyecto_id'].')"
><i class=" fas fa-edit "></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="deleteProyecto('.$consulta[$i]['proyecto_id'].')"
><i class="fas fa-trash-alt"></i></button>
<button class="btni btn-info" title="Informacion de empresa" onclick="infoEmpresa('.$consulta[$i]['empresa_id'].')"
><i class=" fas fa-info-circle "></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();
