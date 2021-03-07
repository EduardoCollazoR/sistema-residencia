<?php
 require_once '../../../includes/conexion.php';


$sql= 'SELECT residencias.idResidencia, residencias.fecha_inicio, residencias.fecha_fin, residencias.idAsesor, residencias.estatus,
profesor.nombre as asesor, profesor.apellido_p as asesor_apellido,profesor.apellido_m as asesor_apellidom,
anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,anteproyectos.tipo,alumno.ncontrol 
AS ncontrol_alumno , alumno.nombre as nombre_alumno ,alumno.apellido_p as apellido_alumno ,alumno.apellido_m as apellidom_alumno,periodos.nombre_periodo AS nombre_periodo 
FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id
INNER JOIN residencias on anteproyectos.idAnteproyecto = residencias.idAnteproyecto INNER JOIN profesor on residencias.idAsesor = profesor.profesor_id';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estatus']==1){
        $consulta[$i]['estatus']= '<span class="badge badge-success">EN PROGRESO</span>';
    }else if($consulta[$i]['estatus']==2){
        $consulta[$i]['estatus']= '<span class="badge badge-secondary">FINALIZADO</span>';
    }else if($consulta[$i]['estatus']==3){
        $consulta[$i]['estatus']= '<span class="badge badge-secondary">ACEPTADO</span>';
    }
    if($consulta[$i]['tipo']==1){
        $consulta[$i]['tipo']= '<span class="badge badge-primary">INTERNO</span>';
    }else{
        $consulta[$i]['tipo']= '<span class="badge badge-secondary">EXTERNO</span>';
    }

$consulta[$i]['acciones']= 
'<button class="btni  btn-dark title="Abrir carpeta" onclick="open_residenciaDocs('.$consulta[$i]['idResidencia'].')"><i class="fas fa-folder-open"></i></button>
<button class="btni  btn-info " title="Editar" onclick="editResidencia('.$consulta[$i]['idResidencia'].')"><i class="fas fa-edit"></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="deleteResidencia('.$consulta[$i]['idResidencia'].')"><i class="fas fa-trash-alt"></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();