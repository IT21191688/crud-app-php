<?php

include "../config/db-connect.php";

class customer {

    private $nic;
    private $name;
    private $age;
    private $address;
    private $salary;

    public function __construct($nic, $name, $age, $address, $salary) {
        $this->nic = $nic;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->salary = $salary;
    }

    public function getNIC() {
        return $this->nic;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getSalary() {
        return $this->salary;
    }

    // Setters
    public function setNIC($nic) {
        $this->nic = $nic;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

 public function save() {
    // Include database connection
    include "../config/db-connect.php";

    try {
        // Prepare SQL statement with question mark placeholders
        $sql = "INSERT INTO customer (nic, name, age, address, salary) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        $stmt->bind_param('ssiss', $this->nic, $this->name, $this->age, $this->address, $this->salary);

        $stmt->execute();
    
        $stmt->close();
        
        $con->close();
        
        echo "Success Saved"; // Optionally, display a success message
    } catch(mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


}
?>

