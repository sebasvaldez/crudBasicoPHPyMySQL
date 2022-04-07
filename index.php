<?php include './template/header.php' ?>


<?php

include_once './model/conextion.php';
$sentencia = $bd->query('select * from persona');
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);


?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {


            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Error!</strong> Por favor rellena todos los campos!
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {


            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Registrado exitosamente!</strong> Se agregaron los datos del nuevo usuario.
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {


            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Error!</strong> Vuelve aintentarlo.
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {


            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Cambios correctos</strong> Usuario editado satisfactoriamente.
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {


            ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Borrado</strong> Usuario eliminado satisfactoriamente.
                </div>
            <?php
            }
            ?>


            <!-- Fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Edad</th>
                                <th scope='col'>Signo</th>
                                <th scope='col' colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($persona as $dato) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->edad; ?></td>
                                    <td><?php echo $dato->signo; ?></td>
                                    <td><a class="link-success" href="edit.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>


                                    <td><a onclick="return confirm('Estas segurode eliminar el usuario?. Se perderán todos los datos')" class="link-danger" href="delete.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3 "></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos:
                </div>
                <form action="register.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label">
                            Nombre:
                        </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Edad:
                        </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Signo:
                        </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" value="Registrar" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<h2>VOY EN EL MINUTO 1:08</h2>

<?php include './template/footer.php' ?>