<?php

$conexion=mysqli_connect("localhost","root","","bdpintegrador");

session_start();
 $Correo=$_SESSION['Correo1'];
if (isset($_POST['Guardar_datos'])) {

 

if (strlen($_POST['NombreP'])>=1 &&
  strlen($_POST['ObjetivoP'])>=1 &&
  strlen($_POST['ObjetivoC'])>=1 &&
  strlen($_POST['T_industria'])>=1){

	$Nombre=trim($_POST['NombreP']);
  $Objetivo=trim($_POST['ObjetivoP']);
  $Objetivo_cuatrimestral=trim($_POST['ObjetivoC']);
  $Tipo_industria=trim($_POST['T_industria']);

    $resultado=mysqli_query($conexion,"UPDATE tacceso_lider SET Objetivo='$Objetivo',Nombre_Proyecto='$Nombre', Objetivo_cuatrimestral='$Objetivo_cuatrimestral' , Tipo_industria='$Tipo_industria' WHERE Correo='$Correo'");

         if($resultado){
          echo '<script>';
          echo 'alert("Datos guardados");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
          echo '</script>';
          }

          else {
          echo '<script>';
          echo 'alert("Ocurrio un error");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
          echo '</script>';
           }
}

else{
echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Proyecto_Integrador_Lider.php";';
echo '</script>';
}

}




if (isset($_POST['Eliminar'])) {
if (strlen($_POST['Materia2'])>=1){

}


}

else{
  echo '<script>';
          echo 'alert("Seleccione una materia");';
          echo 'window.location.href="Asignacion_lider.php";';
echo '</script>';
}











?>
