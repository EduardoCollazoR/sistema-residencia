<?php
require_once '../../../includes/conexion.php';
$sql="SELECT residencias.idResidencia, residencias.fecha_inicio, residencias.fecha_fin, residencias.idAsesor, residencias.estatus,
profesor.nombre as asesor, profesor.apellido_p as asesor_apellido,
anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,anteproyectos.tipo,alumno.ncontrol 
AS ncontrol_alumno , alumno.nombre as nombre_alumno ,alumno.apellido_p as apellido_alumno ,periodos.nombre_periodo AS nombre_periodo 
FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id
INNER JOIN residencias on anteproyectos.idAnteproyecto = residencias.idAnteproyecto INNER JOIN profesor on residencias.idAsesor = profesor.profesor_id WHERE residencias.estatus=1";
$query =$pdo->prepare($sql);
$query->execute();

$data=$query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data,JSON_UNESCAPED_UNICODE);