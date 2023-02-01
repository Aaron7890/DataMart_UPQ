<?php
    print_r($_POST);
    if(!isset($_POST['ID'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['ID'];
    $nombre = $_POST['txtNombre'];
    $matricula = $_POST['txtMat'];
    $grupo = $_POST['txtGrp'];
    $proyecto = $_POST['txtProy'];
    $comentario = $_POST['txtComm'];
    $estatus = $_POST['txtEst'];

    $sentencia = $bd->prepare("UPDATE tacceso_lider SET Nombre = ?, Matricula = ?, Grupo = ? , Objetivo = ?, Comentarios = ?, Estatus = ? where ID = ?;");
    $resultado = $sentencia->execute([$nombre, $matricula, $grupo, $proyecto, $comentario, $estatus, $codigo]);

    if ($resultado === TRUE) {
        header('Location: Registrar_lider.php?mensaje=editado');
    } else {
        header('Location: Registrar_lider.php?mensaje=error');
        exit();
    }

?>
