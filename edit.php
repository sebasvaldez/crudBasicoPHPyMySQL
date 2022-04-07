<?php include './template/header.php' ?>

<?php

    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conextion.php';
    $codigo = $_GET['codigo'];

    $sentencia =$bd->prepare("select * from persona where codigo = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card ">
                <div class="card-header">
                    Editar Datos:
                </div>
                <form action="editProcess.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label">
                            Nombre:
                        </label>
                        <input type="text" class="form-control" name="txtNombre"  autofocus required value="<?php echo $persona->nombre ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Edad:
                        </label>
                        <input type="number" class="form-control" name="txtEdad" value="<?php echo $persona->edad ?>" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Signo:
                        </label>
                        <input type="text" class="form-control" name="txtSigno" value="<?php echo $persona->signo ?>" autofocus required>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo ?>">
                        <input type="submit" value="Modificar" class="btn btn-success">
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>

<?php include './template/footer.php' ?>