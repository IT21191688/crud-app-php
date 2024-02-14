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
} elseif ($uri === 'get-customer') {
    if (isset($_GET['id'])) {
        $customerData = $controller->getCustomerById($_GET['id']);
        if ($customerData !== null) {
            header('Content-Type: application/json');
            echo json_encode($customerData);
        } else {
            echo json_encode(['error' => 'Failed to retrieve customer data']);
        }
    } else {
        echo json_encode(['error' => 'Customer ID not provided']);
    }
}
 elseif ($uri === 'update-customer') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nic = $_POST['NIC'];
        $name = $_POST['Name'];
        $age = $_POST['Age'];
        $address = $_POST['Address'];
        $salary = $_POST['Salary'];

        $success = $controller->updateCustomer($nic, $name, $age, $address, $salary);
        if ($success) {
            echo "Customer updated successfully!";
        } else {
            echo "Failed to update customer!";
        }
    } else {
        echo "Invalid request method!";
    }
} else {
    http_response_code(404);
    echo "404 Not Found";
}

?>
