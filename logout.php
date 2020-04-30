<?php
session_start();

if (isset($_SESSION['usurario'])) {
    session_destroy();
}

header("Location: index.php");