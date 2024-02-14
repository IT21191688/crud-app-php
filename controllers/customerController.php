<?php

include "../models/customer.php";

class customerController {
    public function customerSave() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nic = $_POST['NIC'];
            $name = $_POST['Name'];
            $age = $_POST['Age'];
            $address = $_POST['Address'];
            $salary = $_POST['Salary'];

            $customer = new customer($nic, $name, $age, $address, $salary);
            $customer->save();
            
            header("Location: /customerHome.php");
            echo "Customer saved successfully!";
        }
    }

    public function getAllCustomers() {
        include "../config/db-connect.php";

        try {
            $sql = "SELECT * FROM customer";
            $stmt = $con->query($sql);

            $customers = $stmt->fetch_all(MYSQLI_ASSOC);
            $con->close();

            return $customers;
        } catch(mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

 public function getCustomerById($id) {
    include "../config/db-connect.php"; 

    try {
        $stmt = $con->prepare("SELECT * FROM customer WHERE nic = ?");
        $stmt->bind_param("s", $id); // Assuming 'nic' is a string, so use 's' for binding
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the customer data as an associative array
        $customerData = $result->fetch_assoc();

        $stmt->close();
        $con->close();

        return $customerData; 

    } catch (mysqli_sql_exception $e) {
        // Handle any exceptions
        echo "Error: " . $e->getMessage();
        return null;
    }
}


   public function updateCustomer($nic, $name, $age, $address, $salary) {
    include "../config/db-connect.php";

    try {
        $stmt = $con->prepare("UPDATE customer SET name = ?, age = ?, address = ?, salary = ? WHERE nic = ?");
        $stmt->bind_param("ssssi", $name, $age, $address, $salary, $nic);
        $stmt->execute();
        $stmt->close();
        $con->close();

        return true; 
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

}
?>
