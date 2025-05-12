
<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen']) && isset($_POST['nombre_archivo'])) {
    $nombre_archivo = basename($_POST['nombre_archivo']);
    $ruta_destino = "img/" . $nombre_archivo . ".png";
    
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino)) {
        echo "<p style='color:green;'>Imagen subida correctamente como {$ruta_destino}</p>";
    } else {
        echo "<p style='color:red;'>Error al subir la imagen.</p>";
    }
}

$sql = "SELECT id, nombre FROM producto";
$result = $db->query($sql);

echo "<h2>Verificación de imágenes por producto</h2>";
echo "<table border='1' cellpadding='5'><tr><th>ID</th><th>Nombre</th><th>Imagen esperada</th><th>¿Existe?</th><th>Subir imagen</th></tr>";

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
    echo "<td>
        <form method='POST' enctype='multipart/form-data'>
            <input type='hidden' name='nombre_archivo' value='{$nombreImagen}'>
            <input type='file' name='imagen' accept='image/png' required>
            <button type='submit'>Subir</button>
        </form>
    </td>";
    echo "</tr>";
}
echo "</table>";
?>
