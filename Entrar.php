<?php
include 'conexion.php';
$usuario=$_POST['Txtusuario'];
$contrasenia=$_POST['PwdContra'];
if(empty($usuario) || empty($contrasenia)){
    echo"<script>alert('Contraseña o usuaior estan vacios'); window.histor.go(-1);</script>";
    exit();    
}
$BuscaUsuario= mysqli_query($conexion,"SELECT * FROM usuario_pres WHERE nomusu='$usuario';");

if($row=mysqli_fetch_array($BuscaUsuario)){
    
    if($row['Password']==$contrasenia){
        session_start();
        $_SESSION['NomUsu']=' '.$row['NombreYApellidos'];
        $_SESSION['ID']=$row['IdUsuPres'];
        header("location:Principal.php");
    }
    else{
        echo"Contraseña incorrecta";
    }
}
else {
    echo"<script>alert('el usuario no existe 1');window.history.go(-1);</script>";
    exit();
}


?>
