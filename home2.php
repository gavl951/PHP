<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

$statement = $gateway->getBranches();
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
        <h1>Branches Table</h1>
        <table class="table table-condensed" border="1">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Manager</th>
                    <th>Hours</th>
                    <th>Branch Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['Address'] . '</td>';
                    echo '<td>' . $row['PhoneNumber'] . '</td>';
                    echo '<td>' . $row['Manager'] . '</td>';
                    echo '<td>' . $row['Hours'] . '</td>';
                    echo '<td>' . $row['BranchNo'] . '</td>';
                    echo '<td>'
                    . '<a href="viewBranch.php?id='.$row['id'].'">&nbsp;<button type="button" class="btn btn-default">View</button></a> &nbsp; '
                    . '<a href="editBranchForm.php?id='.$row['id'].'"><button type="button" class="btn btn-default">Edit</button></a> &nbsp;'
                    . '<a class="deleteBranch" href="deleteBranch.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Delete</button></a> &nbsp;'
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br>
        <p><a href="createBranchForm.php"><button type="button" class="btn btn-default">Create Branch</button></a></p>
        </div>
    </body>
    
</html>
