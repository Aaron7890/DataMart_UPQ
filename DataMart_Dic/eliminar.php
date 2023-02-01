<?php
    if(!isset($_GET['ID'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['ID'];

    $sentencia = $bd->prepare("DELETE FROM tacceso_lider where ID = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: Registrar_lider.php?mensaje=eliminado');
    } else {
        header('Location: Registrar_lider.php?mensaje=error');
    }

?>
