<?php
require_once __DIR__ . '/../Core/Database.php';

class Event {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($name, $description, $eventDate, $location) {
        $stmt = $this->db->prepare("
            INSERT INTO events (name, description, event_date, location)
            VALUES (:name, :description, :event_date, :location)
        ");

        return $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':event_date' => $eventDate,
            ':location' => $location
        ]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM events ORDER BY event_date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteEvent($id) {
        $stmt = $this->db->prepare("DELETE FROM events WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function editEvent($id, $title, $description, $date) {
        $stmt = $this->db->prepare("
            UPDATE events
            SET title = :title, description = :description, event_date = :event_date
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':description' => $description,
            ':event_date' => $date
        ]);
    }
}