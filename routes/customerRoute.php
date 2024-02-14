<?php

require_once '../controllers/customerController.php';
require_once '../models/customer.php';

$currentUrl = $_SERVER['REQUEST_URI'];

$path = parse_url($currentUrl, PHP_URL_PATH);

$uri = basename($path);


if ($uri === 'save-customer') {
    $controller = new customerController();
    $controller->customerSave();
} else {
    echo "404 Not Found";
}
