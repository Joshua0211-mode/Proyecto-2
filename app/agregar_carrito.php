<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../app/index.php"); // Redirige al login si no está logueado
    exit;
}

$usuario_id = $_SESSION['id'];
$producto_id = intval($_GET['id']);
$cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 1;

// Obtener precio
$sql = "SELECT precio FROM producto WHERE id = $producto_id";
$result = $db->query($sql);

if ($result->num_rows == 0) {
    echo "Producto no encontrado.";
    exit;
}

$producto = $result->fetch_assoc();
$precio = $producto['precio'];
$total = $precio * $cantidad;

// Verificar si ya existe
$sqlExiste = "SELECT id, cantidad FROM carrito WHERE usuario_id = $usuario_id AND producto_id = $producto_id";
$resultExiste = $db->query($sqlExiste);

if ($resultExiste->num_rows > 0) {
    $row = $resultExiste->fetch_assoc();
    $nuevaCantidad = $row['cantidad'] + $cantidad;
    $nuevoTotal = $precio * $nuevaCantidad;

    $sqlUpdate = "UPDATE carrito SET cantidad = $nuevaCantidad, total = $nuevoTotal WHERE id = {$row['id']}";
    $db->query($sqlUpdate);
} else {
    $sqlInsert = "INSERT INTO carrito (usuario_id, producto_id, precio, cantidad, total)
                  VALUES ($usuario_id, $producto_id, $precio, $cantidad, $total)";
    $db->query($sqlInsert);
}

header("Location: dashboard.php");
exit;
