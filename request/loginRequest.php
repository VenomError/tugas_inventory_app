<?php
session_start();
require_once __DIR__ . "/../loadAll.php";

try {
    $user = new User();

    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    $userLogin = $user->getUser();

    if (!password_verify($user->password, $userLogin->password)) {
        throw new Exception("Login Failed");
    }

    $_SESSION['auth'] = $userLogin;

    echo json_encode([
        'status' => 'success',
        'message' => 'Login user Success'
    ]);
} catch (\Throwable $th) {
    echo json_encode([
        'status' => 'error',
        'message' => $th->getMessage()
    ]);
}
