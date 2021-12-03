<?php
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
	//echo"hello";
	$username = $user_data['user_name'];
	

?>

<style>
	body{
		background-color: #0088a9;
	}
</style>
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

	<header>
        <a href="index.php"><img class="logo" src="images/book-logo.png" alt="logo"></a>
        <nav>
            <ul class="navLinks">
				<li><a href="cart.php">Cart</a></li>
				<li><a href="vieworders.php">View Orders</a></li>
				<li><a href="bookbrowse.php">Browse</a></li>
				<li><a href="booksearch.php">Book Search</a></li>
				<li><a href="reviews.php">Reviews</a></li>
				<li><a href="cdetail.php">Contact Details Updates</a></li>
				<li><a href="update.php">Name Update</a></li>
				<li>Welcome, <?php echo $user_data['user_name']; ?></li>
				<li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>
	
</body>
</html>