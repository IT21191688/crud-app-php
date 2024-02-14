<?php

require_once '../controllers/customerController.php';

$controller = new customerController();

$currentUrl = $_SERVER['REQUEST_URI'];
$path = parse_url($currentUrl, PHP_URL_PATH);
$uri = basename($path);

if ($uri === 'save-customer') {

    $controller->customerSave();

} elseif ($uri === 'get-customers') {

    $customers = $controller->getAllCustomers();


    if ($customers !== null) {
        header('Content-Type: application/json');  
        echo json_encode($customers);
    } else {
        echo json_encode(['error' => 'Failed to retrieve customers']);
    }
} else {

    http_response_code(404);
    echo "404 Not Found";
}
