<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$statement = $gateway->getCustomerById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/programmer.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
         <div class="container">
             <h1>View Customer Form</h1>
        <table class="table table-condensed" border="1">
            <thead>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $row['Name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $row['Address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Mobile</td>'
                    . '<td>' . $row['Mobile'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Email</td>'
                    . '<td>' . $row['Email'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Staff Number</td>'
                    . '<td>' . $row['StaffNum'] . '</td>';
                    echo '</tr>';
                ?>
            </thead>
         </div>
        </table>
        <p>
            <a href="editCustomerForm.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-default">
                    Edit Customer</button></a>
            <a class="deleteCustomer" href="deleteCustomer.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">
                    Delete Customer</button></a>
        </p>
    </body>
</html>
