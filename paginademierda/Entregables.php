<?php
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
session_start();
$Correo=$_SESSION['Correo1'];

if (isset($_POST['Subir_archivo1'])) {

$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Correo='$Correo'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula=$consulta['Matricula'];
  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $ID=$consulta['ID'];
  $Estatus_proyecto=$consulta['Estatus'];
 }
if ($Estatus_proyecto=="Validado") {


if($_FILES["Archivo1"]){




$nombre_base=basename($_FILES["Archivo1"]["name"]);
$nombre_final="PI-EA21 ".$Grupo." ".$Nombre_proyecto." ".$ID.".pdf";
$Fecha=date("d/m/y")."-".date("H:i:s");
$ruta="Archivos/".$nombre_final;
$subirarchivo=move_uploaded_file($_FILES["Archivo1"]["tmp_name"],$ruta);


$resultado3=mysqli_query($Conexion,"SELECT * FROM carga WHERE  Matriculalider='$Matricula'");
while($consulta3=mysqli_fetch_array($resultado3)){
  $Matricula_integrante=$consulta3['Matricula'];
  $Materia=$consulta3['Materia'];
  $Profesor=$consulta3['Profesor'];
  $Grupocarga=$consulta3['Grupo'];


$Consulta="SELECT * FROM entregables WHERE
          Nombre='$Nombre' and Grupo='$Grupocarga' and Matricula='$Matricula' and Entregable='Entregable1' and Materia='$Materia' and Profesor='$Profesor' ";
          $resultado2=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado2);

          if($filas>0){
echo '<script>';
          echo 'alert("Ya se ha enviado el archivo");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
        }
else{




if ($subirarchivo) {
	$insertarSQL1="INSERT INTO entregables(Nombre,Matricula,Matriculalider,Profesor,Materia,Grupo,Entregable,Nombre_archivo,Ruta,Fecha_Hora)
	VALUES ('$Nombre','$Matricula_integrante','$Matricula','$Profesor','$Materia','$Grupocarga','Entregable1','$nombre_final','$ruta','$Fecha')";
$verificacion=mysqli_query($Conexion,$insertarSQL1);
if ($verificacion) {
	echo "<script> alert('Se ha enviado el archivo'); window.location.href='Proyecto_Integrador_Lider.php' </script>";
} ///llave que verifica si la verificacion esta echa y dirige a la pagina de nuevo
else{
	printf("Errormessage:%s\n",mysqli_error($Conexion));
}
} //llave que verifica el subirarchivo
} //llave que verifica si se contiene un archivo en el examinador
} //llave que verifica el while
} //llave que verifica si se esta seleccionado un documento
}//llave de if que verifica si el proyecto esta validado
else{
echo '<script>';
          echo 'alert("Valide el proyecto ");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
}
}  ////llave que verifica si se presiono el boton subir archivo de entregable 1-lider














//////////////////////////////////CODIGO PARA ENTREGABLE 2 LIDER //////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['Subir_archivo2'])) {

$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Correo='$Correo'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula=$consulta['Matricula'];
  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $ID=$consulta['ID'];
  $Estatus_proyecto=$consulta['Estatus'];
 }



if ($Estatus_proyecto=="Validado") {

if($_FILES["Archivo2"] &&
strlen($_POST['Materia'])>=1 ){

$Materia_E2=trim($_POST['Materia']);

$resultado2=mysqli_query($Conexion,"SELECT * FROM carga WHERE  Matricula='$Matricula' and Materia='$Materia_E2'");
while($consulta2=mysqli_fetch_array($resultado2)){
  $Profesor2=$consulta2['Profesor'];
   $Grupocarga=$consulta2['Grupo'];

 }

$nombre_base=basename($_FILES["Archivo2"]["name"]);
$nombre_final="PI-EA21-".$Grupo."-".$Materia_E2."-".$Nombre_proyecto."-".$ID.".pdf";
$Fecha=date("d/m/y")."-".date("H:i:s");
$ruta="Archivos/".$nombre_final;
$subirarchivo=move_uploaded_file($_FILES["Archivo2"]["tmp_name"],$ruta);



$Consulta="SELECT * FROM entregables WHERE
          Nombre='$Nombre' and Grupo='$Grupocarga' and Matricula='$Matricula' and Entregable='Entregable2' and Materia='$Materia_E2' and Profesor='$Profesor2' ";
          $resultado2=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado2);

          if($filas>0){
echo '<script>';
          echo 'alert("Ya se ha enviado el archivo");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
        }
else{




if ($subirarchivo) {
	$insertarSQL2="INSERT INTO entregables(Nombre,Matricula,Matriculalider,Profesor,Materia,Grupo,Entregable,Nombre_archivo,Ruta,Fecha_Hora)
	VALUES ('$Nombre','$Matricula','$Matricula','$Profesor2','$Materia_E2','$Grupocarga','Entregable2','$nombre_final','$ruta','$Fecha')";
$verificacion=mysqli_query($Conexion,$insertarSQL2);
if ($verificacion) {
	echo "<script> alert('Se ha enviado el archivo'); window.location.href='Proyecto_Integrador_Lider.php' </script>";
} ///llave que verifica si la verificacion esta echa y dirige a la pagina de nuevo
else{
	printf("Errormessage:%s\n",mysqli_error($Conexion));
}
} //llave que verifica el subirarchivo
} //llave que verifica si se contiene un archivo en el examinador

}
}//llave que verifica si el proyecto esta validado
else{
  echo '<script>';
          echo 'alert("Valide el proyecto ");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
}
}  ////llave que verifica si se presiono el boton subir archivo de entregable 1-lider










//////////////////////////////////CODIGO PARA ENTREGABLES FINALES LIDER //////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['Subir_archivo3'])) {

$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Correo='$Correo'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $Grupo=$consulta['Grupo'];
  $Correo=$consulta['Correo'];
  $Matricula=$consulta['Matricula'];
  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $ID=$consulta['ID'];
  $Estatus_proyecto=$consulta['Estatus'];
 }
if ($Estatus_proyecto=="Validado") {


if($_FILES["Archivo3"] &&
strlen($_POST['Entrega_final'])>=1 ){
$Entregable_final=trim($_POST['Entrega_final']);

$nombre_base=basename($_FILES["Archivo3"]["name"]);
$nombre_final="PI-EA21-".$Grupo."-".$Entregable_final."-".$Nombre_proyecto."-".$ID.".pdf";
$Fecha=date("d/m/y")."-".date("H:i:s");
$ruta="Archivos/".$nombre_final;
$subirarchivo=move_uploaded_file($_FILES["Archivo3"]["tmp_name"],$ruta);






$resultado3=mysqli_query($Conexion,"SELECT * FROM carga WHERE  Matriculalider='$Matricula'");
while($consulta3=mysqli_fetch_array($resultado3)){
  $Materia=$consulta3['Materia'];
  $Profesor=$consulta3['Profesor'];
  $Grupocarga=$consulta3['Grupo'];
  $Matricula_integrante=$consulta3['Matricula'];


$Consulta="SELECT * FROM entregables WHERE
          Nombre='$Nombre' and Grupo='$Grupocarga' and Matricula='$Matricula' and Entregable='$Entregable_final' and Materia='$Materia' and Profesor='$Profesor' ";
          $resultado2=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado2);

          if($filas>0){
echo '<script>';
          echo 'alert("Ya se ha enviado el archivo");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
        }
else{




if ($subirarchivo) {
  $insertarSQL1="INSERT INTO entregables(Nombre,Matricula,Matriculalider,Profesor,Materia,Grupo,Entregable,Nombre_archivo,Ruta,Fecha_Hora)
  VALUES ('$Nombre','$Matricula_integrante','$Matricula','$Profesor','$Materia','$Grupocarga','$Entregable_final','$nombre_final','$ruta','$Fecha')";
$verificacion=mysqli_query($Conexion,$insertarSQL1);
if ($verificacion) {
  echo "<script> alert('Se ha enviado el archivo'); window.location.href='Proyecto_Integrador_Lider.php' </script>";
} ///llave que verifica si la verificacion esta echa y dirige a la pagina de nuevo
else{
  printf("Errormessage:%s\n",mysqli_error($Conexion));
}
} //llave que verifica el subirarchivo
} //llave que verifica si se contiene un archivo en el examinador
} //llave que verifica el while
} //llave que verifica si se esta seleccionado un documento
}//llave de if que verifica si el proyecto esta validado
else{
echo '<script>';
          echo 'alert("Valide el proyecto ");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
}
}  ////llave que verifica si se presiono el boton subir archivo de entregable 1-lider







































































//////////////////////////////////CODIGO PARA ENTREGABLES INTEGRANTES  //////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





if (isset($_POST['Subir_archivo11'])) {


$resultado_integrante=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Correo='$Correo'");
while($consulta_integrante=mysqli_fetch_array($resultado_integrante)){
  $Nombre=$consulta_integrante['Nombre'];
  $Grupo11=$consulta_integrante['Grupo'];
  $Correo=$consulta_integrante['Correo'];
  $Matricula=$consulta_integrante['Matricula'];
  $Matriculalider=$consulta_integrante['Matriculalider'];
}



$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Matricula='$Matriculalider'");
while($consulta=mysqli_fetch_array($resultado)){

  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $ID=$consulta['ID'];
  $Estatus_proyecto=$consulta['Estatus'];
 }





if ($Estatus_proyecto=="Validado") {

if($_FILES["Archivo11"]){
$nombre_base=basename($_FILES["Archivo11"]["name"]);
$nombre_final="PI-EA21-".$Grupo11."-".$Nombre_proyecto."-".$ID.".pdf";
$Fecha=date("d/m/y")."-".date("H:i:s");
$ruta="Archivos/".$nombre_final;
$subirarchivo=move_uploaded_file($_FILES["Archivo11"]["tmp_name"],$ruta);


$resultado3=mysqli_query($Conexion,"SELECT * FROM carga WHERE  Matriculalider='$Matricula'");
while($consulta3=mysqli_fetch_array($resultado3)){
  $Materia=$consulta3['Materia'];
  $Profesor=$consulta3['Profesor'];
  $Grupocarga=$consulta3['Grupo'];


$Consulta="SELECT * FROM entregables WHERE
          Nombre='$Nombre' and Grupo='$Grupocarga' and Matricula='$Matricula' and Entregable='Entregable1' and Materia='$Materia' and Profesor='$Profesor' ";
          $resultado2=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado2);

          if($filas>0){
echo '<script>';
          echo 'alert("Ya se ha enviado el archivo");';
          echo 'window.location.href="Proyecto_Integrador_Integrante.php";';
echo '</script>';
        }
else{




if ($subirarchivo) {
	$insertarSQL4="INSERT INTO entregables(Nombre,Matricula,Profesor,Materia,Grupo,Entregable,Nombre_archivo,Ruta,Fecha_Hora)
	VALUES ('$Nombre','$Matricula','$Profesor','$Materia','$Grupocarga','Entregable1','$nombre_final','$ruta','$Fecha')";
$verificacion=mysqli_query($Conexion,$insertarSQL4);
if ($verificacion) {
	echo "<script> alert('Se ha enviado el archivo'); window.location.href='Proyecto_Integrador_Integrante.php' </script>";
} ///llave que verifica si la verificacion esta echa y dirige a la pagina de nuevo
else{
	printf("Errormessage:%s\n",mysqli_error($Conexion));
}
} //llave que verifica el subirarchivo
} //llave que verifica si se contiene un archivo en el examinador
} //llave que verifica el while
}//llave que verifica si el proyecto esta validado
}
else{
echo '<script>';
          echo 'alert("Valide el proyecto");';
          echo 'window.location.href="Proyecto_Integrador_Integrante.php";';
echo '</script>';
}
}  ////llave que verifica si se presiono el boton subir archivo de entregable 1-lider














//////////////////////////////////CODIGO PARA ENTREGABLE 2 INTEGRANTE ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['Subir_archivo22'])) {



$resultado_integrante=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Correo='$Correo'");
while($consulta_integrante=mysqli_fetch_array($resultado_integrante)){
  $Nombre=$consulta_integrante['Nombre'];
  $Grupo22=$consulta_integrante['Grupo'];
  $Correo=$consulta_integrante['Correo'];
  $Matricula=$consulta_integrante['Matricula'];
  $Matriculalider=$consulta_integrante['Matriculalider'];
}



$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Matricula='$Matriculalider'");
while($consulta=mysqli_fetch_array($resultado)){

  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $ID=$consulta['ID'];
  $Estatus_proyecto=$consulta['Estatus'];
 }

if ($Estatus_proyecto=="Validado") {

if($_FILES["Archivo22"] &&
strlen($_POST['Materia'])>=1 ){

$Materia_E2=trim($_POST['Materia']);

$resultado2=mysqli_query($Conexion,"SELECT * FROM carga WHERE  Matricula='$Matricula' and Materia='$Materia_E2'");
while($consulta2=mysqli_fetch_array($resultado2)){
  $Profesor2=$consulta2['Profesor'];
  $Grupocarga=$consulta2['Grupo'];

 }

$nombre_base=basename($_FILES["Archivo22"]["name"]);
$nombre_final="PI-EA21-".$Grupo22."-".$Materia_E2."-".$Nombre_proyecto."-".$ID.".pdf";
$Fecha=date("d/m/y")."-".date("H:i:s");
$ruta="Archivos/".$nombre_final;
$subirarchivo=move_uploaded_file($_FILES["Archivo22"]["tmp_name"],$ruta);



$Consulta="SELECT * FROM entregables WHERE
          Nombre='$Nombre' and Grupo='$Grupocarga' and Matricula='$Matricula' and Entregable='Entregable2' and Materia='$Materia_E2' and Profesor='$Profesor2' ";
          $resultado2=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado2);

          if($filas>0){
echo '<script>';
          echo 'alert("Ya se ha enviado el archivo");';
          echo 'window.location.href="Proyecto_Integrador_Integrante.php";';
echo '</script>';
        }
else{




if ($subirarchivo) {
	$insertarSQL5="INSERT INTO entregables(Nombre,Matricula,Matriculalider,Profesor,Materia,Grupo,Entregable,Nombre_archivo,Ruta,Fecha_Hora)
	VALUES ('$Nombre','$Matricula','$Matriculalider','$Profesor2','$Materia_E2','$Grupocarga','Entregable2','$nombre_final','$ruta','$Fecha')";
$verificacion=mysqli_query($Conexion,$insertarSQL5);
if ($verificacion) {
	echo "<script> alert('Se ha enviado el archivo'); window.location.href='Proyecto_Integrador_Integrante.php' </script>";
} ///llave que verifica si la verificacion esta echa y dirige a la pagina de nuevo
else{
	printf("Errormessage:%s\n",mysqli_error($Conexion));
}
} //llave que verifica el subirarchivo
} //llave que verifica si se contiene un archivo en el examinador

}
} //llave que verifica si el proyecto esta validado
else{
echo '<script>';
          echo 'alert("Valide el proyecto");';
          echo 'window.location.href="Proyecto_Integrador_Integrante.php";';
echo '</script>';
}
}  ////llave que verifica si se presiono el boton subir archivo de entregable 1-lider










///////////////////////////CODIGO PARA ENTREGABLES FINALES INTEGRANTES //////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['Subir_archivo33'])) {

$resultado_integrante=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Correo='$Correo'");
while($consulta_integrante=mysqli_fetch_array($resultado_integrante)){
  $Nombre=$consulta_integrante['Nombre'];
  $Grupo33=$consulta_integrante['Grupo'];
  $Correo=$consulta_integrante['Correo'];
  $Matricula=$consulta_integrante['Matricula'];
  $Matriculalider=$consulta_integrante['Matriculalider'];
}



$resultado=mysqli_query($Conexion,"SELECT * FROM tacceso_lider WHERE  Matricula='$Matriculalider'");
while($consulta=mysqli_fetch_array($resultado)){

  $Nombre_proyecto=$consulta['Nombre_Proyecto'];
  $ID=$consulta['ID'];
  $Estatus_proyecto=$consulta['Estatus'];
 }


if ($Estatus_proyecto=="Validado") {



if($_FILES["Archivo33"] &&
strlen($_POST['Entrega_final'])>=1 ){
$Entregable_final=trim($_POST['Entrega_final']);


$nombre_base=basename($_FILES["Archivo33"]["name"]);
$nombre_final="PI-EA21-".$Grupo33."-".$Entregable_final."-".$Nombre_proyecto."-".$ID.".pdf";
$Fecha=date("d/m/y")."-".date("H:i:s");
$ruta="Archivos/".$nombre_final;
$subirarchivo=move_uploaded_file($_FILES["Archivo33"]["tmp_name"],$ruta);



$Consulta="SELECT * FROM entregables WHERE
          Nombre='$Nombre' and Grupo='$Grupo33' and Matricula='$Matricula' and Entregable='$Entregable_final'";
          $resultado2=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado2);

          if($filas>0){
echo '<script>';
          echo 'alert("Ya se ha enviado el archivo");';
          echo 'window.location.href="Proyecto_Integrador_Integrante.php";';
echo '</script>';
        }
else{




if ($subirarchivo) {
	$insertarSQL6="INSERT INTO entregables(Nombre,Matricula,Grupo,Entregable,Nombre_archivo,Ruta,Fecha_Hora)
	VALUES ('$Nombre','$Matricula','$Grupo33','$Entregable_final','$nombre_final','$ruta','$Fecha')";
$verificacion=mysqli_query($Conexion,$insertarSQL6);
if ($verificacion) {
	echo "<script> alert('Se ha enviado el archivo'); window.location.href='Proyecto_Integrador_Integrante.php' </script>";
} ///llave que verifica si la verificacion esta echa y dirige a la pagina de nuevo
else{
	printf("Errormessage:%s\n",mysqli_error($Conexion));
}
} //llave que verifica el subirarchivo
} //llave que verifica si se contiene un archivo en el examinador

} //llave que verifica si el proyecto esta validado
}
else{
echo '<script>';
          echo 'alert("Valide el proyecto");';
          echo 'window.location.href="Proyecto_Integrador_Integrante.php";';
echo '</script>';
}
}  ////llave que verifica si se presiono el boton subir archivo de entregable 1-lider



























































































































































































































 ?>
