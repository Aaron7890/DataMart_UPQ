<?php

// Conexión a la BD
    //PRODUCCIÓN
    /*
    $host = "localhost";//200.188.3.184";
    $usuario = "jquintana";
    $clave ="wS717714CU";
    $bd="BDPIntegrador";
    
    $conexion = mysqli_connect($host,$usuario,$clave,$bd);
*/

    //LOCAL
    ///*
    $host = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "bdpintegrador";
    
    $conexion = new mysqli($host, $usuario, $clave, $bd);
    //*/
  
    if ($conexion -> connect_errno){
        //die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion -> mysqli_connect_error());
        echo "Nuestro sitio experimenta fallos....";
        exit();
    }

// Consulta a la BD
    $proyectos = "SELECT * FROM tacceso_lider";
    $resProyectos = $conexion -> query($proyectos); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Lib/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/8e4e6f028f.js" crossorigin="anonymous"></script>
    <title>MPI: Estatus de proyectos integradores</title>

    <style>
        body {
            background: url(admin.jpg) no-repeat center center fixed;
            box-sizing: border-box;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .card {
            margin: 7% 25% 1% 25%;
            text-align: center;
        }
        img {
            width: 25%;
        }
    </style>

</head>

<body>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"/>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-52">
				<div class="card">
					<div class="card-body d-flex justify-content-between align-items-center">
                        <h4>Detalle de proyectos integradores</h4>
						<!--<a href="Pagina_Principal_Profesor_Tutor.php" class="btn btn-primary btn-sm">Cerrar</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <section>
        <!--<table class = "table">-->
            <table class="table table-sm table-dark">
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <!--<th>Correo</th>-->
                <th>Grupo</th>
                <th>Tutor</th>
                <th>Proyecto</th>
                <th>Objetivo</th>
                <th>Objetivo_cuatrimestral</th>	
                <th>Estatus</th>			
                <th>Comentarios</th>
            </tr>   

            <?php
                while ($registroProyectos = $resProyectos -> fetch_array(MYSQLI_BOTH))
                {
                    echo'<tr>
                            <td>'.$registroProyectos['Matricula'].'</td>
                            <td>'.$registroProyectos['Nombre'].'</td>
                            <td>'.$registroProyectos['Grupo'].'</td>
                            <td>'.$registroProyectos['Tutor'].'</td>
                            <td>'.$registroProyectos['Nombre_Proyecto'].'</td>
                            <td>'.$registroProyectos['Objetivo'].'</td>
                            <td>'.$registroProyectos['Objetivo_cuatrimestral'].'</td>
                            <td>'.$registroProyectos['Estatus'].'</td>
                            <td>'.$registroProyectos['Comentarios'].'</td>
                         </tr>';
                }
            ?>
            
        </table>
        
    </section>
    <footer>
    </footer>
 </body>
</html>