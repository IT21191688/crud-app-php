<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Customer Dashboard</h1>
        <table id="customerTable" class="table">
            <a href="./customerView.php" class="btn btn-success float-right mt-3 mb-3">ADD new Customer</a>
            <thead>
                <tr>
                    <th>NIC</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="customerData">
                <!-- Customer data will be inserted here dynamically -->
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch customer data using AJAX
            function fetchCustomers() {
                $.ajax({
                    url: './routes/customerRoute.php/get-customers',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#customerData').empty();

                        $.each(data, function(index, customer) {
                            var row = '<tr>' +
                                '<td>' + customer.nic + '</td>' +
                                '<td>' + customer.name + '</td>' +
                                '<td>' + customer.age + '</td>' +
                                '<td>' + customer.address + '</td>' +
                                '<td>' + customer.salary + '</td>' +
                                '<td>' +
                                  '<a href="customerUpdate.php?id=' + customer.nic + '" class="btn btn-primary btn-sm mr-2">Edit</a>' + 
                               '<button type="button" class="btn btn-danger btn-sm delete-btn" data-nic="' + customer.nic + '">Delete</button>' +

                                '</td>' +
                                '</tr>';
                            $('#customerData').append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Fetch customers when the page loads
            fetchCustomers();

            // Delete customer event handler
           // Delete customer event handler
$(document).on('click', '.delete-btn', function() {
    var customerNIC = $(this).data('nic'); // Retrieve NIC from data-nic attribute
    if (confirm('Are you sure you want to delete this customer?')) {
        $.ajax({
            url: './routes/customerRoute.php/delete-customer',
            method: 'POST',
            data: { nic: customerNIC },
            dataType: 'text',
            success: function(response) {
                alert(response);
                // Refresh customer data after deletion
                fetchCustomers();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});

        });
    </script>
</body>
</html>

