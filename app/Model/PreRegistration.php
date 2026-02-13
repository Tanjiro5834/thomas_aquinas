<?php

require_once __DIR__ . '/../Core/Database.php';

class PreRegistration {

    private $db;

    public function __construct() {
        $db = new Database();
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO pre_registrations 
            (first_name, last_name, email, contact_number, grade_level)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sssss",
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['contact_number'],
            $data['grade_level']
        );

        $stmt->execute();

        return $stmt->insert_id;
    }
}
