<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href="css/styles.css" rel="stylesheet">
        <script type="text/javascript" src="js/customer.js"></script>
        
    </head>
    <body>
        <?php require 'toolbar2.php' ?>
        
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <div class="container">
            <h1>Create Branch Form</h1>
        <form id="createBranchForm" name="createBranchForm" action="createBranch.php" method="POST">
            <table class="table table-condensed" border="1">
                <thead>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="Address" value="" />
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
                            <input type="text" name="PhoneNumber" value="" />
                            <span id="PhoneNumberError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>
                            <input type="text" name="Manager" value="" />
                            <span id="ManagerError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Hours</td>
                        <td>
                            <input type="text" name="Hours" value="" />
                            <span id="HoursError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Branch Number</td>
                        <td>
                            <input type="text" name="BranchNo" value="" />
                            <span id="BranchNoError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <input class="btn btn-default" type="submit" value="Create Branch" name="createBranch" />
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        </form>
    </body>
</html>
