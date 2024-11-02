<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'ProductoController.php';
$productoController = new ProductoController();
$response = $productoController->obtenerProductos();
$productos = json_decode($response, true);
if (isset($productos['error'])) {
    echo "<p>Error: " . htmlspecialchars($productos['error']) . "</p>";
    exit();
}
$productos = $productos['data'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            min-width: 200px;
            background-color: #343a40;
            color: white;
            padding: 15px;
            height: 100%;
            position: fixed;
            top: 56px;
            overflow-y: auto;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .content {
            margin-left: 220px;
            padding: 10px;
            flex-grow: 1;
            overflow-y: auto;
            padding-top: 20px;
        }
        .card {
            height: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tienda Joan</a>
            <a class="navbar-brand" href="index.html">Cerrar sesión</a>
        </div>
    </nav>
    <div class="sidebar">
        <h4>Menú</h4>
        <ul class="list-unstyled">
            <li><a href="home.php">Home</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <?php foreach ($productos as $producto) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($producto['cover']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['name']) ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($producto['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($producto['description']) ?></p>
                                <a href="detalle.php?id=<?= $producto['id'] ?>" class="btn btn-primary mt-auto">Detalles</a>
                                <a href="editar_producto.php?id=<?= $producto['id'] ?>" class="btn btn-warning mt-2">Actualizar</a>
                                <form action="ProductoController.php?action=delete&id=<?= $producto['id'] ?>" method="POST" class="mt-2">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="crear_producto.php">
                <button class="btn btn-success mt-3">Agregar Producto</button>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>