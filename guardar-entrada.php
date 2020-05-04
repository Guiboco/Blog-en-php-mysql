<?php
if (isset($_POST)) {
    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    
    $usuario = $_SESSION["usuario"]["id"];
    // var_dump($usuario);
    // die();

    $errores = array();

    // Validar los datos antes de guardarlos

    // Validar el campo titulo
    if (empty($titulo)) {
        $errores['titulo'] = "El titulo no es válido";
    }

    // Validar el campo descripcion
    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripcion no es válida";
    }

    // Validar el campo titulo
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores['categoria'] = "La categoria no es válida";
    }
}


if (count($errores) == 0) {
    $sql = "INSERT INTO entradas VALUES(null, '$usuario', $categoria, '$titulo', '$descripcion', CURDATE());";

    $guardar = mysqli_query($db, $sql);
    // var_dump($guardar);
    // die();
} else {
    $_SESSION["errores_entrada"] = $errores;
}

header("Location: index.php");
