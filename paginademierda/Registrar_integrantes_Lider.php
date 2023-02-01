<?php
session_start();
if(($_SESSION['Correo1'])!=""){
/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del alumno*/
$Correo=$_SESSION['Correo1'];

$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Correo='$Correo'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula=$consulta['Matricula'];
  $Gen=$consulta['Generación'];
  $integrantes_registrados="SELECT* FROM tacceso_integrantes WHERE
  Matriculalider='$Matricula' and Estatus='A'";
  $grupos_activos="SELECT Grupo FROM contenido where estatus=1 ";
  $integrantes_enproceso="SELECT* FROM tacceso_integrantes WHERE
  Matriculalider='$Matricula' and Estatus='EP'";
}

/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del integrante*/
$matricula2="";
$Nombre2="";
$Grupo2="";

$gen="";

if (isset($_POST['Cargar_Datos'])) {
if (strlen($_POST['Matricula2'])>=1){
$matricula2=trim($_POST['Matricula2']);
$resultado=mysqli_query($Conexion,"SELECT * FROM alumnos WHERE  Ncontrol='$matricula2'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre2=$consulta['Nombre'];
  $Grupo2=$consulta['Grupo'];
  $gen=$consulta['generacion'];

}


}
else{
  echo '<script>';
          echo 'alert("Ingrese la matricula del integrante");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';
}

}

if (isset($_POST['Registrarse_Integrante_Lider'])) {


if (strlen($_POST['Nombre'])>=1 &&
strlen($_POST['Grupo1'])>=1 &&
strlen($_POST['Contraseña'])>=1 &&
strlen($_POST['Matricula2'])>=1 &&
strlen($_POST['Matricula_lider'])>=1 &&
strlen($_POST['Generacion'])>=1){



$nombre=trim($_POST['Nombre']);
$grupo=trim($_POST['Grupo1']);
$contraseña=trim($_POST['Contraseña']);
$matricula=trim($_POST['Matricula2']);
$matricula_lider=trim($_POST['Matricula_lider']);
$genn=trim($_POST['Generacion']);


$Consulta="SELECT * FROM tacceso_integrantes WHERE
          Nombre='$nombre' and Matricula='$matricula'";
          $resultado=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado);

          if($filas>0){
echo '<script>';
          echo 'alert("!ups parece que alguien ya se ha registrado el integrante");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';
        }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
  else{
$Consulta2="INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Matriculalider,Estatus,Generación)
VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$contraseña','$matricula','$matricula_lider','A','$genn')";
 $resultado2=mysqli_query($Conexion,$Consulta2);

if($resultado2){
echo '<script>';
echo 'alert("Registro exitoso");';
 echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';
 }
else {
echo "Ha ocurrido un error";
}
  }








}
else {

echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';


}
}




////////////////////////////////CARGAR INTEGRANTES REGISTRADOS///////////////////////

$resultado6=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE
  Matriculalider='$Matricula' and Estatus='A'");

$resultado7=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE
  Matriculalider='$Matricula' and Estatus='EP'");




////////////////////////////ELIMINAR O AGREGAR INTEGRANTE EN ESPERA/////////////////////////////////////
if (isset($_POST['Agregar2'])) {
if (strlen($_POST['E_o_A_no_registrado'])>=1){
$alumnoenespera=trim($_POST['E_o_A_no_registrado']);

$agregar_en_espera=mysqli_query($Conexion,"UPDATE tacceso_integrantes
SET Estatus='A' WHERE Nombre='$alumnoenespera'");

         if($agregar_en_espera){
          echo '<script>';
          echo 'alert("Integrante agregado");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
          echo '</script>';
          }



} //llave que verifica si hay valor en combo box
else{
echo '<script>';
          echo 'alert("Seleccione un integrante");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';

}
}////llave que verifica si se presiono el boton de agregar integrante en espera



if (isset($_POST['Eliminar2'])) {
if (strlen($_POST['E_o_A_no_registrado'])>=1){
$eliminar_en_espera=trim($_POST['E_o_A_no_registrado']);

$agregar_en_espera=mysqli_query($Conexion,"UPDATE tacceso_integrantes
SET Estatus='NP' WHERE Nombre='$eliminar_en_espera'");

         if($agregar_en_espera){
          echo '<script>';
          echo 'alert("Integrante eliminado");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
          echo '</script>';
          }



} //llave que verifica si hay valor en combo box
else{
echo '<script>';
          echo 'alert("Seleccione un integrante");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';

}
}////llave que verifica si se presiono el boton de eliminar integrante registrado






















////////////////////////////ELIMINAR O AGREGAR INTEGRANTE REGISTRADO/////////////////////////////////////
if (isset($_POST['Eliminar'])) {
if (strlen($_POST['E_integrante'])>=1){
$alumnoregistrado=trim($_POST['E_integrante']);

$agregar_en_espera=mysqli_query($Conexion,"UPDATE tacceso_integrantes
SET Estatus='NP' WHERE Nombre='$alumnoregistrado'");

         if($agregar_en_espera){
          echo '<script>';
          echo 'alert("Integrante eliminado");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
          echo '</script>';
          }



} //llave que verifica si hay valor en combo box
else{
echo '<script>';
          echo 'alert("Seleccione un integrante");';
          echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';

}
}////llave que verifica si se presiono el boton de eliminar integrante registrado











?>






<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio lider</title>
<link rel="stylesheet" href="css/Registrar_integrantes_Lider.css">
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
    <td><?php  echo $Nombre; ?></th>
  </tr>

   <tr>
    <th>Grupo</th>
    <td><?php  echo $Grupo; ?></th>
    
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
</div>	                  <!-- TERMINA CODIGO PARA COLOCAR TABLA DE DATOS-->


                              <!--CODIGO PARA COLOCAR LA OPCIONES-->
<div class="Contenedor_Encabezado2">
  <div class="Contenedor_Secciones">
  <div class="Contenedor_Secentrar">
	<div id="header">
	<ul class="nav">
		<li><a href="Pagina_Principal_lider.php">Pagina principal</a></li>
		<li><a href="Proyecto_Integrador_Lider.php">Proyecto Integrador</a></li>
	  <li><a href="Registrar_integrantes_Lider.php">Registrar Integrantes</a></li>
    <li><a href="Asignacion_lider.php">Asignación</a></li>


	</ul>
  </div>
  </div>
  </div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

  <p style="color:black;text-align:center; font-family:Calibri;">REGISTRO DE INTEGRANTES</p>

  <div class="Cuadro_Registrar">
  <div class="Cuadro_Registrar2" >

    <table class="Tabla">
    <form  method="post" action="Registrar_integrantes_Lider.php">

    <h5 style="font-family: calibri;">Datos del integrante</h5>
    <h6 style="font-family: calibri;">*Ingrese la matricula de su integrante y presion "Cargar datos"</h6>
    <tr>
    <th>Matricula</th>
    <td> <input style="width:80%; font-family: calibri" class="agregar_datos" type="text" name="Matricula2" value="<?php  echo $matricula2; ?>"maxlength="9" ></td>
    </tr>

    <tr>
    <th>Nombre</th>
    <td> <input  style="width:80%; font-family: calibri"  type="text" name="Nombre" value=" <?php  echo $Nombre2; ?>" ></td>
    </tr>

    <tr>
    <th>Grupo</th>
    <td>
    <select style="width:80%; font-family: calibri"   type="text" name="Grupo1" value="<?php  echo $Grupo2; ?>" maxlength="4" >
    <?php

    $resultado6=mysqli_query($Conexion,$grupos_activos);
    while ($row=mysqli_fetch_assoc($resultado6)) { ?>
    <option><?php echo $row["Grupo"];?></option>
    <?php } ?>

</select> 
      
    </tr>

    <tr>
    <th>Generacion</th>
    <td> <input style="width:80%;  font-family: calibri; text-align:left;"    type="text" name="Generacion" value="<?php  echo $gen; ?> " maxlength="9" ></td>
    </tr>






    <tr>
    <th>Matricula del lider</th>
    <td> <input style="width:80%;  font-family: calibri; text-align:left;"    type="text" name="Matricula_lider" value="<?php  echo $Matricula; ?> " maxlength="9"  readonly></td>
    </tr>



    <tr>
    <th>Contraseña</th>
    <td><input style="width:80%; font-family: calibri" class="agregar_datos" type="password" name="Contraseña"value=""maxlength="30" ></td>
    </tr>



     </table>

     <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Registrarse_Integrante_Lider" value="Registrar">

     <input class="BotonSubir" style="float:left;font-family:calibri" type="submit" name="Cargar_Datos" value="Cargar datos">


      </form>
   </div>
   </div>


<div class="Cuadro_integrantes">
 <div class="Cuadro_integrantes2" style="overflow:scroll; ">

  <h5 style="font-family: calibri;">Integrantes registrados</h5>
  <form method="post" action="Proyecto_Integrador_Lider.php">
    <table class="Tabla">
    <tr>
    <th style="text-align: center;">Nombre</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Matricula</th>
    </tr>


    <?php

    $resultado2=mysqli_query($Conexion,$integrantes_registrados);
    while ($row=mysqli_fetch_assoc($resultado2)) { ?>
    <tr>
      <td> <?php echo $row["Nombre"];?></td>
      <td> <?php echo $row["Grupo"];?> </td>
      <td> <?php echo $row["Matricula"];?> </td>
    </tr>
    <?php } ?>

    </table>

    </form>

   <input style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 " type="submit" onclick="abrir()"  value="Eliminar"  >

 </div>
<div class="Cuadro_Iespera" style="overflow:scroll; ">

<h5 style="font-family: calibri;">Integrantes en espera</h5>
  <form method="post" action="Proyecto_Integrador_Lider.php">
    <table class="Tabla">
    <tr>
    <th style="text-align: center;">Nombre</th>          <!--Codigo de los titulos de columnas-->
    <th style="text-align: center;">Grupo</th>
    <th style="text-align: center;">Matricula</th>
    </tr>


    <?php

    $resultado2=mysqli_query($Conexion,$integrantes_enproceso);
    while ($row=mysqli_fetch_assoc($resultado2)) { ?>
    <tr>
      <td> <?php echo $row["Nombre"];?></td>
      <td> <?php echo $row["Grupo"];?> </td>
      <td> <?php echo $row["Matricula"];?> </td>
    </tr>
    <?php } ?>

    </table>

    </form>


   <input style="border-radius:3px; font-family:Calibri; width: 115px; background-color:#f6f6f6 " type="submit" onclick="abrir2()"  value="Agregar o Eliminar"  >





</div>
</div>



















</div>
</div>




<!------------------------VENTANA DE ELIMINAR O AGREGAR INTEGRANTE---------------------------------->

<div class="ventana_datos" id="vent" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Eliminar integrante </h5>

    <form  method="post" action="Registrar_integrantes_Lider.php">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Integrante</strong></label>
    <select class="Botones" name="E_integrante">
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

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Eliminar" value="Eliminar">
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























<!------------------------VENTANA DE ELIMINAR INTEGRANTE REGISTRADO---------------------------------->

<div class="ventana_datos" id="vent2" >
  <div class="cerrar" id="cerrar"> <a href="javascript:cerrar2()"> <img src="Imagenes/cerrar.png"> </a></div>
    <h5 style="font-family: calibri;">Agregar o eliminar integrante en espera</h5>

    <form  method="post" action="Registrar_integrantes_Lider.php">

    <label style="font-family: calibri;font-size: 13px;"> <strong>Integrante</strong></label>
    <select class="Botones" name="E_o_A_no_registrado">
          <option value="" selected>Seleccionar</option>
          <?php
          while ($datos7=mysqli_fetch_array($resultado7)) {
          ?>

          <option value="<?php echo $datos7['Nombre']; ?>"> <?php echo $datos7['Nombre']; ?></option>

          <?php
          }
          ?>
          </select>
    <br> </br>

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Eliminar2" value="Eliminar">

    <input  style="border-radius:3px; font-family:Calibri; width: 100px; background-color:#f6f6f6 "  type="submit" name="Agregar2" value="Agregar">
    </form>
</div>
<script>
  function abrir2(){
    document.getElementById("vent2").style.display="block";
  }

  function cerrar2(){
    document.getElementById("vent2").style.display="none";
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
