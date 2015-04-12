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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/programmer.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href="css/styles.css" rel="stylesheet">
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
             <h1>View Branch Form</h1>
        <table class="table table-condensed" border="1">
            <thead>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $row['Address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>PhoneNumber</td>'
                    . '<td>' . $row['PhoneNumber'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager</td>'
                    . '<td>' . $row['Hours'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Hours</td>'
                    . '<td>' . $row['Hours'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Branch Number</td>'
                    . '<td>' . $row['BranchNo'] . '</td>';
                    echo '</tr>';
                ?>
            </thead>
         </div>
        </table>
        <p>
            <a href="editBranchForm.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-default">
                    Edit Branch</button></a>
            <a class="deleteBranch" href="deleteBranch.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">
                    Delete Branch</button></a>
        </p>
    </body>
</html>
