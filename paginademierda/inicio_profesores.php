<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesion</title>
<meta charset="utf-8">
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<link rel="stylesheet" href="css/Inicio.css">
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
		 <h4 style="color:black;font-family:verdana;" align="center">Inicio de sesion</h4>
		 <p style="font-family:Times new roman" align="center">Ingrese los datos en los campos,en caso de no tener cuenta has clic en el boton inferior para crear una cuenta</p>
         
         <div class="centrar">
         <div class="centrar_datos">
		 

		  <form  method="post" action="Inicio_sesion_profesores.php">
		     <p style= "color:black;font-family:"Times new roman" align="center">Correo electronico ó Usuario</p>
             <input style="color:black;text-align: center;" class="form_cudrados" type="text" name="Correoelectronico" value="" size="25">
             <br>
         

              <p style="font-family:"Times new roman " align="center" >Contraseña</p>
              <input style="color:black;text-align: center;" class="form_cudrados" type="Password" name="Contraseña" size="25">
              <br></br>
          

             <p style="font-family:"Times new roman " align="center" >Tipo de usuario</p>
             
            
             
             <input type="radio" id="" name="Opcion" value="Tutor"> Tutor
             <input type="radio" id="" name="Opcion" value="Profesor">Maestro
            
         
             <br></br>
             <input class="boton_ingresar" type="submit" value="Ingresar" name="Ingresar" >
             <br></br>
             </form>
             
             <form action="Opcion_de_ingreso.html">
             <input class="boton_registratse" type="submit" name="Registrarese" value="Registrarse"  > 
             </form>


         </div>
         </div>
         </div>


		</div>
	</div>

</div>



</body>
</html>

