<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Customer Dashboard</h1>
        <table class="table mt-5">
            <button class="btn btn-success float-right">Add New Customer</button>
            <thead class="thead-dark mt-3">
                <tr>
                    <th scope="col">NIC</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="customerData">
            
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
        
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
                                '<a href="edit.php?id=' + customer.id + '" class="btn btn-primary btn-sm mr-2">Edit</a>' + // Adjusted the ID key
                                '<a href="delete.php?id=' + customer.id + '" class="btn btn-danger btn-sm">Delete</a>' +
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

            fetchCustomers();
        });
    </script>
</body>
</html>
