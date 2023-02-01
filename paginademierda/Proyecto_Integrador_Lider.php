<?php
session_start();
if(($_SESSION['Correo1'])!=""){
$Correo=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Correo='$Correo'");



while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula=$consulta['Matricula'];
  $Gen=$consulta['Generación'];
  $Estatus=$consulta['Estatus'];
  $Tutor=$consulta['Tutor'];
  if ($consulta['Nombre_Proyecto']) {
  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $Objetivo_proyecto=$consulta['Objetivo'];
  $Tipo_industria=$consulta['Tipo_industria'];
  $Objetivo_cuatrimestral=$consulta['Objetivo_cuatrimestral'];

  }
 else{
 $Nombre_proyecto="Aun no se ha agregado";
 $Objetivo_proyecto="";
 $Tipo_industria="";
 $Objetivo_cuatrimestral="";

 }

}

$resultado3=mysqli_query($Conexion,"SELECT * FROM carga WHERE Matricula='$Matricula'");



?>

































<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio lider</title>

<link rel="stylesheet" href="css/Proyecto_Integrador_Lider.css">

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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL LIDER</P>
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
    <td><?php  echo $Nombre; ?> </th>
  </tr>

   <tr>
    <th>Grupo</th>
    <td> <?php  echo $Grupo; ?></th>
  </tr>

  <tr>
    <th>Matricula</th>
    <td><?php  echo $Matricula; ?></th>
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
</div>                    <!-- TERMINA CODIGO PARA COLOCAR TABLA DE DATOS-->


                              <!--CODIGO PARA COLOCAR LA OPCIONES-->
<div class="Contenedor_Encabezado2">

<div class="Contenedor_Secciones">
<div class="Contenedor_Secentrar">
  <div id="header">
  <ul class="nav">
   <li><a href="Pagina_Principal_Lider.php  ?>">Pagina principal</a></li>
   <li><a href="Proyecto_Integrador_Lider.php">Proyecto Integrador</a></li>
   <li><a href="Registrar_integrantes_Lider.php">Registrar integrantes</a></li>
   <li><a href="Asignacion_Lider.php">Asignación</a></li>
  </ul>
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

<p style="color:black;text-align:center; font-family:Calibri;">SEGUIMIENTO DE PROYECTO INTEGRADOR</p>

<div class="Cuadro_ProyectoDatos">
<div class="Cuadro_ProyectoDatos2">
<h5 style="font-family:calibri;margin: 0px;padding: 0px">Datos del proyecto</p>
<table class="Tabla">

  <tr>
    <th>Nombre del proyecto</th>
    <td> <?php echo $Nombre_proyecto; ?></th>
  </tr>

  <tr>
    <th>Objetivo</th>
    <td> <?php echo $Objetivo_proyecto;?></th>
  </tr>

<tr>
    <th>Objetivo cuatrimestral</th>
    <td> <?php echo $Objetivo_cuatrimestral;?></th>
  </tr>

  <tr>
    <th>Tipo de industria</th>
    <td> <?php echo $Tipo_industria;?></th>
  </tr>

  <tr>
    <th>Tutor</th>
    <td><?php echo $Tutor;?></th>
  </tr>

 <tr>
    <th>Estatus</th>
    <td style="color: green"> <?php echo $Estatus;?> </th>
  </tr>

  <tr>
    <th>Entregable 1</th>
    <td style="color: green"> <a href="javascript:abrir_archivos2()"> <img src="Imagenes/archivo.png"> </th>
  </tr>

</table>
<ul class="nav">
<li><a  href="javascript:abrir()">Agregar datos</a></li>
</ul>
</div>
</div>

<div class="Cuadro_ProyectoEntregasP">
<div class="Cuadro_ProyectoEntregasP2" style="overflow:scroll; ">
<h5 style="font-family:calibri;margin: 0px;padding: 0px;">Entregas por asignatura</p>
<table class="Tabla">
  <tr style="text-align: center;">
    <th>Materia</th>          <!--Codigo de los titulos de columnas-->
    <th>Grupo</th>
    <th>Profesor</th>
    <th>Cal 1</th>
    <th>Cal 2</th>
    <th>Cal 3</th>
    <th>Entregable 2  <a href="javascript:abrir_archivos()"> <img src="Imagenes/archivo.png"> </th>
  </tr>


<?php
$materias="SELECT* FROM carga WHERE Matricula='$Matricula'";


$resultado2=mysqli_query($Conexion,$materias);
while ($row=mysqli_fetch_assoc($resultado2)) { ?>
<tr style="text-align: center;">
<td> <?php echo $row["Materia"];?></td>
<td> <?php echo $row["Grupo"];?> </td>
<td> <?php echo $row["Profesor"];?> </td>
<td> <?php echo $row["Cal1"];?> </td>
<td> <?php echo $row["Cal2"];?> </td>
<td> <?php echo $row["Cal3"];?> </td>
</tr>
<?php }

?>


  <tr>                             <!--Codigo de cada uno de las filas-->
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

</div>
</div>






<div class="Cuadro_ProyectoFinales" >
<div class="Cuadro_ProyectoFinales2">
  <h5 style="font-family:calibri;margin: 0px;padding: 0px;">Entregas Finales</p>
<table class="Tabla">
  <tr>
    <th>Reporte</th>          <!--Codigo de los titulos de columnas-->
    <th>Poster</th>
    <th>Entregar</th>

  </tr>

  <tr>                             <!--Codigo de cada uno de las filas-->
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align: right;"> <a href="javascript:abrir_archivos3()"> <img src="Imagenes/archivo.png"> </td>

  </tr>

</table>

</div>
</div>


</div>
</div>


































<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Datos del proyecto</h5>

    <form  method="post" action="Agregar_datos.php">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Nombre del proyecto</strong></label>
    <input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="NombreP" value="" >
    <br>



    <label style="font-family: calibri;font-size: 13px;"> <strong>Objetivo del proyecto</strong></label>
    <br>
    <textarea class="agregar_datos" style="width:80%; height: 80px;font-family:calibri" name="ObjetivoP"></textarea>
    <br>

    <label style="font-family: calibri;font-size: 13px;"> <strong>Objetivo del Cuatrimestral</strong></label>
    <br>
    <textarea class="agregar_datos" style="width:80%; height: 80px;font-family:calibri" name="ObjetivoC"></textarea>
    <br>




    <label style="font-family: calibri;font-size: 13px;"> <strong>Tipo de industria</strong></label>
    <select class="Botones" name="T_industria">
          <option value="" disabled selected >Seleccionar</option>
          <option value="Alimentacia">Alimenticia</option>
          <option value="Automotriz">Automotriz</option>
          <option value="Medico">Medica</option>
          <option value="Otro">Otro</option>

          </select>
    <br>







    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Guardar_datos" value="Guardar datos">
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





















<div class="ventana_datos" id="archivos" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_archivos()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Subir archivo</h5>

    <form  method="post" action="Entregables.php" enctype="multipart/form-data">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Materia</strong></label>
   <select class="Botones" name="Materia">
          <option value="" disabled selected>Seleccionar</option>
          <?php
          while ($datos=mysqli_fetch_array($resultado3)) {
          ?>

          <option value="<?php echo $datos['Materia']; ?>"> <?php echo $datos['Materia']; ?></option>

          <?php
          }
          ?>
    </select>
    <br>


    <label style="font-family: calibri;font-size: 13px;"> <strong>Tipo</strong></label>
    <select class="Botones" name="Entregable_E2">
          <option value="Entregable2" disabled selected >Entregable 2</option>
    </select>

    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Seleccione archivo</strong></label>
    <br>

    <input  style="float:left;font-family:calibri" type="file" onchange="return validarExt2()" name="Archivo2" id="archivo2" value="Subir archivo">
    <br>

    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Subir_archivo2" value="Subir archivo">
    </form>
</div>

<script>
  function abrir_archivos(){
    document.getElementById("archivos").style.display="block";
  }

  function cerrar_archivos(){
    document.getElementById("archivos").style.display="none";
}

function validarExt2(){
  var archivoInput2=document.getElementById('archivo2');
  var archivoRuta2=archivoInput2.value;
  var extPermitidas2=/(.pdf)$/i;
  if (!extPermitidas2.exec(archivoRuta2)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput2.value='';
    return false;
  }
}



</script>






























<div class="ventana_datos" id="archivos2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_archivos2()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Subir archivo</h5>

    <form  method="post" action="Entregables.php" enctype="multipart/form-data">

    <label style="font-family: calibri;font-size: 13px;"> <strong>*En este apartado subiras el formato de datos generales del proyecto integrador. </strong></label>

    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Seleccione archivo</strong></label>
    <br>

    <input  style="float:left;font-family:calibri" type="file" onchange="return validarExt()" name="Archivo1" id="archivo" value="Subir archivo">
    <br>

    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Subir_archivo1" value="Subir archivo">
    </form>
</div>

<script>
  function abrir_archivos2(){
    document.getElementById("archivos2").style.display="block";
  }

  function cerrar_archivos2(){
    document.getElementById("archivos2").style.display="none";
}

function validarExt(){
  var archivoInput=document.getElementById('archivo');
  var archivoRuta=archivoInput.value;
  var extPermitidas=/(.pdf)$/i;
  if (!extPermitidas.exec(archivoRuta)) {
    alert('Seleccione un archivo en formato pdf');
    archivoInput.value='';
    return false;
  }
}

</script>




































<div class="ventana_datos" id="archivos3" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar_archivos3()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Subir archivo</h5>

    <form  method="post" action="Entregables.php" enctype="multipart/form-data">

    <label style="font-family: calibri;font-size: 13px;"> <strong>*En este apartado enviaran los entregables finales </strong></label>
    <br>
   <label style="font-family: calibri;font-size: 13px;"> <strong>Tipo</strong></label>

<select class="Botones" name="Entrega_final">
          <option value="" disabled selected>Seleccionar</option>
          <option value="Reporte" >Reporte</option>
          <option value="Poster" >Poster</option>


    </select>


    <br>
    <label style="font-family: calibri;font-size: 13px;"> <strong>Seleccione archivo</strong></label>
    <br>

    <input  style="float:left;font-family:calibri" type="file" onchange="return validarExt3()" name="Archivo3" id="archivo3" value="Subir archivo">
    <br>

    <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Subir_archivo3" value="Subir archivo">
    </form>
</div>

<script>
  function abrir_archivos3(){
    document.getElementById("archivos3").style.display="block";
  }

  function cerrar_archivos3(){
    document.getElementById("archivos3").style.display="none";
}

function validarExt3(){
  var archivoInput3=document.getElementById('archivo3');
  var archivoRuta3=archivoInput3.value;
  var extPermitidas3=/(.pdf|.docx)$/i;
  if (!extPermitidas3.exec(archivoRuta3)) {
    alert('Seleccione un archivo en formato pdf o word');
    archivoInput3.value='';
    return false;
  }
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
