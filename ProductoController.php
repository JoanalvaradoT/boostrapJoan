<?php
class ProductoController
{
    private $apiUrl = 'https://crud.jonathansoto.mx/api/products';
    private $authHeader = 'Authorization: Bearer 48|u3noQ6HXhichOp5zDicIvyGxz0MyC7NZQVaXkb5P';

    public function obtenerProductos()
    {
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

    public function obtenerProductoPorId($id)
    {
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

    public function crearProducto($datos)
    {
        $curl = curl_init();
        $filePath = $_FILES['cover']['tmp_name'];
        $fileName = $_FILES['cover']['name'];

        $datos['cover'] = new CURLFile($filePath, mime_content_type($filePath), $fileName);

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
                $this->authHeader
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function obtenerMarcas()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 48|u3noQ6HXhichOp5zDicIvyGxz0MyC7NZQVaXkb5P',
                'Cookie: XSRF-TOKEN=eyJpdiI6Im5pQzhIZUlYeXI2NDlwS3g3eWtNNWc9PSIsInZhbHVlIjoidmNSVDJ0NmtNVzBiUisvYUdTSGhjVDNORCtQcndRVjR5czU4VGM4T1hDaUVqamR1VG5mYlgwTjdNYW92Y2VhZFZDVmJ3UWNuajdGRmZ2RXpGN2tVT3lKMGxzeXlTWjhJRklBRkRDOW5Xb1NiKy85cnhxYXpCUTV1cTU4bDlFZ2MiLCJtYWMiOiI3OTY3NzM2MTBhYmNmMmJhYzY0OTk5MzMwNDE2MWYxNDZmNDg3NmEzOGFhMzgyMTQwNThkNzNmNGQwNTJhOGI4IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6IjNFNHRudXBVZHpJV0dta2FDQkZYYVE9PSIsInZhbHVlIjoicDVDTGxNQkh4MWMrNjhTNzFObGMxeHovNHJKdE5wdzk4NzB5RW1JSjU4Z09mVXBzTklhYkNzWmZUc1E0cjUvbXdSSFlIellCb3hjeUZqUmZEWHl6dzF1Z0FWbVNRdU5qT1RoYkhsdkRKU0xLWE1EcWNTZjR5Q29SNEZBUEV5VzgiLCJtYWMiOiI3N2NkMjdmZTJkYjlkOGM1MjZmMTQ4MmQ0Y2NiMGY4NzljM2U2NGRlMWQwNDQzNmQwZmIyZTExNjI5NDFiOTI3IiwidGFnIjoiIn0%3D'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    public function actualizarProducto($id, $datos)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->apiUrl}/{$id}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query($datos),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                $this->authHeader,
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function eliminarProducto($id)
    {
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

        if (curl_errno($curl)) {
            echo 'Error en cURL: ' . curl_error($curl);
            return false;
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        // Comprobamos si la respuesta es exitosa
        if ($httpCode === 200) {
            return $response;
        } else {
            echo "Error al eliminar el producto. Código HTTP: $httpCode. Respuesta: $response";
            return false;
        }
    }
}

$productoController = new ProductoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $datos = [
                'name' => $_POST['name'],
                'slug' => $_POST['slug'],
                'description' => $_POST['description'],
                'features' => $_POST['features'],
                'cover' => $_FILES['cover']
            ];
            $response = $productoController->crearProducto($datos);

            $responseData = json_decode($response, true);
            if (isset($responseData['message']) && $responseData['message'] === 'Registro creado correctamente') {
                header("Location: /boostrapJoan/boostrap/home.php");
                exit();
            } else {
                echo "Error al crear el producto: " . ($responseData['message'] ?? 'Error desconocido');
            }
            break;

        case 'delete':
            if (isset($_POST['id'])) {
                $response = $productoController->eliminarProducto($_POST['id']);

                if ($response) {
                    echo "Producto eliminado correctamente.";
                } else {
                    echo "Error al eliminar el producto.";
                }
            } else {
                echo "ID de producto no proporcionado.";
            }
            break;
    }
}
?>