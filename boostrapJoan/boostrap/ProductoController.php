<?php

class ProductoController {
    private $apiUrl = 'https://crud.jonathansoto.mx/api/products';
    private $authToken = '635|dpQ8rIYnu4zuYBZB71sBeAhBrEtTuTZe8M4SGYjQ';

    public function obtenerProductos() {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->authToken
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            return json_encode(['error' => curl_error($curl)]);
        }

        curl_close($curl);
        return $response;
    }
}
