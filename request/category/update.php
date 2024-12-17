<?php
require_once __DIR__ . "/../../loadAll.php";

try {
    $category = new Category();
    $category->name =  $_POST['name'];
    $category->id =  $_POST['id'];

    if (empty($category->name) && empty($category->id)) {
        throw new Exception('Nama Category atau ID Tidak Boleh Kosong');
    }

    $category->update();

    echo json_encode([
        'status' => 'success',
        'message' => 'Updated Category Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
