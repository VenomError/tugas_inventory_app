<?php

require_once __DIR__ . "/../../loadAll.php";

try {
    $product = new Product();
    $product->id = $_POST['id'];

    $product->delete();

    echo json_encode([
        'status' => 'success',
        'message' => 'Deleted Product Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
