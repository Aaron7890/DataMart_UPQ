<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body>
<?php
if (isset($_POST['Ingresar'])) {
  if (strlen($_POST['Correoelectronico']) >= 1 && strlen($_POST['Contraseña']) >= 1) {
    $Correoelectronico = trim($_POST['Correoelectronico']);
    $Contraseña = trim($_POST['Contraseña']);
    //Cosultar  a la base de datos Alumno
    $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");


    $Consulta = "SELECT * FROM tacceso_integrantes WHERE Contraseña='$Contraseña' and Correo='$Correoelectronico'";
    $resultado = mysqli_query($Conexion, $Consulta);
    $filas = mysqli_num_rows($resultado);

    $resultado2 = mysqli_query($Conexion, "SELECT * FROM tacceso_integrantes WHERE  Correo='$Correoelectronico'");
    $consulta = mysqli_fetch_array($resultado2);

    if ($filas > 0) {
      
      // toast
      echo "<script>
      Toastify({
        text: 'Bienvenido Integrante',
        duration: 3000,
        newWindow: true,
        gravity: 'top', 
        position: 'center', 
        style: {
          fontSize: '23px',
          background: 'linear-gradient(to right, #8383BE, #50A7D9)',
          color: 'white',
          borderRadius: '10px',
          fontFamily: 'sans-serif',
          fontWeight: 'bold',
          padding: '20px',
        },
        stopOnFocus: true,
        onClick: function(){},
      }).showToast();
      </script>";
      // redirigir a la pagina de integrante
      echo "<script>setTimeout(\"location.href='Pagina_Principal_Integrante.php'\",2000);</script>";

      session_start();
      $_SESSION['Correo1'] = $Correoelectronico;

    } else {

      // Producción: $Conexion=mysqli_connect("localhost","jquintana","wS717714CU","bdpintegrador");

      $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");

      $Consulta = "SELECT * FROM tacceso_lider WHERE Contraseña='$Contraseña' and Correo='$Correoelectronico'";
      $resultado = mysqli_query($Conexion, $Consulta);
      $filas = mysqli_num_rows($resultado);
      if ($filas > 0) {
      // toast
      echo "<script>
      Toastify({
        text: 'Bienvenido Lider',
        duration: 3000,
        newWindow: true,
        gravity: 'top', 
        position: 'center', 
        style: {
          fontSize: '23px',
          background: 'linear-gradient(to right, #8383BE, #50A7D9)',
          color: 'white',
          borderRadius: '10px',
          fontFamily: 'sans-serif',
          fontWeight: 'bold',
          padding: '20px',
        },
        stopOnFocus: true,
        onClick: function(){},
      }).showToast();
      </script>";
      // redirigir a la pagina de integrante
      echo "<script>setTimeout(\"location.href='Pagina_Principal_Lider.php'\",2000);</script>";
     
        session_start();

        $_SESSION['Correo1'] = $Correoelectronico;

      } else {
        $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");

        $Consulta = "SELECT * FROM tutores WHERE clave='$Contraseña' and usuario='$Correoelectronico'";
        $resultado = mysqli_query($Conexion, $Consulta);
        $filas = mysqli_num_rows($resultado);
        if ($filas > 0) {
          // toast
        echo "<script>
        Toastify({
          text: 'Bienvenido Tutor',
          duration: 3000,
          newWindow: true,
          gravity: 'top', 
          position: 'center', 
          style: {
            fontSize: '23px',
            background: 'linear-gradient(to right, #8383BE, #50A7D9)',
            color: 'white',
            borderRadius: '10px',
            fontFamily: 'sans-serif',
            fontWeight: 'bold',
            padding: '20px',
          },
          stopOnFocus: true,
          onClick: function(){},
        }).showToast();
        </script>";
        // redirigir a la pagina de integrante
        echo "<script>setTimeout(\"location.href='Pagina_Principal_Profesor_Tutor.php'\",2000);</script>";
        
          session_start();
          $_SESSION['Correo1'] = $Correoelectronico;
        } else {
          $Conexion = mysqli_connect("localhost", "root", "", "bdpintegrador");

          $Consulta = "SELECT * FROM maestros WHERE clave='$Contraseña' and usuario='$Correoelectronico'";
          $resultado = mysqli_query($Conexion, $Consulta);
          $filas = mysqli_num_rows($resultado);
          if ($filas > 0) {
            echo "<script>
            Toastify({
              text: 'Bienvenido Maestro',
              duration: 3000,
              newWindow: true,
              gravity: 'center', 
              position: 'center', 
              style: {
                fontSize: '23px',
                background: 'linear-gradient(to right, #8383BE, #50A7D9)',
                color: 'white',
                borderRadius: '10px',
                fontFamily: 'sans-serif',
                fontWeight: 'bold',
                padding: '20px',
              },
              stopOnFocus: true,
              onClick: function(){},
            }).showToast();
            </script>";
            // redirigir a la pagina de integrante
            echo "<script>setTimeout(\"location.href='Pagina_Principal_Maestro.php'\",2000);</script>";

            session_start();
            $_SESSION['Correo1'] = $Correoelectronico;
          } else {
            echo "<script>
            Toastify({
              text: 'Correo o Contraseña Incorrecta, Intentelo de Nuevo',
              duration: 3000,
              newWindow: true,
              gravity: 'top', 
              position: 'center', 
              style: {
                fontSize: '23px',
                background: 'linear-gradient(to right, #EB3131, #EE4D5F)',
                color: 'white',
                borderRadius: '10px',
                fontFamily: 'sans-serif',
                fontWeight: 'bold',
                padding: '20px',
              },
              stopOnFocus: true,
              onClick: function(){},
            }).showToast();
            </script>";
            // redirigir a la pagina de integrante despues de 2.9 segundos
            echo "<script>setTimeout(\"location.href='Inicio.php'\",2900);</script>";
          }
        }
      }
    }
  } //Termia if de verificar los campos
  else {
    echo "<script>
    Toastify({
      text: 'Todos los campos son obligatorios',
      duration: 3000,
      newWindow: true,
      gravity: 'top', 
      position: 'center', 
      style: {
        fontSize: '23px',
        background: 'linear-gradient(to right, #EB3131, #EE4D5F)',
        color: 'white',
        borderRadius: '10px',
        fontFamily: 'sans-serif',
        fontWeight: 'bold',
        padding: '20px',
      },
      stopOnFocus: true,
      onClick: function(){},
    }).showToast();
    </script>";
    // redirigir a la pagina de integrante despues de 2.3 segundos
    echo "<script>setTimeout(\"location.href='Inicio.php'\",2300);</script>";
  }
} //Termina if de verificar si se presiono el boton ingresar
else {
  echo "<script>
    Toastify({
      text: 'ocurrio un error',
      duration: 3000,
      newWindow: true,
      gravity: 'top', 
      position: 'center', 
      style: {
        fontSize: '23px',
        background: 'linear-gradient(to right, #EB3131, #EE4D5F)',
        color: 'white',
        borderRadius: '10px',
        fontFamily: 'sans-serif',
        fontWeight: 'bold',
        padding: '20px',
      },
      backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
      stopOnFocus: true,
      onClick: function(){},
    }).showToast();
    </script>";
    // redirigir a la pagina de integrante
    echo "<script>setTimeout(\"location.href='Inicio.php'\",3000);</script>";
}
?>
</body>
</html>