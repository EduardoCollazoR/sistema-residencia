<?php

require_once '../includes/conexion.php';

$idArchivo=isset($_GET['idArchivo'])? $_GET['idArchivo'] : "";
$sql= 'SELECT * FROM formatos WHERE idArchivo=?';
$query= $pdo->prepare($sql);
$query->execute(array($idArchivo));
$consulta = $query->fetch();
$filename=$consulta['archivo'];
header('Content-Type:'.$consulta['mime']);
header("Content-Disposition: attachment; filename=$filename");
header("Content-Description: PHP Generated Data");
header("Content-transfer-encoding: binary");

echo $consulta['datos'];