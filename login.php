<?php
// Iniciar la sesión y la conexión a la base de datos
require_once 'includes/conexion.php';


if (isset($_POST)) {

    // Borrar error antiguo
    if (isset($_SESSION['error_login'])) {
        session_unset($_SESSION['error_login']);
    }

    // Recojo datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1 ";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        // var_dump($usuario);
        // die();
        // Comprobar la contraseña / cifrarla de nuevo
        $verify = password_verify($password, $usuario['password']);

        if ($verify) {

            // Utilizar una sesión para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;
        } else {

            // Si algo falla enviar una sesión con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    } else {

        // Mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }
}

// Redirigir al index
header('Location: index.php');
