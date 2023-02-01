<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['ID'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['ID'];

    $sentencia = $bd->prepare("select * from tacceso_lider where ID = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

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
                        <label class="form-label">Estatus: </label>
                        <input type="text" class="form-control" name="txtEst" required
                        value="<?php echo $persona->Estatus; ?>">
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

<?php include 'template/footer.php' ?>
