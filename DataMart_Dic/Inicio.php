<!DOCTYPE html>
<html>

<head>
  <title>Inicio de sesión</title>
  <meta charset="utf-8">
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <link rel="stylesheet" href="css/Inicio.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body>
  <!-- pongo aqui abajo el codigo php por que necesita ser despues de la importacion de los archivos de "toastify" la libreria para las alertas -->
  <!-- codigo para  registro INTEGRANTE-->
  <?php
  $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");
  if (isset($_POST['Registrarse_Integrante'])) {


  if (
    strlen($_POST['Nombre']) >= 1 &&
    strlen($_POST['Grupo1']) >= 1 &&
    strlen($_POST['Contraseña']) >= 1 &&
    strlen($_POST['Matricula2']) >= 1
  ) {

    $nombre = trim($_POST['Nombre']);
    $grupo = trim($_POST['Grupo1']);
    $contraseña = trim($_POST['Contraseña']);
    $matricula = trim($_POST['Matricula2']);

    $Consulta = "SELECT * FROM tacceso_integrantes WHERE
          Nombre='$nombre' and Matricula='$matricula'";
    $resultado = mysqli_query($Conexion, $Consulta);
    $filas = mysqli_num_rows($resultado);

    if ($filas > 0) {
      ?>
        <script>
          Toastify({
            text: "Ups! al parecer ya estas registrado",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "left", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(to right, #ff0000, #000000)",
            },
            onClick: function () { } // Callback after click
          }).showToast();
        </script>
        <?php
    }
    //////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
    else {
      $Consulta2 = "INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Estatus)
      VALUES('$nombre','$matricula@upq.edu.mx','$grupo','$contraseña','$matricula','NA')";
      $resultado2 = mysqli_query($Conexion, $Consulta2);

      if ($resultado2) {
      ?>
      <script>
        Toastify({
          text: "Registro exitoso",
          duration: 3000,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "left", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
            fontSize: "22px",
          },
          onClick: function () { } // Callback after click
        }).showToast();
      </script>
      <?php
      }
       else {
      ?>
      <script>
        Toastify({
          text: "Ah ocurrido un error",
          duration: 3000,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "left", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #ff5f6d, #ffc371)",
          },
          onClick: function () { } // Callback after click
        }).showToast();
      </script>
    <?php
      }
    }
  } else {
    ?>
    <script>
      Toastify({
        text: "Por favor llene todos los campos",
        duration: 3000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "left", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #ff5f6d, #ffc371)",
        },
        onClick: function () { } // Callback after click
      }).showToast();
    </script>
  <?php
  ?>

  <script> // este no se ejecutara por que no se cumple la condicion de que los campos esten llenos
    Toastify({
      text: "Llene todos los campos",
      duration: 3000,
      close: true,
      gravity: "top", // `top` or `bottom`
      position: "left", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
        fontSize: '22px';
      },
      onClick: function () { } // Callback after click
    }).showToast();
  </script>
  <?php
  }
  }

  ?>

  <!-- codigo para  registro LIDER-->
 <?php
include("conexion_bd.php");
session_start();
if (isset($_POST[''])) {


    if (
        strlen($_POST['Nombre']) >= 1 && strlen($_POST['Correo']) >= 1 && strlen($_POST['Grupo']) >= 1 &&
        strlen($_POST['Contrasena']) >= 1 && strlen($_POST['Matricula']) >= 1 && strlen($_POST['Matricula_lider']) >= 1
    ) {

        $nombre = trim($_POST['Nombre']);
        $email = trim($_POST['Correo']);
        $grupo = trim($_POST['Grupo']);
        $contraseña = trim($_POST['Contrasena']);
        $matricula = trim($_POST['Matricula']);
        $matricula_lider = trim($_POST['Matricula_lider']);

        //////////////////////////Verificar si se han registrado con el mismo numero de matricula///////////////////////////////

        $Consulta = "SELECT * FROM tacceso_integrantes WHERE
          Nombre='$nombre' and Correo='$email' and Matricula='$matricula'";
        $resultado = mysqli_query($conexion, $Consulta);
        $filas = mysqli_num_rows($resultado);

        if ($filas > 0) {
            echo '<script>';
            echo 'alert("!ups parece que alguien ya se ha registrado tu correo y matricula");';
            echo 'window.location.href="Inicio.php";';
            echo '</script>';
        }

        //////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
        else {

            $Consulta2 = "INSERT INTO tacceso_integrantes(Nombre,Correo,Grupo,Contraseña,Matricula,Matriculalider)
          VALUES('$nombre','$email','$grupo','$contraseña','$matricula','$matricula_lider')";
            $resultado2 = mysqli_query($conexion, $Consulta2);

            $_SESSION['Matriculalider'] = $matricula_lider;
            if ($resultado2) {
                echo '<script>';
                echo 'alert("Registro exitoso");';
                echo 'window.location.href="Inicio.php";';
                echo '</script>';
            } else {
                echo "Ha ocurrido un error";
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    } ///Corchete para verificar if de campos
    else {

        echo '<script>';
        echo 'alert("Llene todos los campos");';
        echo 'window.location.href="Inicio.php";';
        echo '</script>';


    }

} ///Verificar si se presiono el boton

/////////////////////////Llenar el registro con los datos/////////////////////////////////////////////////////////

if (isset($_POST['Registrarse_Lider'])) {


    if (
        strlen($_POST['Nombre']) >= 1 && strlen($_POST['Correo']) >= 1 && strlen($_POST['Grupo']) >= 1 &&
        strlen($_POST['Contrasena']) >= 1 && strlen($_POST['MatriculaLider']) >= 1
    ) {

        $nombre = trim($_POST['Nombre']);
        $email = trim($_POST['Correo']);
        $grupo = trim($_POST['Grupo']);
        $contraseña = trim($_POST['Contrasena']);
        $matricula = trim($_POST['MatriculaLider']);
        $tutor = trim($_POST['Tutor']);

        ////////////////////////////Verificar si se han registrado con el mismo numero de matricula///////////////////////////////

        $Consulta = "SELECT * FROM tacceso_lider WHERE
          Nombre='$nombre' and Correo='$email' and Matricula='$matricula'";
        $resultado = mysqli_query($conexion, $Consulta);
        $filas = mysqli_num_rows($resultado);

        if ($filas > 0) {

           ?>
           <script>
            Toastify({
              text: "Ups parece que alguien ya se ha registrado tu correo y matricula",
              duration: 3000,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "left", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
              },
              onClick: function () { } // Callback after click
            }).showToast();
           </script>
            <?php
        }

        //////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
        else {

            $Consulta2 = "INSERT INTO tacceso_lider(Nombre,Correo,Grupo,Contraseña,Matricula,Tutor)
          VALUES('$nombre','$email','$grupo','$contraseña','$matricula','$tutor')";
            $resultado2 = mysqli_query($conexion, $Consulta2);
            if ($resultado2) {
              ?>
              <script>
                Toastify({
                  text: "Registro exitoso, ya puede iniciar sesion!",
                  duration: 3000,
                  close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "left", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                  },
                  onClick: function () { } // Callback after click
                }).showToast();
              </script>
              <?php
            } else {
                echo "Ha ocurrido un error";
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    } ///Corchete para verificar if de campos
    else {
       ?>
        <script>
          Toastify({
            text: "Llene todos los campos",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "left", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(to right, #ff5f6d, #ffc371)",
            },
            onClick: function () { } // Callback after click
          }).showToast();
        </script>
        <?php
    }

}

/////////////////////////Llenar el registro con los datos/////////////////////////////////////////////////////////

if (isset($_POST['Registrarse_Profesor'])) {


    if (
        strlen($_POST['Nombre']) >= 1 &&
        strlen($_POST['Correo']) >= 1 &&
        strlen($_POST['Contraseña']) >= 1 &&
        isset($_POST['opcion_maestro']) >= 1 &&
        isset($_POST['clave_registro']) >= 1
    ) {


        $nombre = trim($_POST['Nombre']);
        $email = trim($_POST['Correo']);
        $contraseña = trim($_POST['Contraseña']);
        $opcion_maestro = trim($_POST['opcion_maestro']);
        $clave_registro = trim($_POST['clave_registro']);

        if ($clave_registro == "ra7avPrW") {



            if ($opcion_maestro == "Maestro_tutor") {


                ////////////////////////////Verificar si se han registrado con el mismo numero de matricula///////////////////////////////

                $Consulta = "SELECT * FROM tacceso_profesor WHERE
          Nombre='$nombre' and Correo='$email'";
                $resultado = mysqli_query($conexion, $Consulta);
                $filas = mysqli_num_rows($resultado);

                if ($filas > 0) {
                    echo '<script>';
                    echo 'alert("!ups parece que alguien ya se ha registrado tu correo y nombre");';
                    echo 'window.location.href="Registro_Profesor.html";';
                    echo '</script>';



                }

                //////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
                else {

                    $Consulta2 = "INSERT INTO tacceso_profesor(Nombre,Correo,Contraseña,Tipo_usuario)
          VALUES('$nombre','$email','$contraseña','Tutor')";
                    $resultado2 = mysqli_query($conexion, $Consulta2);

                    if ($resultado2) {
                        echo '<script>';
                        echo 'alert("Registro exitoso");';
                        echo 'window.location.href="Inicio.php";';
                        echo '</script>';
                    } else {
                        echo "Ha ocurrido un error";
                    }
                }
            } ////llave que verifica si se escogio la opcion de maestro-tutor
            else { ///else que inserta los datos si no se escogio la opcion de maestro tutor




                $Consulta = "SELECT * FROM tacceso_profesor WHERE
          Nombre='$nombre' and Correo='$email'";
                $resultado = mysqli_query($conexion, $Consulta);
                $filas = mysqli_num_rows($resultado);

                if ($filas > 0) {
                    echo '<script>';
                    echo 'alert("!ups parece que alguien ya se ha registrado tu correo y nombre");';
                    echo 'window.location.href="Registro_Profesor.html";';
                    echo '</script>';



                }

                //////////////////////////////////////Ingresar datos una ves confirmado los datos////////////////////////////////
                else {

                    $Consulta2 = "INSERT INTO tacceso_profesor(Nombre,Correo,Contraseña,Tipo_usuario)
          VALUES('$nombre','$email','$contraseña','Maestro')";
                    $resultado2 = mysqli_query($conexion, $Consulta2);

                    if ($resultado2) {
                        echo '<script>';
                        echo 'alert("Registro exitoso");';
                        echo 'window.location.href="Inicio.php";';
                        echo '</script>';
                    } else {
                        echo "Ha ocurrido un error";
                    }
                }
            }
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        } /// llave que verifica la clave de registro
        else {
            echo '<script>';
            echo 'alert("La clave de registro es incorrecta");';
            echo 'window.location.href="Registro_Profesor.html";';
            echo '</script>';
        }
    } ///Corchete para verificar if de campos
    else {
        echo '<script>';
        echo 'alert("Llene todos los campos");';
        echo 'window.location.href="Registro_Profesor.html";';
        echo '</script>';
    }

}
?>

  <div class="container right-panel-active">
    <!-- inicio de sesion -->
    <div class="container__form container--signin">
      <form action="Inicio_sesion.php" method="POST" class="form" id="form2">
        <div class="header">
          <div class="logo__header">
            <img src="Imagenes/Logo_mecatronica.png" alt="">
          </div>
          <div class="texto__header">
            <h2 class="form__title">Iniciar Sesión</h2>
            <p>Ingrese los datos en los campos,en caso de no tener cuenta haga click en el boton de registrarse en la
              parte derecha</p>
          </div>
        </div>
        <input class="input" type="text" name="Correoelectronico" placeholder="Correo/Usuario" />
        <input class="input" type="Password" name="Contraseña" placeholder="Contraseña" />
        <button id="btnIngresar" class="learn-more" type="submit" name="Ingresar">
          <span class="circle" aria-hidden="true">
            <span class="icon arrow"></span>
          </span>
          <span class="button-text">Ingresar</span>
        </button>
      </form>
    </div>

    <div class="container__form container--signup">
      <!-- en este div se seleccionara el tipo de registro y dependiendo de este select con el archivo login.js se ocultaran o mostrar los inputs debidos para el tipo de registro -->
      <div class="formRegister" id="form1">
        <select name="Tipo de registro" id="selectRegistro">
          <option value="">Tipo de registro</option>
          <option value="Lider">Lider</option>
        </select>
      </div>

      <div class="registroIntegrante">
        <!-- codigo para el boton 'cargar datos' del registro integrante -->
        <?php
          $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");
          if (isset($_POST['Cargar_Datos'])) {
            if (strlen($_POST['Matricula2']) >= 1) { // strlen esto sirve para que no se ingrese vacio
              $Matricula2 = $_POST['Matricula2'];
              $Consulta = "SELECT * FROM alumnos WHERE Ncontrol='$Matricula2'";
              $Resultado = mysqli_query($Conexion, $Consulta);
              if ($Resultado->num_rows > 0) {
                while ($Fila = $Resultado->fetch_assoc()) {
                  $Nombre = $Fila['Nombre'];
                  $Grupo = $Fila['Grupo'];
                  $Matricula = $Fila['Ncontrol'];
                }
          ?>
        <script>
          Toastify({
            text: "¡Alumno encontrado!, vuelva a seleccionar Integrante",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "left", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              fontSize: "22px",
            },
            onClick: function () { } // Callback after click
          }).showToast();
        </script>
        <?php
            } else {
          ?>
            <script>
                    Toastify({
                      text: "Matricula no encontrada, verifique que la matricula sea correcta",
                      duration: 3000,
                      close: true,
                      gravity: "top", // `top` or `bottom`
                      position: "left", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        fontSize: "22px",
                      },
                      onClick: function () { } // Callback after click
                    }).showToast();
             </script>
           <?php
              }
            }
          }
        ?>
        <h2 style="text-align: center; color: white;">Registro de Integrante </h2>
        <ol id="listaInstrucciones">
          <li>1.-Ingrese tu matricula</li>
          <li>2.-Presiona 'Cargar Datos'</li>
          <li>3.-Verifica que tus datos sean correctos</li>
          <li>4.-Genera tu contraseña</li>
          <li>5.-Presiona el boton 'Registrarse'</li>
          <li style="margin-right: 10px;"><span style="color: red;">Nota:</span> Asegurese que el campo matricula este vacio antes de ingresar algo, El cursor debe aparecer en medio, como en el campo de contraseña, si no es asi, seleccione y borre lo que tenga el campo matricula</li>
        </ol>
        <form action="Inicio.php" method="post" class="formDatosIntegrante">
          <button id="btnCargarDatos" type="submit" name="Cargar_Datos">Cargar Datos</button>
          <label for="matricula">Matricula</label>
          <input id="matricula" type="text" name="Matricula2" maxlength="9" value="
              <?php
              if (isset($Matricula2)) {
                echo $Matricula2;
              }
              ?>
              ">

          <label for="nombre">Nombre</label>
          <input id="nombre" type="text" name="Nombre" value="
              <?php
              if (isset($Nombre)) {
                echo $Nombre;
              }
              ?>
              " readonly>

          <label for="grupo">Grupo</label>
          <input id="grupo" type="text" name="Grupo1" max="3" value="
              <?php
              if (isset($Grupo)) {
                echo $Grupo;
              }
              ?>
              " readonly>

          <label for="password">Contraseña</label>
          <input id="password" type="password" name="Contraseña">

          <input type="submit" value="Registrarse" name="Registrarse_Integrante">

        </form>
      </div>

      <div class="registroLideres">
        <h2 style="text-align: center; color: white;">Registro de Lider </h2>
        <ol id="listaInstrucciones">
          <li>1.-Ingrese tu matricula</li>
          <li>2.-Presiona 'Cargar Datos'</li>
          <li>3.-Confirma que tus datos sean correctos</li>
          <li>5.- Crea la contraseña para tu cuenta</li>
          <li>5.- Presiona el boton 'Registrarse'</li>
        </ol>
        <form method="post" action="Inicio.php" class="formDatosIntegrante">
        <button id="btnCargarDatos" type="submit" name="Cargar_DatosLider">Cargar Datos</button>
        <?php
          $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");
          if (isset($_POST['Cargar_DatosLider'])) {
            if (strlen($_POST['MatriculaLider']) >= 1) { // strlen esto sirve para que no se ingrese vacio
              $MatriculaLider = $_POST['MatriculaLider'];
              $Consulta = "SELECT * FROM alumnos WHERE Ncontrol='$MatriculaLider'";
              $Resultado = mysqli_query($Conexion, $Consulta);
              if ($Resultado->num_rows > 0) {
                while ($Fila = $Resultado->fetch_assoc()) {
                  $Nombre = $Fila['Nombre'];
                  $Grupo = $Fila['Grupo'];
                  $Matriculalider = $Fila['Ncontrol'];
                  // generar el correo de la forma MatriculaLider@upq.edu.mx
                  $CorreoLider = $Matriculalider . "@upq.edu.mx";
                }
          ?>
        <script>
          Toastify({
            text: "¡Alumno encontrado!, vuelva a seleccionar Lider",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "left", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              fontSize: "22px",
            },
            onClick: function () { } // Callback after click
          }).showToast();
        </script>
        <?php
            } else {
          ?>
            <script>
                    Toastify({
                      text: "Matricula no encontrada, verifique que la matricula sea correcta",
                      duration: 3000,
                      close: true,
                      gravity: "top", // `top` or `bottom`
                      position: "left", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                        background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        fontSize: "22px",
                      },
                      onClick: function () { } // Callback after click
                    }).showToast();
             </script>
           <?php
              }
            }
          }
        ?>
          <label for="Contraseña">Matricula</label>
          <input id="matricula" type="text" name="MatriculaLider" value="<?php if (isset($Matriculalider)) {echo $Matriculalider;}?>">

          <label for="nombreLider">Nombre</label>
          <input id="nombreLider" type="text" name="Nombre" value="<?php if (isset($Nombre)) {echo $Nombre;}?>" readonly>

          <label for="grupoLider">Grupo</label>
          <input id="grupoLider" type="text" name="Grupo" value="<?php if (isset($Grupo)) {echo $Grupo;}?>" readonly>

          <label for="CorreoIns">Correo Institucional</label>
          <input id="CorreoIns" type="text" name="Correo" value="<?php if (isset($CorreoLider)) {echo $CorreoLider;}?>" readonly>

          <label for="Contraseña">Contraseña</label>
          <input id="Contraseña" type="Password" name="Contrasena">

          <label for="Tutor">Tutor</label>
          <select name="Tutor">
            <?php
              $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");
              $Consulta = "SELECT * FROM tutores";
              $Resultado = mysqli_query($Conexion, $Consulta);
              if ($Resultado->num_rows > 0) {
                while ($Fila = $Resultado->fetch_assoc()) {
                  $Nombre = $Fila['Nombre'];
                  echo "<option value='$Nombre'>$Nombre</option>";
                }
              }
            ?>
          </select>

          <input type="submit" value="Registrarse" name="Registrarse_Lider">
        </form>
      </div>
    </div>



    <div class="container__overlay">
      <div class="overlay">
        <div class="overlay__panel overlay--left">
          <button class="btn" id="signIn">Iniciar Sesión</button>
        </div>
        <div class="overlay__panel overlay--right">
          <button class="btn" id="signUp">Registrarse</button>
        </div>
      </div>
    </div>

  </div>
  <script src="js/animacionLogin.js"></script>
  <script src="js/login.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
