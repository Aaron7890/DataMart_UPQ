<?php
session_start();
if(($_SESSION['Correo1'])!=""){
/*Consulta de datos de la base de la tabla para colocar en tabla de informacion del alumno*/
$Usuario=$_SESSION['Correo1'];
$Conexion=mysqli_connect("localhost","root","","bdpintegrador");
$resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE  Usuario='$Usuario'");
while($consulta=mysqli_fetch_array($resultado)){
  $Nombre=$consulta['Nombre'];
  $grupos_activos="SELECT Grupo FROM contenido where estatus=1 ";


}


}
else{
  echo '<script>';
          echo 'alert("Ingrese la matricula del integrante");';
          echo 'window.location.href="Registrar_lider.php";';
echo '</script>';
}
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Pagina principal-Sitio lider</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/Registrar_lider.css">
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
  <td><?php  echo $Nombre; ?></th>
</tr>


<tr>
  <th>Tipo de usuario</th>
  <td>Tutor</th>
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
  <li><a href="Entregables_Profesor_Tutor.php">Entregables</a></li>
  <li><a href="Registrar_lider.php">Proyectos Integradores</a></li>


</ul>
</div>
</div>
</div>          <!--TERMINA CODIGO PARA COLOCAR LA OPCIONES-->

<p style="color:black;text-align:center; font-family:Calibri;">PROYECTOS REGISTRADOS</p>
<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from tacceso_lider where Tutor='$Nombre' order by ID");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
   /*  print_r($Nombre); */
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>


            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>



            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>



            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>


            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <div class="Cuadro_Registrar">
            <div class="Cuadro_Registrar2">
            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>

                <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm table-" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Matricula</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Estatus</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach($persona as $dato){
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->ID; ?></td>
                                <td><?php echo $dato->Nombre; ?></td>
                                <td><?php echo $dato->Matricula; ?></td>
                                <td><?php echo $dato->Grupo; ?></td>
                                <td><?php echo $dato->Objetivo; ?></td>
                                <td><?php echo $dato->Comentarios; ?></td>
                                <td><?php echo $dato->Estatus; ?></td>
                                <td><a class="text-success" href="aceptar_proyecto.php?ID=<?php echo $dato->ID; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?ID=<?php echo $dato->ID; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>



</div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
