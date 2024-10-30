<?php

class ProductoController {
    private $apiUrl = 'https://crud.jonathansoto.mx/api/products';
    private $authHeader = 'Authorization: Bearer 235|n3rdSnC4K9NIum56L5ojGzsGSuP4Kn0r62YEBluN';

    public function obtenerProductos() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $this->authHeader
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function obtenerProductoPorId($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->apiUrl}/{$id}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $this->authHeader
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function crearProducto($datos) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $datos,
            CURLOPT_HTTPHEADER => array(
                $this->authHeader,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function actualizarProducto($id, $datos) {
        $curl = curl_init();

        $postData = http_build_query($datos);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->apiUrl}/{$id}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                $this->authHeader,
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function eliminarProducto($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->apiUrl}/{$id}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                $this->authHeader,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}

$productoController = new ProductoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'create') {
    $datos = [
        'name' => $_POST['name'],
        'slug' => $_POST['slug'],
        'description' => $_POST['description'],
        'features' => $_POST['features'],
    ];

    $response = $productoController->crearProducto($datos);
    echo $response;

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'update') {
    $id = $_GET['id'];
    $datos = [
        'name' => $_POST['name'],
        'slug' => $_POST['slug'],
        'description' => $_POST['description'],
        'features' => $_POST['features'],
    ];

    $response = $productoController->actualizarProducto($id, $datos);
    echo $response;

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $response = $productoController->eliminarProducto($id);
    echo $response;
}
?>
