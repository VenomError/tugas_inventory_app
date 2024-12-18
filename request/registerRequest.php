<?php
require_once __DIR__ . "/../loadAll.php";

try {
    $user = new User();

    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user->register();

    echo json_encode([
        'status' => 'success',
        'message' => 'Register user Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
