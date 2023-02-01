

<?php

include("conexion_bd.php");
session_start();
   if (isset($_POST['Registrarse_Integrante'])) {
  

       if (strlen($_POST['Nombre'])>=1 && strlen($_POST['Correo'])>=1 && strlen($_POST['Grupo'])>=1 && 
          strlen($_POST['Contrasena'])>=1 && strlen($_POST['Matricula'])>=1 && strlen($_POST['Matricula_lider'])>=1){ 
       
        $nombre=trim($_POST['Nombre']);
        $email=trim($_POST['Correo']);
        $grupo=trim($_POST['Grupo']);
        $contraseña=trim($_POST['Contrasena']);
        $matricula=trim($_POST['Matricula']);
        $matricula_lider=trim($_POST['Matricula_lider']);

//////////////////////////Verificar si se han registrado con el mismo numero de matricula///////////////////////////////

        $Consulta="SELECT * FROM tacceso_integrantes WHERE 
        Nombre='$nombre' and Correo='$email' and Matricula='$matricula'";
        $resultado=mysqli_query($conexion,$Consulta);
        $filas=mysqli_num_rows($resultado); 

        if($filas>0){
echo '<script>';
        echo 'alert("!ups parece que alguien ya se ha registrado tu correo y matricula");';
        echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';
      }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
else{
  
  $Consulta2="INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Matriculalider) 
        VALUES('$nombre','$email','$grupo','$contraseña','$matricula','$matricula_lider')";
        $resultado2=mysqli_query($conexion,$Consulta2);
        
        $_SESSION['Matriculalider']=$matricula_lider;
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


} ///Corchete para verificar if de campos

else{

echo '<script>';
        echo 'alert("Llene todos los campos");';
        echo 'window.location.href="Registrar_integrantes_Lider.php";';
echo '</script>';


}

}   ///Verificar si se presiono el boton



/////////////////////////Llenar el registro con los datos/////////////////////////////////////////////////////////


if (isset($_POST['Registrarse_Lider'])) {
  

       if (strlen($_POST['Nombre'])>=1 && strlen($_POST['Correo'])>=1 && strlen($_POST['Grupo'])>=1 && 
          strlen($_POST['Contrasena'])>=1 && strlen($_POST['Matricula'])>=1){ 
       
        $nombre=trim($_POST['Nombre']);
        $email=trim($_POST['Correo']);
        $grupo=trim($_POST['Grupo']);
        $contraseña=trim($_POST['Contrasena']);
        $matricula=trim($_POST['Matricula']);

////////////////////////////Verificar si se han registrado con el mismo numero de matricula///////////////////////////////

        $Consulta="SELECT * FROM tacceso_lider WHERE 
        Nombre='$nombre' and Correo='$email' and Matricula='$matricula'";
        $resultado=mysqli_query($conexion,$Consulta);
        $filas=mysqli_num_rows($resultado); 

        if($filas>0){

echo '<script>';
        echo 'alert("!ups parece que alguien ya se ha registrado tu correo y matricula");';
        echo 'window.location.href="Registro_Lider.html";';
echo '</script>';

      }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
else{
  
  $Consulta2="INSERT INTO tacceso_lider(Nombre,Correo,Grupo,Contraseña,Matricula) 
        VALUES('$nombre','$email','$grupo','$contraseña','$matricula')";
        $resultado2=mysqli_query($conexion,$Consulta2);
       if($resultado2){
       echo '<script>';
        echo 'alert("Registro exitoso");';
        echo 'window.location.href="Inicio.html";';
        echo '</script>';
        }  
        else {
         echo "Ha ocurrido un error";
             }     
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


} ///Corchete para verificar if de campos

else{
echo '<script>';
        echo 'alert("Llene todos los campos");';
        echo 'window.location.href="Registro_Lider.html";';
echo '</script>';

}

}  

/////////////////////////Llenar el registro con los datos/////////////////////////////////////////////////////////

     



if (isset($_POST['Registrarse_Profesor'])) {
  

       if (strlen($_POST['Nombre'])>=1 && 
        strlen($_POST['Correo'])>=1 && 
        strlen($_POST['Contraseña'])>=1 && 
        isset($_POST['opcion_maestro'])>=1 &&
        isset($_POST['clave_registro'])>=1 ){ 

       
        $nombre=trim($_POST['Nombre']);
        $email=trim($_POST['Correo']);
        $contraseña=trim($_POST['Contraseña']);
        $opcion_maestro=trim($_POST['opcion_maestro']);
        $clave_registro=trim($_POST['clave_registro']);

if ($clave_registro=="ra7avPrW") {



if ($opcion_maestro=="Maestro_tutor") {
 

////////////////////////////Verificar si se han registrado con el mismo numero de matricula///////////////////////////////

        $Consulta="SELECT * FROM tacceso_profesor WHERE 
        Nombre='$nombre' and Correo='$email'";
        $resultado=mysqli_query($conexion,$Consulta);
        $filas=mysqli_num_rows($resultado); 

        if($filas>0){
echo '<script>';
        echo 'alert("!ups parece que alguien ya se ha registrado tu correo y nombre");';
        echo 'window.location.href="Registro_Profesor.html";';
echo '</script>';


        
      }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
else{

  $Consulta2="INSERT INTO tacceso_profesor(Nombre,Correo,Contraseña,Tipo_usuario) 
        VALUES('$nombre','$email','$contraseña','Tutor')";
        $resultado2=mysqli_query($conexion,$Consulta2);

       if($resultado2){
        echo '<script>';
        echo 'alert("Registro exitoso");';
        echo 'window.location.href="Inicio.html";';
        echo '</script>';
        } 
         
        else {
         echo "Ha ocurrido un error";
             }     
}
} ////llave que verifica si se escogio la opcion de maestro-tutor
else{   ///else que inserta los datos si no se escogio la opcion de maestro tutor




        $Consulta="SELECT * FROM tacceso_profesor WHERE 
        Nombre='$nombre' and Correo='$email'";
        $resultado=mysqli_query($conexion,$Consulta);
        $filas=mysqli_num_rows($resultado); 

        if($filas>0){
echo '<script>';
        echo 'alert("!ups parece que alguien ya se ha registrado tu correo y nombre");';
        echo 'window.location.href="Registro_Profesor.html";';
echo '</script>';


        
      }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
else{
  
  $Consulta2="INSERT INTO tacceso_profesor(Nombre,Correo,Contraseña,Tipo_usuario) 
        VALUES('$nombre','$email','$contraseña','Maestro')";
        $resultado2=mysqli_query($conexion,$Consulta2);

       if($resultado2){
        echo '<script>';
        echo 'alert("Registro exitoso");';
        echo 'window.location.href="Inicio.html";';
        echo '</script>';
        } 
         
        else {
         echo "Ha ocurrido un error";
             }     
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}/// llave que verifica la clave de registro
else{
echo '<script>';
        echo 'alert("La clave de registro es incorrecta");';
        echo 'window.location.href="Registro_Profesor.html";';
echo '</script>';
}
} ///Corchete para verificar if de campos

else{
echo '<script>';
        echo 'alert("Llene todos los campos");';
        echo 'window.location.href="Registro_Profesor.html";';
echo '</script>';
}

}  



/////////////////////////Llenar el registro con los datos/////////////////////////////////////////////////////////


















  
  
?>