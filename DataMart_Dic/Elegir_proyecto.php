<?php
session_start();

if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Correo='$Correo'");



while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula2=$consulta['Matricula'];
  $Gen=$consulta['Generación'];

}





/////////////////////////////////////Cargar informacion en los ComboBox///////////////////////////////////
$Datos="";
$resultado3=mysqli_query($Conexion,"SELECT Grupo FROM Contenido");

///Cargar las materias,grupos y profesores en las opciones
if (isset($_POST['Cargar'])) {
if (strlen($_POST['Grupo1'])>=1){
$Grupo1=trim($_POST['Grupo1']);
$resultado6=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE Grupo='$Grupo1'");

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
if ($Grupo1) {
	$Datos="SELECT * FROM tacceso_lider WHERE Grupo='$Grupo1'";
}

} ///Corchete para verificar if de campos

else{

 echo '<script>';
          echo 'alert("Seleccione un grupo");';
          echo 'window.location.href="Elegir_proyecto.php";';
echo '</script>';
}

}   ///Verificar si se presiono el boton



///////////////Agregar proyecto a integrante////

if (isset($_POST['Agregar'])) {
if (strlen($_POST['AgregarP'])>=1){
$Nombrelider=trim($_POST['AgregarP']);
$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Nombre='$Nombrelider'");
while($consulta=mysqli_fetch_array($resultado)){
  $AgregarMatricula=$consulta['Matricula'];


}


$resultado4=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Nombre='$Nombre'");
while($consulta_estatus=mysqli_fetch_array($resultado4)){
  $datos_estatus=$consulta_estatus['Estatus'];


}





if ($datos_estatus=="EP" or $datos_estatus=="A") {
echo '<script>';
echo 'alert("Usted ya ha enviado solicitud o ya se encuentra en un proyecto");';
echo 'window.location.href="Elegir_proyecto.php";';
echo '</script>';
}

else{
$resultado7=mysqli_query($Conexion,"UPDATE tacceso_integrantes SET Matriculalider='$AgregarMatricula' ,Estatus='EP' WHERE Correo='$Correo'");
if($resultado7){
echo '<script>';
echo 'alert("Solicitud enviada");';
echo 'window.location.href="Elegir_proyecto.php";';
echo '</script>';
 }
else {
echo "Ha ocurrido un error";
}

}
}

else{
echo '<script>';
echo 'alert("Seleccione un lider");';
echo 'window.location.href="Elegir_proyecto.php";';
echo '</script>';
}


}


























//////////////////////////Cargar los datos de proyecto segun su grupo/////////////////////////////////////















?>




















































<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio Docente</title>
<link rel="stylesheet" href="css/Elegir_proyecto.css">

</head>
<body>


<div class="Contenedor_Encabezado">
<div class="Imagen_upq">
<img src="Imagenes/Logo_mecatronica.png" height="80px" width="85px">
</div>
<div class="Titulo_Contendor">
<div class="Titulo_Titulo">
<P style="font-family:arial narrow;font-size:15px;">MODULO DE SEGUIMIENTO DE PROYECTO INTEGRADOR</P>
</div>
<div class="Titulo_Titulo">
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL INTEGRANTE</P>
</div>
</div>
<br>
<input onclick="location.href='Cerrar_sesion.php'" class="boton_sesion" style="float: right;" type="submit" name="Cerrar" value="Cerrar sesion">
</div>

<div class="Contenedor_Principal">
<div class="Contenedor_Principal_Datos">
	                           <!--CODIGO PARA COLOCAR FOTO DE PERFIL-->
<div class="FotoPerfil">

<div class="Foto">             <!-- TERMINA CODIGO PARA COLOCAR FOTO DE PERFIL-->
	<img src="Imagenes/Yo.jpg" height="100px" width="100px">
</div>
</div>
                                   <!--CODIGO PARA COLOCAR TABLA DE DATOS-->
<div class="DatosAlumno">

<table class="Tabla">
 <tr>
    <th>Nombre</th>
    <td><?php  echo $Nombre;?></th>
  </tr>

  <tr>
    <th>Grupo</th>
    <td><?php  echo $Grupo; ?></th>
  </tr>

  <tr>
    <th>Matricula</th>
    <td><?php  echo $Matricula2; ?></th>
  </tr>

  <tr>
    <th>Correo</th>
    <td><?php  echo $Correo; ?></th>
  </tr>

  <tr>
    <th>Generación</th>
    <td><?php  echo $Gen; ?></th>
  </tr>


</table>

</div>
</div>	                  <!-- TERMINA CODIGO PARA COLOCAR TABLA DE DATOS-->


                              <!--CODIGO PARA COLOCAR LA OPCIONES-->
<div class="Contenedor_Encabezado2">
<div class="Contenedor_Secciones">
<div class="Contenedor_Secentrar">
	<div id="header">
	<ul class="nav">
		<li><a href="Pagina_Principal_Integrante.php ?>">Pagina principal</a></li>
		<li><a href="Proyecto_Integrador_Integrante.php">Proyecto Integrador</a></li>
	 <li><a href="Asignacion_integrante.php">Asignacion</a></li>
   <li><a href="Elegir_proyecto.php">Agregar proyecto</a></li>

	</ul>
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

































<p style="color:black;text-align:center; font-family:Calibri;">PROYECTO INTEGRADOR</p>
<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">


<form  action="Elegir_proyecto.php" method="post">
<table class="Tabla">
<tr>
   <th style="text-align: center;">Grupo</th>          <!--Codigo de los titulos de columnas-->
</tr>


<tr>  <!--Codigo de cada uno de las filas-->

   <td style="text-align: center;">
          <select class="Botones" name="Grupo1">
          <option value="" selected>Seleccionar</option>
          <?php
          while ($datos=mysqli_fetch_array($resultado3)) {
          ?>

          <option value="<?php echo $datos['Grupo']; ?>"> <?php echo $datos['Grupo']; ?></option>

          <?php
          }
          ?>
          </select>
    </td>




 </tr>
<!--
 <?php $resultado2=mysqli_query($Conexion,$materias);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<td> <?php echo $row["Materias"];?> </td>

<?php } ?>

<script language="JavaScript">
var estado;
function uncheckRadio(rbutton){
if(rbutton.checked==true && estado==true){rbutton.checked=false;}
estado=rbutton.checked;
}
</script>
-->

</table>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Cargar" value="Cargar"  >
</form>
</div>
</div>






















<div class="Cuadro_Materias">
<div class="Cuadro_Materias2" style="overflow:scroll; ">
<h5 style="font-family: calibri;">Información de proyectos</h5>
<form method="post" action="Elegir_proyecto.php">
<table class="Tabla">
<tr>
    <th style="text-align: center;">Lider</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Matricula</th>
    <th style="text-align: center;">Nombre del proyecto</th>
    <th style="text-align: center;">Objetivo</th>
  </tr>


<?php
if($Datos!=""){
$resultado2=mysqli_query($Conexion,$Datos);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr>
<td> <?php echo $row["Nombre"];?></td>
<td> <?php echo $row["Matricula"];?> </td>
<td> <?php echo $row["Nombre_Proyecto"];?> </td>
<td> <?php echo $row["Objetivo"];?> </td>


</tr>
<?php }}
 else{
 ?>

 <tr>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<?php
} ?>

</table>

</form>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Agregar" onclick="abrir()" value="Agregar">




</div>
</div>

































































































</div>
</div>













<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Agregar proyecto</h5>

    <form  method="post" action="Elegir_proyecto.php">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Proyectos</strong></label>
    <select class="Botones" name="AgregarP">
          <option value="" selected>Seleccionar</option>
          <?php
          while ($datos6=mysqli_fetch_array($resultado6)) {
          ?>

          <option value="<?php echo $datos6['Nombre']; ?>"> <?php echo $datos6['Nombre']; ?></option>

          <?php
          }
          ?>
          </select>
    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Agregar" value="Agregar">
    </form>
</div>
<script>
  function abrir(){
    document.getElementById("vent").style.display="block";
  }

  function cerrar(){
    document.getElementById("vent").style.display="none";
  }
</script>




































</body>
</html>
<?php
}
else{
	header("location:Inicio.html");
}
?>
