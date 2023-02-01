<?php include 'template/header.php' ?>

<?php
session_start();
    if(!isset($_GET['ID'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
/* printf($usuario); */
    include_once 'model/conexion.php';
    $codigo = $_GET['ID'];

    $sentencia = $bd->prepare("select * from tacceso_lider where ID = ?");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
    //obtener usuario
    if(($_SESSION['Correo1'])!=""){
        $Correo=$_SESSION['Correo1'];
        $Conexion=mysqli_connect("localhost","root","","bdpintegrador");
        $resultado=mysqli_query($Conexion,"SELECT * FROM tutores WHERE Usuario='$Correo'");
        while($consulta=mysqli_fetch_array($resultado)){
          $Nombre=$consulta['Nombre'];
        }
       $matricula_lider= ($persona->Matricula);
        $lider_info=mysqli_query($Conexion,"SELECT * FROM tacceso_lider where ID=$codigo" );
        $Info=mysqli_query($Conexion,"SELECT Nombre,Grupo,Matricula FROM tacceso_integrantes where Matriculalider=$matricula_lider" );

?>

<!DOCTYPE html>
<html>
<head>
<title>Pagina principal-Sitio alumnado</title>
<link rel="stylesheet" href="css/Pagina_Principal_Profesor_Tutor.css">
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
<P style="color:red; font-size:12px;font-style:italic;font-family:arial narrow ">SITIO DEL PROFESOR-Tutor </P>
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
    <td><?php  echo $Nombre;?></th>
  </tr>


  <tr>
    <th>Tipo de usuario</th>
    <td> Tutor </th>
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
		<li><a href="Pagina_Principal_Profesor_Tutor.php">Página Principal</a></li>
		<li><a href="Asignacion_Profesor_Tutor.php">Asignación</a></li>
	    <li><a href="Entregables_Profesor_Tutor.php">Entregables</a></li>
        <li><a href="Registrar_lider.php">Proyecto Integradores</a></li>
		<li><a href="proyectos_tutor.php" target="_blank">Reporte proyectos</a></li>
	</ul>
</div>
</div>
</div>         


<div class="Cuadro_Principal">
<div class="Cuadro_Principal2">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required
                        value="<?php echo $persona->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Matricula: </label>
                        <input type="text" class="form-control" name="txtMat" required
                        value="<?php echo $persona->Matricula; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo: </label>
                        <input type="text" class="form-control" name="txtGrp" required
                        value="<?php echo $persona->Grupo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proyecto: </label>
                        <input type="text" class="form-control" name="txtProy" required
                        value="<?php echo $persona->Objetivo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comentarios: </label>
                        <input type="text" class="form-control" name="txtComm" required
                        value="<?php echo $persona->Comentarios; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estatus: </label>
                        <select name="txtEst" value="<?php echo $persona->Estatus; ?>">
                            <option value="Aprobado">Aprobado</option>
                            <option value="No validado">No validado</option>
                        </select>

                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="ID" value="<?php echo $persona->ID; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Datos de equipo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label >Matricula Lider:</label>
  <p> <?php echo  $matricula_lider ?></p>
  <label >Lider:</label>
  <p> <?php  echo $persona->Nombre;?></p>
  <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm table-" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Matricula</th>
                                <th scope="col">Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         while ($dato=mysqli_fetch_array($Info)) {
                           ?>
                            <tr>
                                <td><?php echo $dato['Nombre']; ?></td>
                                <td><?php echo $dato['Matricula']; ?></td>
                                <td><?php echo $dato['Grupo']; ?></td>
                            </tr>

                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>



<?php
}
else{
	header("location:Inicio.html");
}
?>

<?php include 'template/footer.php' ?>
