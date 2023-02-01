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
  $Matricula=$consulta['Matricula'];
  $Gen=$consulta['Generación'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio alumnado</title>
<link rel="stylesheet" href="css/Pagina_Principal_Integrante.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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
    <td><?php  echo $Matricula; ?> </th>
  </tr>

  <tr>
    <th>Correo</th>
    <td> <?php  echo $Correo; ?> </th>
  </tr>

<tr>
    <th>Generación</th>
    <td> <?php  echo $Gen; ?> </th>
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
	    <li><a href="Asignacion_integrante.php">Asignación</a></li>

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
