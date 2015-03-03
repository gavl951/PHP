<?php
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$branchGateway = new ManagerTableGateway($connection);

$branches = $branchGateway->getBranches();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/programmer.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>View Branches</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Manager</th>
                    <th>Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $branches->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['Address'] . '</td>';
                    echo '<td>' . $row['PhoneNumber'] . '</td>';
                    echo '<td>' . $row['Manager'] . '</td>';
                    echo '<td>' . $row['Hours'] . '</td>';
                    echo '<td>'
                    . '<a href="viewBranch.php?id='.$row['id'].'">View</a> '
                    . '<a href="editBranchForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="deleteBranch" href="deleteBranch.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $branches->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createBranchForm.php">Create Branch</a></p>
        <?php require 'footer.php'; ?>
    </body>
</html>
