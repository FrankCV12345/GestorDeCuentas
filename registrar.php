<?php
include 'conexion.php';
$idcuenta =$_POST["IDCuenta"];
$fecha =$_POST["txtfecha"];
$pagod =$_POST["txtpago"];
$gasto =$_POST["txtgasto"];

$Consulta = "select * from cuentas where idcuenta='$idcuenta'";
$ejecutaConsulta = mysqli_query($conexion,$Consulta);
if(mysqli_num_rows($ejecutaConsulta)<=0) {
echo "<script> alert('El ID de cliente no existe ');window.history.go(-1);</script>";
} else {
$Registros = mysqli_fetch_array($ejecutaConsulta);

$UsuariosPres = $Registros['IdUsuPres'];
$MontPres = $Registros['MontoPres'];
$Cliente = $Registros['Idcliente'];
$ModalidaPago = $Registros['mod_pago'];
 
$insertar = "INSERT INTO cuentas(idcliente,idusupres,montopres,pagodia,fecha,gasto,idcuenta,mod_pago) VALUES('$Cliente','$UsuariosPres','$MontPres','$pagod','$fecha','$gasto','$idcuenta','$ModalidaPago');";
$EjecutaConsul = mysqli_query($conexion,$insertar);
if(!$EjecutaConsul) {
    echo "erro al registrar en la BD";
}
else {
    echo "<script> alert('Registro ingresado correctamente ');window.history.go(-1);</script>";
}
mysqli_close($conexion);
}
?>
