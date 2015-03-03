<?php
require_once 'Customer.php';
require_once 'Connection.php';
require_once 'CustomerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

$id = $_POST['id'];
$Name = $_POST['Name'];

$Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
$EmailValid = filter_var($Email, FILTER_VALIDATE_EMAIL);

//$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Email = $_POST['Email'];
$StaffNum= $_POST['StaffNum'];
$Address= $_POST['Address'];

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';


$gateway->updateCustomer($id, $Name, $Address, $Mobile, $Email, $StaffNum);

header('Location: home.php');






