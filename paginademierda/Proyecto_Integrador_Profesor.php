<?php
session_start();

if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Correo'");



while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
}




/////////////////////////////////////Cargar informacion en los ComboBox///////////////////////////////////
$Datos="";

$resultado3=mysqli_query($Conexion,"SELECT * FROM Contenido");


///Cargar las materias,grupos y profesores en las opciones
if (isset($_POST['Cargar'])) {
if (strlen($_POST['Grupo1'])>=1){
$Grupo1=trim($_POST['Grupo1']);

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
if ($Grupo1) {

  $Datos2="SELECT * FROM tacceso_lider WHERE Grupo='$Grupo1'and Estatus='No validado' and Tutor='$Nombre'";
  ///////CARGAR INFORMACION DE LOS PROYECTOS EN LA VENTANA DE VALIDAR///////////////
  $resultado4=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE Grupo='$Grupo1'");
}

} ///Corchete para verificar if de campos

else{

 echo '<script>';
          echo 'alert("Seleccione un grupo");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>';
}

}   ///Verificar si se presiono el boton


////////////////VALIDAR LOS PROYECTO QUE AUN NO SE HAN VALIDADO//////////////////////////

if (isset($_POST['ValidadP'])) {
if (strlen($_POST['Validar_P'])>=1){
$ValidarP=trim($_POST['Validar_P']);
 $Estatus_validar=mysqli_query($Conexion,"UPDATE tacceso_lider SET
Estatus='Validado' WHERE Matricula='$ValidarP'");

if ($Estatus_validar) {
echo '<script>';
          echo 'alert("Validacion exitosa");';
          echo 'window.location.href="Proyecto_Integrador_Profesor.php";';
echo '</script>';
}
}
}

























//////////////////////////Cargar los datos de proyecto segun su grupo/////////////////////////////////////















?>




















































<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio Docente</title>
<link rel="stylesheet" href="css/Proyecto_Integrador_Profesor.css">

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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL PROFESOR-Tutor</P>
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
    <td>Tutor </th>
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
		<li><a href="Pagina_Principal_Profesor_Tutor.php">Pagina Principal</a></li>
    <li><a href="Asignacion_Profesor_Tutor.php">Asignación</a></li>
    <li><a href="Proyecto_Integrador_Profesor.php">Proyecto Integrador</a></li>
    <li><a href="Entregables_Profesor_Tutor.php">Entregables</a></li>
    <li><a href="Registrar_lider.php">Registrar lider</a></li>

	</ul>
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

































<p style="color:black;text-align:center; font-family:Calibri;">PROYECTO INTEGRADOR</p>
<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">


<form  action="Proyecto_Integrador_Profesor.php" method="post">
<table class="Tabla">
  <h6 style="font-family: calibri;">*Seleccionar el grupo tutorado</h6>
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
<div class="Cuadro_Materias2 " style="overflow:scroll; ">
<h5 style="font-family: calibri;">Información de proyectos</h5>
<h6 style="font-family: calibri;">*Solo se muestran los proyecto que aun no estan validados</h6>
<form method="post" action="Proyecto_Integrador_Profesor.php">
<table class="Tabla">
<tr>
    <th style="text-align: center;">Lider</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Nombre del proyecto</th>
    <th style="text-align: center;">Objetivo</th>
    <th style="text-align: center;">Objetivo cuatrimestral</th>
    <th style="text-align: center;">Tipo de industria</th>
  </tr>


<?php
if (isset($_POST['Cargar'])) {
$resultado2=mysqli_query($Conexion,$Datos2);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr>
<td> <?php echo $row["Nombre"];?></td>
<td> <?php echo $row["Nombre_Proyecto"];?> </td>
<td> <?php echo $row["Objetivo"];?> </td>
<td> <?php echo $row["Objetivo_cuatrimestral"];?> </td>
<td> <?php echo $row["Tipo_industria"];?> </td>

</tr>
<?php }}

 ?>


</table>

</form>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Finalizar" onclick="abrir()" value="Validar">




</div>
</div>

































































































</div>
</div>













<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Validar proyecto</h5>

    <form  method="post" action="Proyecto_Integrador_Profesor.php">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Nombre de proyecto</strong></label>
    <select class="Botones" name="Validar_P">
          <option value="" selected>Seleccionar</option>
          <?php
          while ($Datos=mysqli_fetch_array($resultado4)) {
          ?>

          <option value="<?php echo $Datos['Matricula']; ?>"> <?php echo $Datos['Nombre_Proyecto'],"-", $Datos['Nombre'];  ?></option>

          <?php
          }
          ?>
          </select>
    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="ValidadP" value="Validar">
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
