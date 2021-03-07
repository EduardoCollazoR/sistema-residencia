<?php
 require_once '../../../includes/conexion.php';

$sql= 'SELECT idArchivo,nombre_archivo,archivo FROM formatos';
$query= $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){



    $consulta[$i]['acciones']= '
<button class="btni btn-light" title="Abrir"><a target="_blank" href="documento.php?idArchivo='.$consulta[$i]['idArchivo'].'" class="fas fa-file-download"></a></button>
<button class="btni btn-danger" title="Eliminar" onclick="deleteFormato('.$consulta[$i]['idArchivo'].')"
><i class="fas fa-trash-alt"></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();

