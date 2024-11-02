<?php
session_start();
require 'ProductoController.php';
if (!isset($_GET['id'])) {
    echo "ID de producto no proporcionado.";
    exit();
}
$id = $_GET['id'];
$productoController = new ProductoController();
$productoData = json_decode($productoController->obtenerProductoPorId($id), true)['data'];
if (!$productoData) {
    echo "Producto no encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto - Tienda Joan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Actualizar Producto</h1>
        <form action="ProductoController.php?action=update&id=<?= $id ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($productoData['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug" value="<?= htmlspecialchars($productoData['slug']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($productoData['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="features" class="form-label">Características:</label>
                <textarea class="form-control" id="features" name="features" rows="3" required><?= htmlspecialchars($productoData['features']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Actualizar Producto</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>