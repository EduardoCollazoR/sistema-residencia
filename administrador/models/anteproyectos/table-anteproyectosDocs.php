<?php
 require '../../../includes/conexion.php';

$idAnteproyecto=$_GET['idAnteproyecto'];
$sql= 'SELECT idDocumento,archivo,mime, comentarios,fecha FROM anteproyectos_doc WHERE idAnteproyecto=?';
$query= $pdo->prepare($sql);
$query->execute(array($idAnteproyecto));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0; $i < count($consulta); $i++){



$consulta[$i]['acciones']= '
<button class="btni btn-light " title="Descargar archivo"><i><a target="_blank" href="doc_anteproyectos.php?idDocumento='.$consulta[$i]['idDocumento'].'" class="fas fa-file-download"></a></i></button>
<button class="btni btn-info" title="Agregar comentario" onclick="agregarComentarios('.$consulta[$i]['idDocumento'].')"><i class="fas fa-pen"></i></button>
<button class="btni  btn-danger" title="Eliminar" onclick="deleteAnteproyectoDoc('.$consulta[$i]['idDocumento'].')"><i class="fas fa-trash-alt"></i></button>';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);
die();
