<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$_SESSION;
include("connection.php");
include("functions.php");


$user_data = check_login($con);
//USER the session to keep track of user making a review on a book
//make reviews an average out of 5 stars
//have a browse section that cuts out books that arent key words
//have sort by options
/*
4 check boxs
    - sort by reviews
    -sort by catergories
    - sort by title
    - sort by publication date

 

make an if to where user enters isbn or book title for the book they want to write review about
then under make if to check if user has already made a review about the book.
*/
$bookisbn = $_POST['isbn'];
$userid = $user_data['id'];



?>
<!DOCTYPE html>
<html>
    <head>
        <title>User makes reviews</title>
    </head>
<style type = "text/css">
#text{
    height: 55px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;
        font-size: 40px;

}
#button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }
#box{
        background-color:grey;
        margin: auto;
        width: 1200px;
        padding: 20px;
    }
    body{
        background-color: #0088a9 ;
    }
</style>
<body>
<a href = "index.php"> Back to main page </a>
<br></br>
<h1>User Reveiws</h1>

<div id ="box">
<h1> Welcome <?php echo $user_data['user_name']; ?>  </h1>
<h2>Enter the ISBN of the Book you want to either Make A Review for, Edit a Review for, or Delete a Review for!!!!</h2>
    <form method="post">
        <label for = "bookisbn"> Book ISBN: </label>
        <input id = "text" type = "text" name = "isbn">

        <!---  Everything below send to the if statement if isbn is found for review   -->
        <p></p>
        <input id = "button" type = "submit" vale = "confirm">
        
        <?php

if(!empty($bookisbn))
{
   
    $isbnq = "select user_id, ISBN from reviews
    where user_id = $userid AND ISBN = $bookisbn limit 1";

    $isbnreal = "select ISBN, id from books
    where ISBN = $bookisbn";
    $isbnrealcheck = mysqli_query($con, $isbnreal);

    $isbnr = mysqli_query($con, $isbnq);
    if($isbnr)
    {
         $isbnr = mysqli_query($con, $isbnq);
         // if review already exist
         if($isbnr && mysqli_num_rows($isbnr) > 0 && mysqli_num_rows($isbnrealcheck) > 0)
         {
            $_SESSION['isbn'] = $bookisbn;
            $_SESSION2['id'] = $bookid;
            header("Location: deleditreview.php");
         }
         //if review doesn't exist
         if($isbnr && mysqli_num_rows($isbnr) < 1 && mysqli_num_rows($isbnrealcheck) > 0)
         {
             $_SESSION2['id'] = $bookid;
            $_SESSION['isbn'] = $bookisbn;
            header("Location: makereview.php");
         }
         else{
             echo"ISBN/Book doesnt exist";
         }
    }
}


?>
</form>
</body>
</html>