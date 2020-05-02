<?php 
if (isset($_POST)) {
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    // var_dump($nombre);
    // die();
    
    $sql = "INSERT INTO categorias VALUES(null,'$nombre');";
    $guardar = mysqli_query($db, $sql);
    
    }

    header("Location: index.php");
