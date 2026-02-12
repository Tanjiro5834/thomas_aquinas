<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Model/Enrollment.php';

class EnrollmentController {

    private $enrollmentModel;

    public function __construct() {
        $this->enrollmentModel = new Enrollment();
    }

    public function enroll($firstName, $lastName, $gradeLevel, $guardianNumber) {
        if (empty($firstName) || empty($lastName) || empty($gradeLevel) || empty($guardianNumber)) {
            throw new Exception("Required fields are missing.");
        }
        
        $enrollment = new Enrollment();
        return $enrollment->create($firstName, $lastName, $gradeLevel, $guardianNumber);
    }
}