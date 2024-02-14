
<?php
session_start();
//include 'header.php';
include './config/db-connect.php';

if (isset($_POST['submit'])) {
    $nic = mysqli_real_escape_string($con, $_POST['nic']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);

    $sql = "INSERT INTO `customer` (nic, name,age, address, salary)
            VALUES ('$nic', '$name','$age', '$address', '$salary')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Customer was Saved!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Customer</title>
</head>
<body>


<form method="post" class="container col-md-6 border border-success mt-5 p-5">
  <hr>
  <h2 class="mt-3 mb-3 text-primary text-center font-weight-bold">Customer Form</h2>
  <hr>
  <div class="form-group">
    <label for="NIC">NIC</label>
    <input type="text" class="form-control" id="NIC"  placeholder="Enter Nic" require>
  </div>
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="Name"  placeholder="Enter Name" require>
  </div>
  <div class="form-group">
    <label for="Age">Age</label>
    <input type="text" class="form-control" id="Age"  placeholder="Enter Age" require>
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" id="Address"  placeholder="Enter Address" require>
  </div>
  <div class="form-group">
    <label for="Salary">Salary</label>
    <input type="text" class="form-control" id="Salary"  placeholder="Enter Salary" require>
  </div>

  <div class="row ">
    <div class="col">
        <button type="submit" class="mt-3 btn btn-primary col-md-12">Save Customer</button>
    </div>

    <div class="col">
        <button type="button" class="mt-3 btn btn-danger col-md-12">Cancel</button>
    </div>
  </div>
    
 
</form>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>