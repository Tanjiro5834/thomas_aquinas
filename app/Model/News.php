<?php
require_once __DIR__ . '/../Core/Database.php';

class News {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($title, $content) {
        $stmt = $this->db->prepare("
            INSERT INTO news (title, content)
            VALUES (:title, :content)
        ");

        return $stmt->execute([
            ':title' => $title,
            ':content' => $content
        ]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM news ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}