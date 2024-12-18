<?php
require_once __DIR__ . "/../../loadAll.php";

try {
    $category = new Category();
    $category->name =  $_POST['name'];

    if (empty($category->name)) {
        throw new Exception('Nama Category Tidak Boleh Kosong');
    }

    $category->create();

    echo json_encode([
        'status' => 'success',
        'message' => 'Created Category Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
