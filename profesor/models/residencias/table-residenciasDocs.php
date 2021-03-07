<?php
 require_once '../../../includes/conexion.php';
$idResidencia=$_GET['idResidencia'];
$sql= 'SELECT idDocumento,archivo,descripcion,comentarios,fecha FROM residencias_doc WHERE idResidencia=?';
$query= $pdo->prepare($sql);
$query->execute(array($idResidencia));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){

   

$consulta[$i]['acciones']= '
<button class="btni  btn-light" title="Abrir archivo"><i><a target="_blank" href="doc_residencia.php?idDocumento='.$consulta[$i]['idDocumento'].'" class="fas fa-file-download"></a></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();
