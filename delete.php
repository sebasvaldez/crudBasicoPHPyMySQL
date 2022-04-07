<?php 
    //siempre verificar si existe el codigo!
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conextion.php';
    $codigo= $_GET['codigo'];

    $sentencia = $bd->prepare('DELETE FROM persona where codigo=?;');
    $resultado=$sentencia->execute([$codigo]);

    if($resultado===true){
        header('Location: index.php?mensaje=eliminado');
    }else{
        header('Location: index.php?mensaje=error');
    }

?>