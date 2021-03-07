<?php
 require_once '../../includes/sesion.php';
 require_once '../../../includes/conexion.php';
 $profesor_id= $_SESSION['profesor_id'];


$sql= 'SELECT profesores_cartasterminacion.id,profesores_cartasterminacion.fecha, residencias.idResidencia, concat(alumno.nombre," ",alumno.apellido_p," ",alumno.apellido_m) as nombre_alumno,
anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,periodos.nombre_periodo AS nombre_periodo ,
profesores_cartasterminacion.archivo as documento
FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id
INNER JOIN residencias on anteproyectos.idAnteproyecto = residencias.idAnteproyecto INNER JOIN profesor on residencias.idAsesor = profesor.profesor_id
INNER JOIN profesores_cartasterminacion on residencias.idResidencia=profesores_cartasterminacion.idResidencia WHERE profesor.profesor_id=?';
$query= $pdo->prepare($sql);
$query->execute(array($profesor_id));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){
 
$consulta[$i]['acciones']= 
'<button class="btni btn-light " title="Descargar archivo"><i><a target="_blank" href="doc_cartasTerminacion.php?id='.$consulta[$i]['id'].'" class="fas fa-file-download"></a></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();