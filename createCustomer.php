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

$Name = $_POST['Name'];

$Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
$EmailValid = filter_var($Email, FILTER_VALIDATE_EMAIL);

$Address = $_POST['Address'];
$Mobile = $_POST['Mobile'];
$StaffNum = $_POST['StaffNum'];

$id = $gateway->insertCustomer($Name, $Address, $Mobile, $Email, $StaffNum);

header('Location: home.php');
