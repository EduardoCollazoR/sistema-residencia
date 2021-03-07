<?php
require_once '../../../includes/conexion.php';
$sql="SELECT idAnteproyecto, nombre FROM anteproyectos WHERE estatus=2";
$query =$pdo->prepare($sql);
$query->execute();

$data=$query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data,JSON_UNESCAPED_UNICODE);