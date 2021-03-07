<?php

require_once '../includes/conexion.php';

$id=isset($_GET['id'])? $_GET['id'] : "";
$sql= 'SELECT * FROM profesores_cartasTerminacion WHERE id=?';
$query= $pdo->prepare($sql);
$query->execute(array($id));
$consulta = $query->fetch();
$filename=$consulta['archivo'];
header('Content-Type:'.$consulta['mime']);
header("Content-Disposition: attachment; filename=$filename");
header("Content-Description: PHP Generated Data");
header("Content-transfer-encoding: binary");

echo $consulta['datos'];