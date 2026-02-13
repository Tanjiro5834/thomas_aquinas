<?php

require_once __DIR__ . '/../../app/Controller/PreRegistrationController.php';

header("Content-Type: application/json");

$controller = new PreRegistrationController();
$controller->register();
