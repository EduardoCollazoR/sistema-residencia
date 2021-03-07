<?php
require_once '../../../includes/conexion.php';
require_once '../../includes/sesion.php';

$idAlumno=$_SESSION['alumno_id'];


$sql= 'SELECT  anteproyectos_doc.idDocumento, anteproyectos_doc.archivo, anteproyectos.nombre,  anteproyectos_doc.comentarios,anteproyectos_doc.fecha,
anteproyectos.estatus as estado_anteproyecto, anteproyectos.tipo as tipo_anteproyecto FROM anteproyectos_doc inner join anteproyectos on  anteproyectos_doc.idAnteproyecto=anteproyectos.idAnteproyecto
inner join alumno on alumno.alumno_id=anteproyectos.ncontrol WHERE alumno.alumno_id=?';
$query= $pdo->prepare($sql);
$query->execute(array($idAlumno));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);


for($i = 0; $i < count($consulta); $i++){
    if($consulta[$i]['estado_anteproyecto']==1){
        $consulta[$i]['estado_anteproyecto']= '<span class="badge badge-success">PENDIENTE</span>';   
    }elseif($consulta[$i]['estado_anteproyecto']==2){
        $consulta[$i]['estado_anteproyecto']= '<span class="badge badge-danger">ACEPTADO</span>';   
    }else{
        $consulta[$i]['estado_anteproyecto']= '<span class="badge badge-danger">RESIDENCIA</span>';
    }


$consulta[$i]['acciones']= '<button class="btni btn-light " title="Abrir archivo"><i><a target="_blank" href="doc_anteproyectos.php?idDocumento='.$consulta[$i]['idDocumento'].'" class="fas fa-file-download"></a></i></button>
<button class="btni btn-danger" title="Eliminar" onclick="delete_AnteproyectoDoc('.$consulta[$i]['idDocumento'].')"><i class="fas fa-trash-alt"></i></button>';

}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();