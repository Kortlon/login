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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<head>
	<title> My website </title>
</head>
<body>
<p></p>
	<a href = "viewcart.php"> view cart </a>
	<p></p>
	<p></p>
	<a href = "logout.php"> Logout </a>
	<p></p>
	<a href = "cdetail.php"> Contact Detail Update </a>
	<br></br>
	<a href = "update.php"> Name Update </a>
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