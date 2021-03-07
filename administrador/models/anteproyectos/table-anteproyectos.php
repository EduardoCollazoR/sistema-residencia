<?php
 require '../../../includes/conexion.php';


$sql= 'SELECT anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,anteproyectos.tipo,anteproyectos.estatus, anteproyectos.fecha,alumno.ncontrol,alumno.nombre as nombre_alumno ,alumno.apellido_p,alumno.apellido_m,periodos.nombre_periodo AS nombre_periodo 
FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id ';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estatus']==1){
        $consulta[$i]['estatus']= '<span class="badge badge-secondary">PENDIENTE</span>';
    }else if($consulta[$i]['estatus']==2){
        $consulta[$i]['estatus']= '<span class="badge badge-success">ACEPTADO</span>';
    }else{
        $consulta[$i]['estatus']= '<span class="badge badge-info">RESIDENCIA</span>';
    }
    if($consulta[$i]['tipo']==1){
        $consulta[$i]['tipo']= '<span class="badge badge-primary">INTERNO</span>';
    }else{
        $consulta[$i]['tipo']= '<span class="badge badge-secondary">EXTERNO</span>';
    }


$consulta[$i]['acciones']= 
'<button class="btni btn-dark" title="Abrir carpeta" onclick="openDocs('.$consulta[$i]['idAnteproyecto'].')"><i class="fas fa-folder-open"></i></button>
<button class="btni  btn-info " title="Editar" onclick="editAnteproyecto('.$consulta[$i]['idAnteproyecto'].')"><i class=" fas fa-edit"></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="delete_anteproyecto('.$consulta[$i]['idAnteproyecto'].')"><i class="fas fa-trash-alt"></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();