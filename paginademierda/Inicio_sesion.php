<?php
if (isset($_POST['Ingresar'])) {
if (strlen($_POST['Correoelectronico'])>=1 && strlen($_POST['Contraseña'])>=1){
$Correoelectronico=trim($_POST['Correoelectronico']);
$Contraseña=trim($_POST['Contraseña']);
//Cosultar  a la base de datos Alumno

$Conexion=mysqli_connect("localhost","root","","bdpintegrador");


$Consulta="SELECT * FROM tacceso_integrantes WHERE Contraseña='$Contraseña' and Correo='$Correoelectronico'";
$resultado=mysqli_query($Conexion,$Consulta);
$filas=mysqli_num_rows($resultado);

$resultado2=mysqli_query($Conexion,"SELECT * FROM tacceso_integrantes WHERE  Correo='$Correoelectronico'");
$consulta=mysqli_fetch_array($resultado2);

if($filas>0){

echo '<script>';
echo 'alert("Bienvenido");';
echo 'window.location.href="Pagina_Principal_Integrante.php";';
echo '</script>';

session_start();
$_SESSION['Correo1']=$Correoelectronico;

}else{

// Producción: $Conexion=mysqli_connect("localhost","jquintana","wS717714CU","bdpintegrador");

$Conexion=mysqli_connect("localhost","root","","bdpintegrador");

$Consulta="SELECT * FROM tacceso_lider WHERE Contraseña='$Contraseña' and Correo='$Correoelectronico'";
$resultado=mysqli_query($Conexion,$Consulta);
$filas=mysqli_num_rows($resultado);
if($filas>0){

echo '<script>';
echo 'alert("Bienvenido");';
echo 'window.location.href="Pagina_Principal_Lider.php";';
echo '</script>';

session_start();
$_SESSION['Correo1']=$Correoelectronico;
}else {
  $Conexion=mysqli_connect("localhost","root","","bdpintegrador");

  $Consulta="SELECT * FROM tutores WHERE clave='$Contraseña' and usuario='$Correoelectronico'";
  $resultado=mysqli_query($Conexion,$Consulta);
  $filas=mysqli_num_rows($resultado);
  if($filas>0){

  echo '<script>';
  echo 'alert("Bienvenido");';
  echo 'window.location.href="Pagina_Principal_Profesor_Tutor.php";';
  echo '</script>';

  session_start();
  $_SESSION['Correo1']=$Correoelectronico;
}else {
  $Conexion=mysqli_connect("localhost","root","","bdpintegrador");

  $Consulta="SELECT * FROM maestros WHERE clave='$Contraseña' and usuario='$Correoelectronico'";
  $resultado=mysqli_query($Conexion,$Consulta);
  $filas=mysqli_num_rows($resultado);
  if($filas>0){

  echo '<script>';
  echo 'alert("Bienvenido");';
  echo 'window.location.href="Pagina_Principal_Maestro.php";';
  echo '</script>';

  session_start();
  $_SESSION['Correo1']=$Correoelectronico;
}else{
echo '<script>';
echo 'alert("Error de autentificacion,verifique la matricula,contraseña o el tipo de usuario 1");';
echo 'window.location.href="Inicio.html";';
echo '</script>';
}
}
}
}
}  //Termia if de verificar los campos

else {
echo '<script>';
echo 'alert("Llene todos los campos");';
echo 'window.location.href="Inicio.html";';
echo '</script>';
}
}  //Termina if de verificar si se presiono el boton ingresar
else{
echo '<script>';
echo 'alert("Ocurrio un error");';
echo 'window.location.href="Inicio.html";';
echo '</script>';
}









?>
