<?php

require_once '../controllers/customerController.php';
require_once '../models/customer.php';

$currentUrl = $_SERVER['REQUEST_URI'];

// Parse the URL and extract the path
$path = parse_url($currentUrl, PHP_URL_PATH);

// Extract the last part of the path (after the last '/')
$uri = basename($path);

echo "$uri";

if ($uri === 'save-customer') {
    $controller = new customerController();
    $controller->customerSave();
} else {
    echo "404 Not Found";
}
