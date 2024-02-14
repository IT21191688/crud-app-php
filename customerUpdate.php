<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Customer</h1>
        <form id="customerForm" class="mt-4">
            <div class="form-group">
                <label for="NIC">NIC</label>
                <input type="text" class="form-control" id="NIC" name="NIC" placeholder="Enter NIC" required>
            </div>
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="Age">Age</label>
                <input type="text" class="form-control" id="Age" name="Age" placeholder="Enter Age" required>
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address" required>
            </div>
            <div class="form-group">
                <label for="Salary">Salary</label>
                <input type="text" class="form-control" id="Salary" name="Salary" placeholder="Enter Salary" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch customer data using AJAX
            function fetchCustomer() {
                var customerId = getUrlParameter('id');
                $.ajax({
                    url: './routes/customerRoute.php/get-customer?id=' + customerId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(customer) {
                        $('#NIC').val(customer.nic);
                        $('#Name').val(customer.name);
                        $('#Age').val(customer.age);
                        $('#Address').val(customer.address);
                        $('#Salary').val(customer.salary);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            function getUrlParameter(name) {
                name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
                var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
                var results = regex.exec(location.search);
                return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
            }

            fetchCustomer();

            // Form submission handler
            $('#customerForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: './routes/customerRoute.php/update-customer',
                    method: 'POST',
                    data: formData,
                    dataType: 'text',
                    success: function(response) {
                        alert(response);
                        // Optionally, redirect to another page or perform other actions
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
