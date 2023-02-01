<?php 


if (isset($_POST['Ingresar'])) {

if (strlen($_POST['Correoelectronico'])>=1 && strlen($_POST['Contraseña'])>=1 && isset($_POST['Opcion']) ){
if ($_POST['Opcion']=='Alumno'){    


$Correoelectronico=trim($_POST['Correoelectronico']);
$Contraseña=trim($_POST['Contraseña']);
//Cosultar  a la base de datos Alumno
//Prtoducción: $Conexion=mysqli_connect("localhost","jquintana","wS717714CU","bdpintegrador");

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

}


else{

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
}

else{
echo '<script>';
echo 'alert("Error de autentificacion,verifique la matricula,contraseña o el tipo de usuario 1");';
echo 'window.location.href="Inicio.html";';
echo '</script>'; 
}
}// llave que cierra el else para checar ahora la tabla lider
} //llave que cierra if para verficar el valor del radio




else{  //else que verifica ahora si se presiono el boton de profesor
session_start();
if ($_POST['Opcion']=='Maestro'){   
$Usuario_tutor=trim($_POST['Correoelectronico']);
$Contraseña=trim($_POST['Contraseña']);
// Producción: $Conexion=mysqli_connect("localhost","jquintana","wS717714CU","bdpintegrador");

$Conexion=mysqli_connect("localhost","root","","bdpintegrador");

$Consulta="SELECT * FROM tutores WHERE  Clave='$Contraseña' and Usuario='$Usuario_tutor'";
$resultado=mysqli_query($Conexion,$Consulta);
$filas=mysqli_num_rows($resultado);

$_SESSION['Correo1']=$Usuario_tutor;
if($filas>0){


echo '<script>';
echo 'alert("Bienvenido Profesor");';
echo 'window.location.href="Pagina_Principal_Profesor_Tutor.php";';
echo '</script>'; 

} //llave que verifica si las los datos estan correctos
else{
	$Usuario_notutor=trim($_POST['Correoelectronico']);
$Contraseña=trim($_POST['Contraseña']);
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");

$Consulta="SELECT * FROM maestros WHERE  Clave='$Contraseña' and Usuario='$Usuario_notutor'";
$resultado=mysqli_query($Conexion,$Consulta);
$filas=mysqli_num_rows($resultado);

$_SESSION['Correo1']=$Usuario_notutor;
if($filas>0){


echo '<script>';
echo 'alert("Bienvenido Profesor");';
echo 'window.location.href="Pagina_Principal_Maestro.php";';
echo '</script>'; 

} //llave que verifica si las los datos estan correctos


else{
echo '<script>';
echo 'alert("Error de autentificacion,verifique la matricula,contraseña o el tipo de usuario 2");';
echo 'window.location.href="Inicio.html";';
echo '</script>'; 
}
}
} //llave que verifica si se presiono el boton maestro




}  //cierre de llave que verifica ahora si se presiono el boton de profesor





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

          

