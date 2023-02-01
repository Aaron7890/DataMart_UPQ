<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">

<?php

//$Conexion=mysqli_connect("localhost","jquintana","wS717714CU","bdpintegrador");

$Conexion=mysqli_connect("localhost","root","","bdpintegrador");


$matricula2="";
$Nombre2="";
$Grupo2="";
$Gen="";
$Estado="";


if (isset($_POST['Cargar_Datos'])) {

    if (strlen($_POST['Matricula2'])>=1){
    $matricula2=trim($_POST['Matricula2']);

    $resultado=mysqli_query($Conexion,"SELECT * FROM alumnos WHERE  Ncontrol='$matricula2'");
      while($consulta=mysqli_fetch_array($resultado)){
        $Nombre2=$consulta['Nombre'];
        $Grupo2=$consulta['Grupo'];
        $Gen=$consulta['generacion'];
      }
  } else{
    echo '<script>';
            echo 'alert("Ingrese la matricula del integrante");';
            echo 'window.location.href="Inicio.html";';
    echo '</script>';
  }

}




if (isset($_POST['Registrarse_Integrante'])) {

if (strlen($_POST['Nombre'])>=1 &&
strlen($_POST['Grupo1'])>=1 &&
strlen($_POST['Contraseña'])>=1 &&
strlen($_POST['Matricula2'])>=1 &&
strlen($_POST['Generacion'])>=1 ){

$nombre=trim($_POST['Nombre']);
$grupo=trim($_POST['Grupo1']);
$contraseña=trim($_POST['Contraseña']);
$matricula=trim($_POST['Matricula2']);
$gen=trim($_POST['Generacion']);

$Consulta="SELECT * FROM tacceso_integrantes WHERE
          Nombre='$nombre' and Matricula='$matricula'";
          $resultado=mysqli_query($Conexion,$Consulta);
          $filas=mysqli_num_rows($resultado);

          if($filas>0){
echo '<script>';
          echo 'alert("!ups parece que alguien ya se ha registrado el lider");';
          echo 'window.location.href="Inicio.html";';
echo '</script>';
        }

//////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
  else{
$Consulta2="INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Estatus,Generación)
VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$contraseña','$matricula','NA','$gen')";
 $resultado2=mysqli_query($Conexion,$Consulta2);

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
else {

echo '<script>';
          echo 'alert("Llene todos los campos");';
          echo 'window.location.href="Inicio.html";';
echo '</script>';


}


}

?>



<link rel="stylesheet" href="css/Registro_Integrante.css">
</head>




<body style="background-image: url(Imagenes/Fondo.jpg);">

<br></br><br></br>
<div class="centrar">
	<div class="formulario">
		<div class="cabezera">
		<div class="centrar">
		<div class="Logo">
		<img src="Imagenes/Logo_mecatronica.png" height="100px" width="100px">
		</div>



		</div>
		 <h4 style="color:black;font-family:verdana;" align="center">Registro</h4>
		 <h6 style="color:black;font-family:verdana;" align="center">Ingrese la matricula y haga clic en cargas datos</h6>
		 <div class="centrar">
         <div class="centrar_datos">


		   <form  method="post" action="Registro_Integrante.php" >

		     <p style="font-family:"Times new roman " align="center">Matricula</p>
              <input style="color:black;text-align: center;" class="form_cudrados" type="text"
              value="<?php  echo $matricula2; ?>" name="Matricula2" size="25" maxlength="9"> <br></br>


		      <p style= "color:black;font-family:"Times new roman" align="center">Nombre</p>
              <input style="color:black" class="form_cudrados" type="text" name="Nombre"
              value="<?php  echo $Nombre2; ?>" size="25"><br>




              <p style="font-family:"Times new roman " align="center">Grupo</p>
             <center><input style="color:black ;text-align: center; align-items:center;" class="form_cudrados" type="text"  name="Grupo1" size="3" maxlength="3" value="<?php  echo $Grupo2; ?>"> </center><br>

             <p style="font-family:"Times new roman " align="center">Generacion</p>
             <center><input style="color:black ;text-align: center; align-items:center;" class="form_cudrados" type="text"  name="Generacion" size="3" maxlength="3" value="<?php  echo $Gen; ?>"> </center><br></br>

             <p style="font-family:"Times new roman " align="center">Contraseña</p>
             <input style="color:black;text-align:center;" class="form_cudrados" type="Password" name="Contraseña" size="25"> <br></br>




              <br></br>
             <input class="boton_ingresar"type="submit"value="Registrarse"name="Registrarse_Integrante">
             <br></br>
             <input class="boton_ingresar"type="submit"value="Cargar datos"name="Cargar_Datos">


              </form>




         </div>
         </div>
         </div>


		</div>
	</div>

</div>




</body>
</html>
