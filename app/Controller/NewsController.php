<?php
require_once __DIR__ . '/../Models/News.php';

class NewsController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    public function createNews($title, $slug, $content, $author_id) {
        if(empty($title) || empty($slug) || empty($content) || empty($image) || empty($author_id)) {
            throw new InvalidArgumentException("All fields are required.");
        }

        if(!isset($_FILES['image'])) {
            throw new InvalidArgumentException("Image file is required.");
        }

        $imagePath = $this->handleImageUpload($_FILES['image']);
        
        $news = new News();
        return $news->create($title, $slug, $content, $imagePath, $author_id);
    }

    public function handleImageUpload($file){
       if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException("File upload error.");
        }

        // Validate file size (2MB max)
        if ($file['size'] > 2 * 1024 * 1024) {
            throw new RuntimeException("File is too large.");
        }

        // Validate MIME type
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);

        if (!in_array($mime, $allowedTypes)) {
            throw new RuntimeException("Invalid image format.");
        }

        // Create upload directory if not exists
        $uploadDir = dirname(__DIR__, 2) . '/public/uploads/news/' . date('Y') . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate secure unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = bin2hex(random_bytes(16)) . '.' . $extension;

        $destination = $uploadDir . $newName;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new RuntimeException("Failed to move uploaded file.");
        }

        return 'uploads/news/' . date('Y') . '/' . $newName;
    }

    public function getNews() {
        $news = new News();
        return $news->getAll();
    }
}