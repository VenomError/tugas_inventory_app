<?php
require_once __DIR__ . "/../../loadAll.php";

try {
    $stock = new StockHistory();

    $stock->product_id = $_POST['product_id'];
    $stock->quantity = (int) $_POST['quantity'];
    $stock->receipt_date =  $_POST['receipt_date'];
    $stock->type = $_POST['type'];

    if ($stock->type == 'stock_in') {
        $stock->stockIn()->create();
    } else if ($stock->type == 'stock_out') {
        $stock->stockOut()->create();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Stock type Error'
        ]);
    }

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
