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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href="css/styles.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title></title>
       <!-- <script type="text/javascript" src="js/programmer.js"></script> -->
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
         <div class="container">
             <h1>Edit Customer Form</h1>
        <form id="editCustomerForm" name="editCustomerForm" action="editCustomer.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table class="table table-condensed" border="1">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="Name" value="<?php
                                if (isset($_POST) && isset($_POST['Name'])) {
                                    echo $_POST['Name'];
                                }
                                else { echo $row['Name'];
                                }
                            ?>" />
                            <span id="EmailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Name'])) {
                                    echo $errorMessage['Name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="Address" value="<?php
                                if (isset($_POST) && isset($_POST['Address'])) {
                                    echo $_POST['Address'];
                                }
                                else { echo $row['Address'];
                                }
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Address'])) {
                                    echo $errorMessage['Address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name="Mobile" value="<?php
                                if (isset($_POST) && isset($_POST['Mobile'])) {
                                    echo $_POST['Mobile'];
                                }
                                else { echo $row['Mobile'];
                                }
                            ?>" />
                            <span id="mobileError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Mobile'])) {
                                    echo $errorMessage['Mobile'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="Email" value="<?php
                                if (isset($_POST) && isset($_POST['Email'])) {
                                    echo $_POST['Email'];
                                }
                                else { echo $row['Email'];
                                }
                            ?>" />
                            <span id="EmailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Email'])) {
                                    echo $errorMessage['Email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff Number</td>
                        <td>
                            <input type="text" name="StaffNum" value="<?php
                                if (isset($_POST) && isset($_POST['StaffNum'])) {
                                    echo $_POST['StaffNum'];
                                }
                                else { echo $row['StaffNum'];
                                }
                            ?>" />
                            <span id="staffNumberError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['StaffNum'])) {
                                    echo $errorMessage['StaffNum'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Branch Number</td>
                        <td>
                            <input type="text" name="BranchNo" value="<?php
                                if (isset($_POST) && isset($_POST['BranchNo'])) {
                                    echo $_POST['BranchNo'];
                                }
                                else { echo $row['BranchNo'];
                                }
                            ?>" />
                            <span id="BranchNumberError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['BranchNo'])) {
                                    echo $errorMessage['BranchNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br>
                            <input class="btn btn-default" type="submit" value="Update Customer" name="updateCustomer" />
                        </td>
                    </tr>
                </head>
            </table>

        </form>
    </body>
</html>
