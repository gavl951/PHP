<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

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
$gateway = new BranchTableGateway($connection);

$statement = $gateway->getBranchByid($id);
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
        <?php require 'toolbar2.php' ?>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
         <div class="container">
             <h1>Edit Branch Form</h1>
        <form id="editBranchForm" name="editBranchForm" action="editBranch.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table class="table table-condensed" border="1">
                <thead>
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
                            <span id="AddressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Address'])) {
                                    echo $errorMessage['Address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="PhoneNumber" value="<?php
                                if (isset($_POST) && isset($_POST['PhoneNumber'])) {
                                    echo $_POST['PhoneNumber'];
                                }
                                else { echo $row['PhoneNumber'];
                                }
                            ?>" />
                            <span id="PhoneNumberError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['PhoneNumber'])) {
                                    echo $errorMessage['PhoneNumber'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>
                            <input type="text" name="Manager" value="<?php
                                if (isset($_POST) && isset($_POST['Manager'])) {
                                    echo $_POST['Manager'];
                                }
                                else { echo $row['Manager'];
                                }
                            ?>" />
                            <span id="ManagerError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Manager'])) {
                                    echo $errorMessage['Manager'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Hours</td>
                        <td>
                            <input type="text" name="Hours" value="<?php
                                if (isset($_POST) && isset($_POST['Hours'])) {
                                    echo $_POST['Hours'];
                                }
                                else { echo $row['Hours'];
                                }
                            ?>" />
                            <span id="HoursError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Hours'])) {
                                    echo $errorMessage['Hours'];
                                }
                                ?>
                            </span>
                        </td>
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
                            <span id="BranchNoError" class="error">
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
                            <input class="btn btn-default" type="submit" value="Update Branch" name="updateBranch" />
                        </td>
                    </tr>
                </head>
            </table>

        </form>
    </body>
</html>
