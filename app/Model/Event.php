<?php
require_once __DIR__ . '/../Core/Database.php';

class Event {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($title, $description, $date) {
        $stmt = $this->db->prepare("
            INSERT INTO events (title, description, event_date)
            VALUES (:title, :description, :event_date)
        ");

        return $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':event_date' => $date
        ]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM events ORDER BY event_date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}