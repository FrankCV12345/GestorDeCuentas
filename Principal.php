<!doctype html>
<?php
session_start();
include 'conexion.php';
 $ID=$_SESSION['ID'];
 ?>
 <html>
<head>
 <meta  charset="utf-8">
  <title>Principal</title>
  <script type="text/javascript" src="CuentasJavascript.js"></script>
<link rel="stylesheet" type="text/css" href="EstiloCuentaspandero.css">
<link href="https://fonts.googleapis.com/css?family=Glegoo" rel="stylesheet">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>
<body>
    <div id="EnvolturaContenido">
        <div class="envoltcontroles">
         <div class="controles">
             <div id="BtnIngrPa" class="BtnCont" onclick="Abrir('frmMant')" onmousedown="CambiaFondo('0')" onmouseup="ReiniciaFondo('0')">+</div>
             <div id="BtnModPag" class="BtnCont" onclick="Abrir('FrmModfi')" onmousedown="CambiaFondo('1')" onmouseup="ReiniciaFondo('1')">M</div>
         </div>
          </div>
           <div id="Contenido">
  <form action="cerrar.php" id="FrmCS">
 <h3> <?php echo "Hola :".$_SESSION['NomUsu'];?> </h3>
  <input type="submit"  value="CERRAR SESSION" id="CerrarSesion"> 
  </form>
   <div id="envolfrm" class="envolfrm">
              <form id="frmMant" class="frmMant" action="registrar.php"  method="post">
                  <h3 style="color:white;">INGRESE EL  NUEVO REGISTRO</h3>
                  <input type="text" class="Inpt" name="IDCuenta"  placeholder="ID cuenta" required ><br>
                  <input type="number" class="Inpt" name="txtpago" placeholder="ingrese el pago realizado" step="any" required><br>
                  <input type="text" class="Inpt" name="txtfecha" id="fecha"  placeholder="ingrese fecha" onfocus="Fech()" required ><br>
                  <input type="number" class="Inpt" name="txtgasto" placeholder="ingrese gasto" step="any" required><br>
                  <input type="submit" value="ENVIAR" class="BtnAc" name="enviando" style="color:white; border:solid 2px white;"> 
                  <input type="button" value="CERRAR" class="BtnAc" onclick="Cerrar('frmMant')" style="color:white; border:solid 2px white;"><br>
              </form>
              <form id="FrmModfi" class="frmMant" action="modificar.php"  method="post">
                 <h3 style="color:white;"> MODIFICAR REGISTROS</h3>
                  <input type="text" class="Inpt" name="IDCuenta"  placeholder="ID cuenta" required ><br>
                  <input type="text" class="Inpt" name="Fecha"  placeholder="Fecha" required ><br>
                  <input type="number" class="Inpt" name="Modgasto"  placeholder="ingrese el gasto a modificar " step="any"  required  ><br>
                  <input type="number" class="Inpt" name="ModPago"  placeholder="ingrese el pago a modificar " step="any"  required  ><br>
                  <input type="submit" value="ENVIAR" class="BtnAc" name="enviando" style="color:white; border:solid 2px white;"> 
                  <input type="button" value="CERRAR" class="BtnAc" onclick="Cerrar('FrmModfi')" style="color:white; border:solid 2px white;"><br>
              </form>
          </div>
<div class="Cuentas">
 <?php
 $Consulta2="SELECT idcliente,nomcli FROM clientereci where idusupres='$ID';";
 $EjeConsulta2=mysqli_query($conexion,$Consulta2);
               
          while($cliente=mysqli_fetch_array($EjeConsulta2)){?>
          <h5><?php 
          $IdCli=$cliente['idcliente'];
          $NomCli=$cliente['nomcli']; 
              echo "ID Cliente ".$IdCli." | "."Nombre de cliente : ".$NomCli;
              ?>
          </h5>
          <table class="Registros">
          <tr>
              <th>Fecha</th>
              <th>Pago del dia</th>
              <th>Gasto</th>
              <th>ID Cuenta</th>
          </tr>
          <?php 
               $Consulta1="SELECT * FROM cuentas WHERE idusupres='$ID' and idcliente='$IdCli';";
               $EjeConsulta1=mysqli_query($conexion,$Consulta1);
          if (!$EjeConsulta1) {
            echo "<script> alert('algo salio mal');</script>";
            exit();
          }
              $TotalPagos=0;
              $TotalGatos=0;
              while ($registro = mysqli_fetch_array($EjeConsulta1))
                  {?>
          <tr>
          <td><?php echo $registro['Fecha'];?> </td>
          <td><?php echo $registro['PagoDia'];?></td>
          <td><?php echo $registro['gasto'];?></td>
          <td><?php echo $registro['idcuenta'];?></td>
          </tr>
          <?php 
                 $TotalPagos=$TotalPagos+$registro['PagoDia'];
                 $TotalGatos=$TotalGatos+$registro['gasto'];
                 $modpago = $registro['mod_pago'];
                 $montoprestado = $registro['MontoPres'];
                  } ?>
          </table>
          <?php 
          echo  "Total de pagos: ".$TotalPagos." | Monto prestado ".$montoprestado." | Modo de Pago :".$modpago." | Total gasto: ".$TotalGatos;
          $diferencia = $montoprestado - $TotalPagos;
          echo " <br>Diferencia :".$diferencia; 
          ?>
 <?php }?>
          </div> 
           </div>
    </div>
</body>
</html>
