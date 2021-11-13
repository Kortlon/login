<?php
session_start();
$_SESSION;
//$user_data = check_login($con);
include ("connection.php");
include("functions.php");

$review = $_POST['review'];
$stars = $_POST['rstar'];
$isbn = $_SESSION['isbn'];

$userid = $_SESSION['id'];

$bid = "select id from books
        where ISBN = $isbn";
$br = mysqli_query($con, $bid);
$row = mysqli_fetch_row($br);

 echo " book id is ";
 echo  $row[0];
 $bookid = $row[0];

if(!empty($review))
{
    if($stars < 6 && $stars > 0)
    {
        
        $reviewq ="insert into reviews (user_id,ISBN,review,rating,book_id) 
        values ($userid,$isbn,'$review',$stars,$bookid)";
        echo $reviewq;
        mysqli_query($con, $reviewq);
        echo $isbn;
        header("Location: reviews.php");
    }
    else{
        echo"Put in valid star count";
    }

}
else{
    echo"Review field is empty";
}


?>


<!DOCTYPE html>
<html>
    <head>Review make</head>
    <body>
    <style type = "text/css">
#text{
    height: 25px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

}
#textr{
    height: 100px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

}
#box{
        background-color:grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
 #button{
        padding: 10px;
        width: 110px;
        color: rgb(0, 0, 0);
        background-color: lightblue;
        border: none;
    }

</style>
    <p>

        <?php
        //echo $user_data['isbn'];
       // echo"";
      //  echo  $_SESSION['isbn'];
        ?>



    </p>
    <p></p>
	
    <a href = "index.php"> Back to main page </a>
	<p></p>
    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Make Review </div>
            <label for="fname">ISBN:</label>
            <?php echo $_SESSION['isbn']; echo "<br></br>"; echo $_SESSION['book_id'] ;?><br></br>
            <label for="fname">Input Review:</label>
            <input  id = "textr" type = "text" name = "review"><br></br>
            <label for="fname">Rate Stars 1-5:</label>
            <input  id = "text" type = "text" name = "rstar"><br></br>



            <input id = "button" type = "submit"  value = "Submit Review"><br></br>


            
        </form>
    </body>
</html>