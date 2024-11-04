<?php
require 'ProductoController.php';
$productoController = new ProductoController();
$marcas = $productoController->obtenerMarcas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agregar Producto - Tienda Joan</title>
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
        <h1>Agregar Producto</h1>
        <form action="ProductoController.php?action=create" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Producto:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" name="slug" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="features" class="form-label">Características:</label>
                <textarea class="form-control" id="features" name="features" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Imagen del Producto:</label>
                <input type="file" class="form-control" id="cover" name="cover" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Marca:</label>
                <select class="form-control" id="brand" name="brand" required>
                    <option value="">Selecciona una marca</option>
                    <?php foreach ($marcas['data'] as $marca): ?>
                        <option value="<?= htmlspecialchars($marca['id']) ?>"><?= htmlspecialchars($marca['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Crear Producto</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
