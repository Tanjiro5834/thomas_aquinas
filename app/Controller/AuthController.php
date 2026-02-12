<?php

require_once __DIR__ . '/../Model/User.php';
require_once __DIR__ . '/../Helper/Auth.php';

class AuthController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login($username, $password) {

        if (empty($username) || empty($password)) {
            return ["success" => false, "message" => "All fields are required."];
        }

        $user = $this->userModel->findByUsername($username);

        if (!$user || !password_verify($password, $user['password'])) {
            return ["success" => false, "message" => "Invalid credentials."];
        }

        if ($user['role'] !== 'admin') {
            return ["success" => false, "message" => "Access denied."];
        }

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];

        return ["success" => true, "message" => "Login successful."];
    }

    public function logout() {
        Auth::logout();
    }
}
