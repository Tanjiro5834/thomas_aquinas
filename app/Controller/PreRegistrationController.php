<?php

require_once __DIR__ . '/../Model/PreRegistration.php';

class PreRegistrationController {

    private $preRegistrationModel;

    public function __construct() {
        $this->preRegistrationModel = new PreRegistration();
    }

    public function register() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['contact_number']) || empty($data['grade_level'])) {
            //throw new Exception("All fields are required.");
            echo json_encode(["success" => false]);
            return;
        }

        $preReg = new PreRegistration();
        $id = $preReg->create($data);
        $queueNumber = "PR-" . str_pad($id, 5, '0', STR_PAD_LEFT);
        echo json_encode([
            "success" => true,
            "queue_number" => $queueNumber
        ]);
    }
}