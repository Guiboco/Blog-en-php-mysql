<?php

function mostrarError($errores, $campo)
{
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
    }
    return $alerta;
}

function borrarErrores()
{
    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;

    }
    
    if (isset($_SESSION['actualizado'])) {
        $_SESSION['actualizado'] = null;
        $borrado = true;

    }

    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }


    return $borrado;
}

function conseguirCategorias($conexion)
{
    $sql = " SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $resultado = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
    };

    return $categorias;
}

function conseguirEntradas($conexion)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
    INNER JOIN categorias c ON e.categoria_id = c.id
    ORDER BY e.id DESC LIMIT 4";
    $entradas =  mysqli_query($conexion, $sql);
   
    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }

    return $entradas;
}

function conseguirTodasEntradas($conexion, $limit = null)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
    INNER JOIN categorias c ON e.categoria_id = c.id
    ORDER BY e.id DESC";

    if ($limit !=null) {
        $sql.= "LIMIT 4";
    }

    $entradas =  mysqli_query($conexion, $sql);
    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }

    return $entradas;
}

