<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'ProductoController.php';

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$productoController = new ProductoController();
$response = $productoController->obtenerProductoPorId($productId);
$producto = json_decode($response, true);

if (isset($producto['error']) || empty($producto)) {
    echo "<p>Error: " . htmlspecialchars($producto['error'] ?? 'Producto no encontrado') . "</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Producto - <?= htmlspecialchars($producto['data']['name']) ?></title>
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
        .mt-5 {
            margin-top: 3rem; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tienda Joan</a>
        </div>
    </nav>

    <div class="sidebar">
        <h4>Menú</h4>
        <ul class="list-unstyled">
            <li><a href="home.php">Home</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="container mt-5"> 
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($producto['data']['cover']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['data']['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($producto['data']['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($producto['data']['description']) ?></p>
                            <h6>Características:</h6>
                            <p><?= htmlspecialchars($producto['data']['features']) ?></p>
                            <a href="home.php" class="btn btn-secondary">Volver a Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
