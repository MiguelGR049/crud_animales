<?php session_start();
    include "./clases/Conexion.php";
    include "./clases/Crud.php";
    $crud = new Crud();
    $datos = $crud->mostrarDatos();

    $mensaje = '';
    if (isset($_SESSION['mensaje_crud'])) {
        $mensaje = $crud->mensajesCrud($_SESSION['mensaje_crud']);
        unset($_SESSION['mensaje_crud']);
    }
?>

<?php include "./header.php"; ?>
<div class="container mt-5">
    
    <div class="row mt-5 justify-content-center">
        <div class="col mt-4 text-center">
            <div class="row mt-5 justify-content-center">
                <div class="card p-3 rounded-3 mb-4" style="background-color: rgba(255, 255, 255, 0.5);">
                    <div class="corner top-left">
                        <img src="public/img/adorno04.png" alt="Adorno esquina superior izquierda">
                    </div>
                    <div class="corner top-right">
                        <img src="public/img/adorno03.png" alt="Adorno esquina superior derecha">
                    </div>
                    <div class="corner bottom-left">
                        <img src="public/img/adorno01.png" alt="Adorno esquina inferior izquierda">
                    </div>
                    <div class="corner bottom-right">
                        <img src="public/img/adorno02.png" alt="Adorno esquina inferior derecha">
                    </div>
                    <h1 class="fw-bold text-center mb-4">Lista de Animalitos</h1>
                    <p>
                        <a href="./agregar.php" class="btn btn-success"><i class="fa-solid fa-user-plus"></i> Agregar nueva mascota</a>
                    </p>
                    <div class="content">
                        <table class="table table-hover p-3 rounded-3">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre Mascota</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Especie</th>
                                    <th scope="col">Raza</th>
                                    <th scope="col">Nombre del dueño</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($datos as $item) {
                                ?>
                                    <tr>
                                        <td><?php echo $item->mascota; ?></td>
                                        <td><?php echo $item->edad; ?></td>
                                        <td><?php echo $item->especie; ?></td>
                                        <td><?php echo $item->raza; ?></td>
                                        <td><?php echo $item->dueño; ?></td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <form class="mb-0 me-2" action="./actualizar.php" method="POST">
                                                <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                                                <button class="btn btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </form>
                                            <form action="./eliminar.php" method="POST">
                                                <input type="text" hidden value="<?php echo $item->_id ?>" name="id">
                                                <button class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "./scripts.php"; ?>

<script>
	let mensaje = <?php echo $mensaje; ?>;
	console.log(mensaje);
</script>