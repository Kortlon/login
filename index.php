<?php
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
	echo"hello";
	$username = $user_data['user_name'];
	

?>


<html>
<head>
	<title> My website </title>
</head>
<body>
	<p></p>
	<a href = "logout.php"> Logout </a>
	<p></p>
	<a href = "update.php"> Update </a>
	<p></p>
	<a href = "booksearch.php"> Book Search </a>
	<p></p>
	<a href = "reviews.php"> Reviews </a>
	<p></p>
	<a href = "bookbrowse.php"> Browse </a>
	<h1> This is the index page </h1>
	
	<br>
	Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>