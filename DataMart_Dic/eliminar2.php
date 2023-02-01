<?php
    if(!isset($_GET['Nombre'])){
        header('Location: AdministrarIntegrantesBS.php');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['Nombre'];

    $sentencia = $bd->prepare("DELETE FROM tacceso_integrantes where Nombre = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: AdministrarIntegrantesBS.php');
    } else {
        header('Location: AdministrarIntegrantesBS.php');
    }

?>
