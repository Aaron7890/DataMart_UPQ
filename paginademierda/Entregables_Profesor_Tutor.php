<?php
session_start();

if(($_SESSION['Correo1'])!=""){
$Usuario=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Usuario'");



while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
}




/////////////////////////////////////Cargar informacion en los ComboBox///////////////////////////////////
$Datos="";
$resultado3=mysqli_query($Conexion,"SELECT Grupo FROM Contenido");
$resultado_materias=mysqli_query($Conexion,"SELECT * FROM carga_profesor WHERE Nombre='$Nombre'");



///Cargar las materias,grupos y profesores en las opciones
if (isset($_POST['Cargar'])) {
if (strlen($_POST['Materias'])>=1 && strlen($_POST['Entregable'])>=1 ){
$Materia_profesor=trim($_POST['Materias']);
$Entregable_profesor=trim($_POST['Entregable']);

//////////////////TRAER LOS DATOS DE LA MATERIA QUE EL PROFES SELECCIONO PARA COMPARARLAR CON LA DEL ALUMNO
$resultado_materia=mysqli_query($Conexion,"SELECT * FROM carga_profesor WHERE  ID='$Materia_profesor'");
while($consulta=mysqli_fetch_array($resultado_materia)){
  $Nombre_maestro=$consulta['Nombre'];
  $Nombre_materia=$consulta['Materia'];
  $Grupo_materia=$consulta['Grupo'];

}

///////////TRAER LOS ALUMNOS CON LAS MISMA CARACTERISTICAS QUE EL PROFE PIDO/////////////////////
$resultado_materia_alumno="SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Entregable='$Entregable_profesor' and Estatus='' ";

 $resultado_alumno_calificado="SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Entregable='$Entregable_profesor'and Estatus='Calificada' ";

$resultado_materia_evaluar=mysqli_query($Conexion,"SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Entregable='$Entregable_profesor' and Estatus=' '");

$resultado_descargar=mysqli_query($Conexion,"SELECT * FROM entregables
 WHERE Profesor='$Nombre_maestro' and Materia='$Nombre_materia' and Grupo='$Grupo_materia' and Entregable='$Entregable_profesor' and Estatus=' '");

} ///Corchete para verificar if de campos

else{

 echo '<script>';
          echo 'alert("Seleccione todos los campos");';
          echo 'window.location.href="Entregables_Profesor_Tutor.php";';
echo '</script>';
}

}   ///Verificar si se presiono el boton


////////////////DESCARGAR LOS ENTREGABLES DEL ALUMNO//////////////////////////////////////////////////
if (isset($_POST['Descargar_archivo'])) {
if (strlen($_POST['Entregable_descargar'])>=1){
$ID_entregable=trim($_POST['Entregable_descargar']);

$resultado_ruta=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID_entregable'");
while($consulta=mysqli_fetch_array($resultado_ruta)){
  $ruta_entregable=$consulta['Ruta'];
  $Nombre_entregable=$consulta['Nombre_archivo'];

 $file=file($ruta_entregable);
 $file2=implode("",$file);
 header("Content-Type:application/octet-stream");
 header("Content-Disposition:attachment;filename=$Nombre_entregable");
 echo $file2;


}///LLAVE DEL WHILE QUE ME OBTIENE LA RUTA DEL ENTREGABLE ///////
}///LLAVE DE IF QUE VERIFICA LOS CAMPOS////
else{

 echo '<script>';
          echo 'alert("Seleccione una opcion");';
          echo 'window.location.href="Entregables_Profesor_Tutor.php";';
echo '</script>';
}



} ////LLAVE DE IF QUE VERIFICA SI SE PRESIONO EL BOTON






/////////////////////EVALUAR LOS ENTREGABLES DEL ALUMNO//////////////////////////////////////////////////

if (isset($_POST['calificar_entregable'])) {
if (strlen($_POST['cuadro_cal'])>=1 && strlen($_POST['Entregable_calificar'])>=1){
$ID_entregable_calificar=trim($_POST['Entregable_calificar']);
$Calificacion_entregable=trim($_POST['cuadro_cal']);


$agregar_calificacion=mysqli_query($Conexion,"UPDATE entregables
SET Calificacion='$Calificacion_entregable' , Estatus='Calificada'
WHERE ID='$ID_entregable_calificar'");

$resultado_entregable=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID_entregable_calificar'");
while($consulta=mysqli_fetch_array($resultado_entregable)){
  $tipo_entregable=$consulta['Entregable'];

}


$resultado_carga=mysqli_query($Conexion,"SELECT * FROM entregables WHERE  ID='$ID_entregable_calificar'");
while($consulta=mysqli_fetch_array($resultado_carga)){
  $nombre_alumno=$consulta['Nombre'];
  $matricula_alumno=$consulta['Matricula'];
  $matricula_alumno_lider=$consulta['Matriculalider'];
  $materia_alumno=$consulta['Materia'];
  $nombre_profesor=$consulta['Profesor'];
  $grupo_alumno=$consulta['Grupo'];
}



if ($tipo_entregable=="Entregable1") {
$agregar_calificacion_carga=mysqli_query($Conexion,"UPDATE carga
SET Cal1='$Calificacion_entregable'
WHERE Matricula='$matricula_alumno' and Matriculalider='$matricula_alumno_lider' and Materia='$materia_alumno' and Profesor='$nombre_profesor' and Grupo='$grupo_alumno'");
}


if ($tipo_entregable=="Entregable2") {
$agregar_calificacion_carga=mysqli_query($Conexion,"UPDATE carga
SET Cal2='$Calificacion_entregable'
WHERE Nombre='$nombre_alumno' and Matricula='$matricula_alumno' and Matriculalider='$matricula_alumno_lider' and Materia='$materia_alumno' and Profesor='$nombre_profesor' and Grupo='$grupo_alumno'");
}


if ($tipo_entregable=="Reporte") {
$agregar_calificacion_carga=mysqli_query($Conexion,"UPDATE carga
SET Cal3='$Calificacion_entregable'
WHERE  Matricula='$matricula_alumno' and Matriculalider='$matricula_alumno_lider' and Materia='$materia_alumno' and Profesor='$nombre_profesor' and Grupo='$grupo_alumno'");
}


if($agregar_calificacion){
          echo '<script>';
          echo 'alert("La calificacion se ha agregado");';
          echo 'window.location.href="Entregables_Profesor_Tutor.php";';
          echo '</script>';
          }



}///LLAVE DE IF QUE VERIFICA LOS CAMPOS////
else{

 echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Entregables_Profesor_Tutor.php";';
echo '</script>';
}

} ////LLAVE DE IF QUE VERIFICA SI SE PRESIONO EL BOTON
















//////////////////////////Cargar los datos de proyecto segun su grupo/////////////////////////////////////















?>




















































<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio Docente</title>
<link rel="stylesheet" href="css/Entregables_Profesor_Tutor.css">
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
	<li><a href="Pagina_Principal_Profesor_Tutor.php">Pagina Principal</a></li>
  <li><a href="Asignacion_Profesor_Tutor.php">Asignación</a></li>
  <li><a href="Proyecto_Integrador_Profesor.php">Proyecto Integrador</a></li>
  <li><a href="Entregables_Profesor_Tutor.php">Entregables</a></li>
  <li><a href="Registrar_lider.php">Registrar lider</a></li>

	</ul>
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

































<p style="color:black;text-align:center; font-family:Calibri;">ENTREGABLES</p>
<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">


<form  action="Entregables_Profesor_Tutor.php" method="post">
<table class="Tabla">
<tr>

   <th style="text-align: center;">Materia</th>
   <th style="text-align: center;">Entregable</th>            <!--Codigo de los titulos de columnas-->
</tr>


<tr>  <!--Codigo de cada uno de las filas-->



 <td style="text-align: center;">
          <select class="Botones" name="Materias">
          <option value="" selected>Seleccionar</option>
          <?php
          while ($datos=mysqli_fetch_array($resultado_materias)) {
          ?>

          <option value="<?php echo $datos['ID']; ?>"> <?php echo $datos['Materia'],"-",$datos['Grupo']; ?></option>

          <?php
          }
          ?>
          </select>
    </td>



 <td style="text-align: center;">
          <select class="Botones" name="Entregable">
          <option value="" selected>Seleccionar</option>
          <option value="Entregable1" >Entregable 1</option>
          <option value="Entregable2" >Entregable 2</option>
          <option value="Reporte" >Entregable final</option>


          </select>
    </td>

 </tr>
</table>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Cargar" value="Cargar"  >
</form>
</div>
</div>






























<div class="Cuadro_Entregables">
<div class="Cuadro_Entregables2" style="overflow:scroll" >
<label style="font-family: calibri;font-size: 13px;"> <strong>Alumnos no calificados</strong></label>
<form  method="post" action="Entregables_Profesor_Tutor.php" >

<table class="Tabla">
<tr>
    <th style="text-align: center;">Nombre</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Matricula</th>
    <th style="text-align: center;">Materia</th>
    <th style="text-align: center;">Fecha de entrega</th>
  </tr>


<?php
if (isset($_POST['Cargar'])) {
$resultado_datos=mysqli_query($Conexion,$resultado_materia_alumno);
while ($row=mysqli_fetch_assoc($resultado_datos)) { ?>
<tr>
<td style="text-align: center;"> <?php echo $row["Nombre"];?> </td>
<td style="text-align: center;"> <?php echo $row["Matricula"];?></td>
<td style="text-align: center;"> <?php echo $row["Materia"];?> </td>
<td style="text-align: center;"> <?php echo $row["Fecha_Hora"];?> </td>

</tr>
<?php }} ?>

</table>




<br></br>

</form>
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Descargar" onclick="abrir_descarga();" value="Descargar"  >
<input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Evaluar" onclick="abrir_evaluar();" value="Evaluar"  >

</div>
</div>













<!-------------------CODIGO PARA LA VENTANA DE DESCARGAR ARCHIVO -------------------------------->

<div class="ventana_datos" id="archivos" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_descarga()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Descargar archivo</h5>

    <form  method="post" action="Entregables_Profesor_Tutor.php" enctype="multipart/form-data">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Archivo </strong></label>
   <select class="Botones" name="Entregable_descargar">
          <option value="" disabled selected>Seleccionar</option>
          <?php
          while ($datos=mysqli_fetch_array($resultado_descargar)) {
          ?>

          <option value="<?php echo $datos['ID']; ?>">
           <?php echo $datos['Nombre'],"-",$datos['Materia']; ?></option>

          <?php
          }
          ?>
    </select>
    <br>  </br>



  <input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" name="Descargar_archivo"  value="Descargar"  >
    </form>
</div>

<script>
  function abrir_descarga(){
    document.getElementById("archivos").style.display="block";
  }

  function cerrar_descarga(){
    document.getElementById("archivos").style.display="none";
}

function validarExt(){
  var archivoInput=document.getElementById('Archivo22');
  var archivoRuta=archivoInput.value;
  var extPermitidas=/(.pdf)$/i;
  if (!extPermitidas.exec(archivoRuta)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput.value='';
    return false;
  }
}



</script>



























<!-------------------CODIGO PARA LA VENTANA DE EVALUAR EL ENTREGABLE ARCHIVO -------------------------------->




<div class="ventana_datos2" id="vent2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_evaluar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Agregar calificación</h5>

    <form  method="post" action="Entregables_Profesor_Tutor.php">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Alumno</strong></label>
    <select class="Botones" name="Entregable_calificar">
          <option value="" selected>Seleccionar</option>
          <?php
          while ($datos2=mysqli_fetch_array($resultado_materia_evaluar)) {
          ?>

          <option value="<?php echo $datos2['ID']; ?>"> <?php echo $datos2['Nombre'],"-",$datos2['Entregable']; ?></option>

          <?php
          }
          ?>
          </select>
    <br>
    <h5 style="font-family: calibri;">Calificación</h5>
     <label style="font-family: calibri;font-size: 13px;"> <strong>Evaluar en escala de 1 a 10(ej. 9,9.5)</strong></label>
     <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Cal.</strong></label>
    <input maxlength="3" style="width:10%; font-family: calibri" class="agregar_datos" type="text" name="cuadro_cal" value="" >


    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="calificar_entregable" value="Calificar">
    </form>
</div>
<script>
  function abrir_evaluar(){
    document.getElementById("vent2").style.display="block";
  }

  function cerrar_evaluar(){
    document.getElementById("vent2").style.display="none";
  }
</script>














<div class="Cuadro_EntregablesC">
<div class="Cuadro_EntregablesC2" style="overflow:scroll">
<label style="font-family: calibri;font-size: 13px;"> <strong>Alumnos calificados</strong></label>
<table class="Tabla">
<tr>
    <th style="text-align: center;">Nombre</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Matricula</th>
    <th style="text-align: center;">Materia</th>
    <th style="text-align: center;">Fecha de entrega</th>
    <th style="text-align: center;">Calificación</th>
  </tr>


<?php
if (isset($_POST['Cargar'])) {
$resultado_datos=mysqli_query($Conexion,$resultado_alumno_calificado);
while ($row=mysqli_fetch_assoc($resultado_datos)) { ?>
<tr>
<td style="text-align: center;"> <?php echo $row["Nombre"];?> </td>
<td style="text-align: center;"> <?php echo $row["Matricula"];?></td>
<td style="text-align: center;"> <?php echo $row["Materia"];?> </td>
<td style="text-align: center;"> <?php echo $row["Fecha_Hora"];?> </td>
<td style="text-align: center;"> <?php echo $row["Calificacion"];?> </td>

</tr>
<?php }} ?>

</table>


</div>
</div>















































































































</div>
</div> <!---div de cuadro de entregables sin calificar ----------------------->





























































</body>
</html>
<?php
}
else{
	header("location:Inicio.html");
}
?>
