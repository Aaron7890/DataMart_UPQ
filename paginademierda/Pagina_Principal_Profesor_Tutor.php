<?php
session_start();

if(($_SESSION['Correo1'])!=""){
$Usuario=$_SESSION['Correo1'];
//$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","bdpintegrador");

$Conexion=mysqli_connect("localhost","root","","bdpintegrador");


$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Usuario'");


while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];


}




?>
<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio alumnado</title>
<link rel="stylesheet" href="css/Pagina_Principal_Profesor_Tutor.css">
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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL PROFESOR-Tutor </P>
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
    <th>Tipo de usuario</th>
    <td> Tutor </th>
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
		<li><a href="Pagina_Principal_Profesor_Tutor.php">Página Principal</a></li>
		<li><a href="Asignacion_Profesor_Tutor.php">Asignación</a></li>
		<li><a href="Proyecto_Integrador_Profesor.php">Proyecto Integrador</a></li>
	    <li><a href="Entregables_Profesor_Tutor.php">Entregables</a></li>
        <li><a href="Registrar_lider.php">Registrar líder</a></li>
		<li><a href="proyectos_tutor.php" target="_blank">Reporte proyectos</a></li>
	</ul>
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES <div class="slider">
<ul>
	<li><img src="Imagenes/Banner.png"></li>
	<li><img src="Imagenes/Banner2.png"></li>
	<li><img src="Imagenes/Banner.png"></li>
	<li><img src="Imagenes/Banner.png"></li>
</ul>
</div>-->

<p style="color:black;text-align:center; font-family:Calibri;"></p>

<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">
<img src="Imagenes/Banner.png" height="99.9%" width="99.9%">


</div>
</div>
</div>



</div>
</body>
</html>

<?php
}
else{
	header("location:Inicio.html");
}
?>
