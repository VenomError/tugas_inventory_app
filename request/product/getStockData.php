<?php
require_once __DIR__ . "/../../loadAll.php";

try {
    $product = new Product();

    $data = $product->getForChart();


    echo json_encode(
        [
            "status" => "success",
            'message' => '',
            'data' => $data,
        ]
    );
} catch (\Throwable $th) {

    echo json_encode(
        [
            "status" => "error",
            'message' => $th->getMessage(),
            'data' => [],
        ]
    );
}
