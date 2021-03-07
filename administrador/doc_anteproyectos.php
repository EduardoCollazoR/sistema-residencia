<?php

require_once '../includes/conexion.php';

$idDocumento=isset($_GET['idDocumento'])? $_GET['idDocumento'] : "";
$sql= 'SELECT * FROM anteproyectos_doc WHERE idDocumento=?';
$query= $pdo->prepare($sql);
$query->execute(array($idDocumento));
$consulta = $query->fetch();
$filename=$consulta['archivo'];
header('Content-Type:'.$consulta['mime']);
header("Content-Disposition: attachment; filename=$filename");
header("Content-Description: PHP Generated Data");
header("Content-transfer-encoding: binary");

echo $consulta['data'];