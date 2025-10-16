<?php
include "./clases/Conexion.php";
include "./clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);
$idMongo = $datos->_id;
?>

<?php include "./header.php"; ?>
<div class="container mt-4">
    <div class="row mb-3 justify-content-center">
        <div class="card justify-content-center" style="width: 25rem; background-color: rgba(255, 255, 255, 0.5);">
            <form action="./procesos/actualizar.php" method="POST">
                <input type="text" hidden value="<?php echo $idMongo ?>" name="id">
                <img class="mx-auto d-block" src="./public/img/Itadori.png" height="95" width="125px">
                <div class="card-body row justify-content-center">

                    <h1 class="fw-bold text-center">Editar Mascota</h1>

                    <label for="mascota" class="form-label">Nombre Mascota</label>
                    <input type="text" class="form-control" name="mascota" id="mascota" value="<?php echo $datos->mascota ?>">

                    <label for="edad" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad" value="<?php echo $datos->edad ?>">

                    <label for="especie" class="form-label">Especie</label>
                    <input type="text" class="form-control" name="especie" id="especie" value="<?php echo $datos->especie ?>">

                    <label for="raza" class="form-label">Raza</label>
                    <input type="text" class="form-control" name="raza" id="raza" value="<?php echo $datos->raza ?>">

                    <label for="dueño" class="form-label">Nombre del Dueño</label>
                    <input type="text" class="form-control" name="dueño" id="dueño" value="<?php echo $datos->dueño ?>">

                    <button class="btn btn-warning mt-3">
                        <i class="fa-solid fa-floppy-disk"></i> Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "./scripts.php"; ?>