<?php
require_once __DIR__ . '/../Core/Database.php';

class Enrollment {
     private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($firstName, $lastName, $gradeLevel, $guardianNumber) {
        $stmt = $this->db->prepare("
            INSERT INTO enrollments (firstName, lastName, gradeLevel, guardianNumber)
            VALUES (:firstName, :lastName, :gradeLevel, :guardianNumber)
        ");

        return $stmt->execute([
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':gradeLevel' => $gradeLevel,
            ':guardianNumber' => $guardianNumber
       ]);
    }

    public function getPendingQueue() {
        $stmt = $this->db->prepare("SELECT * FROM enrollments WHERE status = :status ORDER BY id DESC");
        $stmt->execute([':status' => 'pending']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNextPending() {
        $stmt = $this->db->prepare("
            SELECT *
            FROM enrollments
            WHERE status = 'pending'
            ORDER BY id ASC
            LIMIT 1
        ");

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}