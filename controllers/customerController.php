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

           // echo"Success Saved";
            header("Location: /Home");
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
}
