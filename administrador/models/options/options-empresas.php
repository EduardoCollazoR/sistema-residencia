<?php
require_once '../../../includes/conexion.php';
$sql="SELECT empresa_id,nombre_empresa FROM empresa WHERE estado=1";
$query =$pdo->prepare($sql);
$query->execute();

$data=$query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data,JSON_UNESCAPED_UNICODE);