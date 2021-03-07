<?php
require_once '../../../includes/conexion.php';

$sql= 'SELECT * FROM alumno  WHERE estado !=0';
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
<button class="btni btn-info" title="Editar" onclick="editAlumno('.$consulta[$i]['alumno_id'].')"
><i class="fas fa-edit"></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="deleteAlumno('.$consulta[$i]['alumno_id'].')"
><i class="fas fa-trash-alt"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();