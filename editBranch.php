<?php
require_once 'Branch.php';
require_once 'Connection.php';
require_once 'BranchTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BranchTableGateway($connection);

$id = $_POST['id'];

$Address = $_POST['Address'];
$PhoneNumber = $_POST['PhoneNumber'];
$Manager= $_POST['Manager'];
$Hours= $_POST['Hours'];
$BranchNo= $_POST['BranchNo'];

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';


$gateway->updateBranch($id, $Address, $PhoneNumber, $Manager, $Hours, $BranchNo);

header('Location: home2.php');






