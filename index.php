<?php
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
	echo"hello";
	$username = $user_data['user_name'];
	

?>



<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Store</title>
	<link rel="stylesheet" href="css/index_page.css">
</head>
<head>
	<title> My website </title>
</head>
<body>
<p></p>
	<a href = "cart.php"> view cart </a>
	<p></p>
	<p></p>
	<a href = "logout.php"> Logout </a>
	<p></p>
	<p></p>
	<a href = "vieworders.php">View Orders </a>
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