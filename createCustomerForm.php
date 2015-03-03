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
        <script type="text/javascript" src="js/customer.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <div class="container">
            <h1>Create Customer Form</h1>
        <form id="createCustomerForm" name="createCustomerForm" action="createCustomer.php" method="POST">
            <table class="table table-condensed" border="1">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="Name" value="" />
                            <span id="NameError" class="error">
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
                            <input type="text" name="Address" value="" />
                            <span id="AddressError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name="Mobile" value="" />
                            <span id="MobileError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="Email" value="" />
                            <span id="EmailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Staff Number</td>
                        <td>
                            <input type="text" name="StaffNum" value="" />
                            <span id="StaffNumError" class="error"></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <input class="btn btn-default" type="submit" value="Create Customer" name="createCustomer" />
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        </form>
    </body>
</html>
