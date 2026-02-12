<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once dirname(__DIR__, 2) . '/app/Controller/AuthController.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "success" => false,
        "message" => "Invalid request."
    ]);
    exit;
}

$controller = new AuthController();

$response = $controller->login(
    trim($_POST['username'] ?? ''),
    $_POST['password'] ?? ''
);

echo json_encode($response);
