<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method Not Allowed'
    ]);
    exit;
}

require_once __DIR__ . '/../../../app/Controller/EnrollmentController.php';

try {
    $controller = new EnrollmentController();

    $success = $controller->enroll(
        $_POST['firstName'] ?? '',
        $_POST['lastName'] ?? '',
        $_POST['gradeLevel'] ?? '',
        $_POST['guardianNumber'] ?? ''
    );

    if ($success) {
        http_response_code(201);
        echo json_encode([
            'success' => true,
            'message' => 'Enrollment successful.'
        ]);
    } else {
        throw new Exception('Enrollment failed.');
    }

} catch (Exception $e) {

    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Server error.'
    ]);
}
