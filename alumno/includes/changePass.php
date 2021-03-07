<?php
require_once 'sesion.php';
require_once '../../includes/conexion.php';

if($_POST['action']=='changePassword'){
if(!empty($_POST['passNuevo'])){
$newPass=$_POST['passNuevo'];
$idalumno=$_SESSION['alumno_id'];


$code='';
$msg='';
$arrData=array();
$newPass=password_hash($newPass,PASSWORD_DEFAULT);
$query_user=mysqli_query($conexion,"SELECT * FROM alumno WHERE alumno_id = $idalumno");
$result= mysqli_num_rows($query_user);
if($result){
    $query_update=mysqli_query($conexion,"UPDATE alumno SET clave='$newPass' WHERE alumno_id= $idalumno");
    mysqli_close($conexion);

    if($query_update){
        $code='00';
        $msg="La contraseña se ha actualizado con exito";
    }else{
        $code='2';
        $msg="No es posible cambiar su contraseña";
    }
}else{
    $code='1';
    $msg="No es posible cambiar su contraseña";
}
$arrData=array('cod'=>$code,'msg'=>$msg);
echo json_encode($arrData,JSON_UNESCAPED_UNICODE);


}else{
    echo "error";
}
exit;
}

?>