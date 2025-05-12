
<?php
require_once 'conexion.php';

$sql = "SELECT id, nombre FROM producto";
$result = $db->query($sql);

echo "<h2>Verificación de imágenes por producto</h2>";
echo "<table border='1' cellpadding='5'><tr><th>ID</th><th>Nombre</th><th>Imagen esperada</th><th>¿Existe?</th></tr>";

while ($row = $result->fetch_assoc()) {
    $nombre = $row['nombre'];
    $nombreImagen = strtolower(str_replace(' ', '_', $nombre));
    $imgPath = "img/{$nombreImagen}.png";
    $existe = file_exists($imgPath) ? "✅ Sí" : "❌ No";

    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$nombre}</td>";
    echo "<td>{$imgPath}</td>";
    echo "<td>{$existe}</td>";
    echo "</tr>";
}
echo "</table>";
?>
