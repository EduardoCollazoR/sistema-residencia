<?php
require '../../../includes/conexion.php';
if(!empty($_GET)){
    $idResidencia=$_GET['idResidencia'];
    
    $sql="SELECT residencias.idResidencia, residencias.fecha_inicio, residencias.fecha_fin, residencias.idAsesor, residencias.estatus,
    profesor.nombre as asesor, profesor.apellido_p as asesor_apellido,profesor.apellido_m as asesor_apellidom,
    anteproyectos.idAnteproyecto,anteproyectos.nombre AS nombre_anteproyecto ,anteproyectos.tipo,alumno.ncontrol 
    AS ncontrol_alumno , alumno.nombre as nombre_alumno ,alumno.apellido_p as apellido_alumno ,alumno.apellido_m as apellidom_alumno,periodos.nombre_periodo AS nombre_periodo 
    FROM alumno INNER JOIN anteproyectos ON alumno.alumno_id = anteproyectos.ncontrol INNER JOIN periodos on anteproyectos.periodo_id = periodos.periodo_id
    INNER JOIN residencias on anteproyectos.idAnteproyecto = residencias.idAnteproyecto INNER JOIN profesor on residencias.idAsesor = profesor.profesor_id";
    $query=$pdo->prepare($sql);
    $query->execute(array($idResidencia));
    $result=$query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta= array('status' => false,'msg'=>'Datos no encontrados');

    }else{
        $respuesta= array('status' => true,'data'=>$result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}