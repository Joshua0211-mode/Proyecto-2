
<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$usuario_id = $_SESSION['id'];
$mensaje = "";

// Marcar como principal
if (isset($_GET['principal'])) {
    $id = intval($_GET['principal']);
    $db->query("UPDATE direcciones SET principal = 0 WHERE usuario_id = $usuario_id");
    $db->query("UPDATE direcciones SET principal = 1 WHERE id = $id AND usuario_id = $usuario_id");
    header("Location: perfil.php");
    exit;
}

// Eliminar dirección
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $db->query("DELETE FROM direcciones WHERE id = $id AND usuario_id = $usuario_id");
    header("Location: perfil.php");
    exit;
}

// Obtener dirección a editar si aplica
$editando = false;
$dirEditar = null;
if (isset($_GET['editar'])) {
    $editando = true;
    $idEditar = intval($_GET['editar']);
    $res = $db->query("SELECT * FROM direcciones WHERE id = $idEditar AND usuario_id = $usuario_id");
    $dirEditar = $res->fetch_assoc();
}

// Guardar o actualizar dirección
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alias = $db->real_escape_string($_POST['alias']);
    $direccion = $db->real_escape_string($_POST['direccion']);
    $codigo_postal = $db->real_escape_string($_POST['codigo_postal']);
    $ciudad = $db->real_escape_string($_POST['ciudad']);
    $pais = $db->real_escape_string($_POST['pais']);
    $telefono = $db->real_escape_string($_POST['telefono']);
    $principal = isset($_POST['principal']) ? 1 : 0;

    if ($principal) {
        $db->query("UPDATE direcciones SET principal = 0 WHERE usuario_id = $usuario_id");
    }

    if (!empty($_POST['editar_id'])) {
        $idEdit = intval($_POST['editar_id']);
        $sql = "UPDATE direcciones SET alias='$alias', direccion='$direccion', codigo_postal='$codigo_postal',
                ciudad='$ciudad', pais='$pais', telefono='$telefono', principal=$principal
                WHERE id=$idEdit AND usuario_id=$usuario_id";
    } else {
        $sql = "INSERT INTO direcciones (usuario_id, alias, direccion, codigo_postal, ciudad, pais, telefono, principal)
                VALUES ($usuario_id, '$alias', '$direccion', '$codigo_postal', '$ciudad', '$pais', '$telefono', $principal)";
    }

    $db->query($sql);
    header("Location: perfil.php");
    exit;
}

$direcciones = $db->query("SELECT * FROM direcciones WHERE usuario_id = $usuario_id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil - Direcciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">📍 Mis Direcciones</h2>

    <?php while ($dir = $direcciones->fetch_assoc()): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5><?= htmlspecialchars($dir['alias']) ?> <?= $dir['principal'] ? '(Principal)' : '' ?></h5>
                <p><?= nl2br(htmlspecialchars($dir['direccion'])) ?></p>
                <p><?= $dir['ciudad'] ?>, <?= $dir['pais'] ?> | CP: <?= $dir['codigo_postal'] ?></p>
                <p>📞 <?= $dir['telefono'] ?></p>
                <div class="d-flex justify-content-end">
                    <?php if (!$dir['principal']): ?>
                        <a href="?principal=<?= $dir['id'] ?>" class="btn btn-sm btn-outline-success mr-2">Marcar como principal</a>
                    <?php endif; ?>
                    <a href="?editar=<?= $dir['id'] ?>" class="btn btn-sm btn-outline-primary mr-2">Editar</a>
                    <a href="?eliminar=<?= $dir['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar esta dirección?');">Eliminar</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

    <hr>
    <?php if ($mensaje): ?>
        <div class="alert alert-success"><?= $mensaje ?></div>
    <?php endif; ?>

    <?php
    $editando = isset($dirEditar);
    ?>
    <h4 class="mt-4"><?= $editando ? '✏️ Editar Dirección' : '➕ Agregar Nueva Dirección' ?></h4>
    <form method="POST" class="mt-3">
        <input type="hidden" name="editar_id" value="<?= $editando ? $dirEditar['id'] : '' ?>">
        <div class="form-group">
            <label>Alias</label>
            <input type="text" name="alias" class="form-control" required value="<?= $editando ? htmlspecialchars($dirEditar['alias']) : '' ?>">
        </div>
        <div class="form-group">
            <label>Dirección completa</label>
            <textarea name="direccion" class="form-control" required><?= $editando ? htmlspecialchars($dirEditar['direccion']) : '' ?></textarea>
        </div>
        <div class="form-group">
            <label>Código postal</label>
            <input type="text" name="codigo_postal" class="form-control" value="<?= $editando ? $dirEditar['codigo_postal'] : '' ?>">
        </div>
        <div class="form-group">
            <label>Ciudad</label>
            <input type="text" name="ciudad" class="form-control" value="<?= $editando ? $dirEditar['ciudad'] : '' ?>">
        </div>
        <div class="form-group">
            <label>País</label>
            <input type="text" name="pais" class="form-control" value="<?= $editando ? $dirEditar['pais'] : '' ?>">
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?= $editando ? $dirEditar['telefono'] : '' ?>">
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="principal" class="form-check-input" id="principal"
                <?= ($editando && $dirEditar['principal']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="principal">Usar como principal</label>
        </div>
        <button type="submit" class="btn btn-success">
            <?= $editando ? 'Actualizar Dirección' : 'Guardar Dirección' ?>
        </button>
        <a href="carrito.php" class="btn btn-secondary">← Seguir comprando</a>
        <?php if ($editando): ?>
            <a href="perfil.php" class="btn btn-secondary ml-2">Cancelar</a>
        <?php endif; ?>
    </form>
    
</div>
</body>
</html>
            