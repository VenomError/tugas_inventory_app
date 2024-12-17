<?php
require_once __DIR__ . "/../../loadAll.php";

try {
    $product = new Product();
    $product->id = $_POST['id'];
    $product->in_stock = (float)$_POST['in_stock'] == '0' ? '1' : '0';

    $product->updateInStock();

    echo json_encode([
        'status' => 'success',
        'message' => 'Updated Product Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
