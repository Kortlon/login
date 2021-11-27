<?php
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");
    $user_data = check_login($con);

?>

<html>

<h1>View Cart</h1>
<a href = "index.php"> Back to main page </a>
</html>