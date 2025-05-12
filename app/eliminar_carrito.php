<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../app/index.php");
    exit;
}

$usuario_id = $_SESSION['id'];
$carrito_id = intval($_GET['id']);

$db->query("DELETE FROM carrito WHERE id = $carrito_id AND usuario_id = $usuario_id");

header("Location: carrito.php");
exit;
