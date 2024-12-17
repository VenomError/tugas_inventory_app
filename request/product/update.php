<?php
require_once __DIR__ . "/../../loadAll.php";

try {
    $product = new Product();
    $product->id = $_POST['id'];
    $product->category_id = $_POST['category_id'];
    $product->name = $_POST['product_name'];
    $product->stock = (int)$_POST['stock'];
    $product->price = (float)$_POST['price'];


    $product->validate();

    $product->update();

    echo json_encode([
        'status' => 'success',
        'message' => 'Created Product Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
