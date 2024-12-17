<?php
require_once __DIR__ . "/../../loadAll.php";


try {
    $category = new Category();
    $category->id =  $_POST['id'];

    if (empty($category->id)) {
        throw new Exception('Id Category Tidak Boleh Kosong');
    }

    $category->delete();

    echo json_encode([
        'status' => 'success',
        'message' => 'Deleted Category Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
