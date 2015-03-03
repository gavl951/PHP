<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
if (isset($_SESSION['username'])) {
    echo '<p><a href="home.php"><button type="button" class="btn btn-default pull-left">Home</button></a></p>';
    echo '<p><a href="logout.php"><button type="button" class="btn btn-default ">Logout</button></a></p>';
}
else {
    echo '<p><a href="index.php">Home</a></p>';
    echo '<p><a href="login.php">Login</a></p>';
}