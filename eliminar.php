<?php
include "./clases/Conexion.php";
include "./clases/Crud.php";
include "./header.php";

$crud = new Crud();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4 fondoDelete">
                <div class="card-body">

                    <a href="index.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Regresar
                    </a>
                    <h2>Eliminar registro</h2>

                    <table class="table table-bordered">
                        <thead>
                            <th scope="col">Nombre Mascota</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Especie</th>
                            <th scope="col">Raza</th>
                            <th scope="col">Nombre del dueño</th>
                            <th scope="col">Acciones</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $item->mascota; ?></td>
                                <td><?php echo $item->edad; ?></td>
                                <td><?php echo $item->especie; ?></td>
                                <td><?php echo $item->raza; ?></td>
                                <td><?php echo $item->dueño; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="alert alert-danger" role="alert">
                        <p>¿Esta seguro de eliminar este registro?</p>
                        <p>
                            Una vez eliminado no podra ser recuperado!!
                        </p>
                    </div>
                    <form action="./procesos/eliminar.php" method="POST">
                        <input type="text" name="id" value="<?php echo $datos->_id; ?>" hidden>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-user-xmark"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./scripts.php"; ?>