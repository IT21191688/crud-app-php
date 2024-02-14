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

            echo"Success Saved";

            // Redirect or render a success message
            // header("Location: /success");
            // echo "Customer saved successfully!";
        }
    }
}
