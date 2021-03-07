<?php
require_once '../../../includes/conexion.php';


$sql= 'SELECT profesores_cartasterminacion.id,profesores_cartasterminacion.fecha, residencias.idResidencia, concat(profesor.nombre," ",profesor.apellido_p," ",profesor.apellido_m) as asesor,
anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,periodos.nombre_periodo AS nombre_periodo ,
profesores_cartasterminacion.archivo as documento
FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id
INNER JOIN residencias on anteproyectos.idAnteproyecto = residencias.idAnteproyecto INNER JOIN profesor on residencias.idAsesor = profesor.profesor_id
INNER JOIN profesores_cartasterminacion on residencias.idResidencia=profesores_cartasterminacion.idResidencia';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
 
$consulta[$i]['acciones']= 
'<button class="btni btn-light " title="Descargar archivo"><i><a target="_blank" href="doc_cartasTerminacion.php?id='.$consulta[$i]['id'].'" class="fas fa-file-download"></a></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="deleteCarta('.$consulta[$i]['id'].')"><i class="fas fa-trash-alt"></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();