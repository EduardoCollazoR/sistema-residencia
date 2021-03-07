<?php
require_once '../../includes/sesion.php';
require_once '../../../includes/conexion.php';
  

if (!empty($_POST)) {
    if (empty($_POST['nombre'])  ) {
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    } else {
        $idanteproyecto = $_POST['idanteproyecto'];
        $nombre = $_POST['nombre'];
        $ncontrol = $_POST['ncontrol'];
        $periodo = $_POST['listPeriodo'];
        $tipopro = $_POST['listTipo'];
        $estado=$_POST['listEstado'];

        $sql = 'SELECT * FROM anteproyectos';
        $query = $pdo->prepare($sql);
        $query->execute(array($idanteproyecto));
        $result = $query->fetch(PDO::FETCH_ASSOC);

       
            if ($idanteproyecto == 0) {
                $sqlInsert = 'INSERT INTO anteproyectos(nombre,ncontrol,periodo_id,estatus,fecha,tipo) VALUES(?,?,?,?,CURRENT_TIMESTAMP,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre, $ncontrol, $periodo, $estado, $tipopro));
                $accion = 1;
                


            } 
            
        


            if ($request > 0) {
                if ($accion == 1) {
                    $respuesta = array('status' => true, 'msg' => 'Anteproyecto dado de alta');
                } else {
                    $respuesta = array('status' => true, 'msg' => 'Anteproyecto actualizado correctamente');
                }
            } 
        }
    
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }