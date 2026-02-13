<?php

require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register($data) {
        return $this->userModel->create(
            $data['username'],
            $data['email'],
            $data['password']
        );
    }
}
