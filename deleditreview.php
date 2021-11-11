<?php
session_start();
$_SESSION;

include ("connection.php");
include("functions.php");

$review = $_POST['review'];
$stars = $_POST['rstar'];
$isbn = $_SESSION['isbn'];
$userid = $_SESSION['id'];


$Rreview = "Select review, rating  from reviews 
            where user_id = $userid and ISBN = $isbn ";
$reviewR =  mysqli_query($con, $Rreview);

$rows = mysqli_fetch_row($reviewR);

if(!empty($review))
        {
            if($stars < 6 && $stars > 0)
            {
                
                $editR = "Update reviews
                SET review = '$review', rating = $stars
                where user_id = $userid AND ISBN = $isbn";
                
                mysqli_query($con, $editR);
                
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
    #buttondel{
        padding: 10px;
        width: 110px;
        color: rgb(0, 0, 0);
        background-color: red;
        border: none;
    }

</style>
    <p>


    </p>
    <p></p>
	<a href = "index.php"> Back to main page </a>
	<p></p>
    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Edit Your Review </div>
            <label for="fname">ISBN:</label>
            <?php echo $_SESSION['isbn']?><br></br>
            <label for="fname">Input Review:</label>
            <input  id = "textr" type = "text" name = "review" value = "<?php echo $rows[0];?>" 
            ><br></br>
            <label for="fname">Rate Stars 1-5:</label>
            <input  id = "text" type = "text" name = "rstar"  value = "<?php echo $rows[1]; ?>"><br></br>



            <input id = "button" type = "submit"  value = "Submit Review"><br></br>
            <?php
              echo'<input id = "buttondel" type = "submit" name = delete_review value = "Delete Review">' ; 
              if (isset($_POST['delete_review'])) {
                $del = "delete from reviews
                        where user_id = $userid AND ISBN = $isbn ";

                $delq = mysqli_query($con,$del);
            }
            ?>


            
        </form>
    </body>
</html>