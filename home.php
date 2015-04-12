<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomers();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/customer.js"></script>
        <link href="css/styles.css" rel="stylesheet">
        <title></title>
    </head>
   
    <body>
    
        <?php require 'toolbar2.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <div class="container">
        <h1>Customer Table</h1>
        <table class="table table-condensed" border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Staff Number</th>
                    <th>Branch Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['Name'] . '</td>';
                    echo '<td>' . $row['Address'] . '</td>';
                    echo '<td>' . $row['Mobile'] . '</td>';
                    echo '<td>' . $row['Email'] . '</td>';
                    echo '<td>' . $row['StaffNum'] . '</td>';
                    echo '<td>' . $row['BranchNo'] . '</td>';
                    echo '<td>'
                    . '<a href="viewCustomer.php?id='.$row['id'].'">&nbsp;<button type="button" class="btn btn-default">View</button></a> &nbsp; '
                    . '<a href="editCustomerForm.php?id='.$row['id'].'"><button type="button" class="btn btn-default">Edit</button></a> &nbsp;'
                    . '<a class="deleteCustomer" href="deleteCustomer.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Delete</button></a> &nbsp;'
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br>
        <p><a href="createCustomerForm.php"><button type="button" class="btn btn-default">Create Customer</button></a></p>
        </div>
    </body>
    
</html>
