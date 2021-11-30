<style type = "text/css">
    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

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
        width: 300px;
        padding: 20px;
    }
    </style>
<html>
    <h1>Edit Book Details</h1>
    <p></p>
	<a href = "adminpage.php"> Admin Page </a>
	<p></p>
    <a href = "updatebookdetails.php"> Back </a>
    <p></p>
    <?php
    
    ?>


<body onload>
<?php
    //---
    /// gets rid of errors.
    //error_reporting(E_ERROR | E_PARSE);
    session_start();
    $_SESSION;
    include("connection.php");
    include("functions.php");
  $id =  $_SESSION['id'];

//book details
    $cq = "select ISBN, Title, Publication_Date, Price, code, ItemNumber from books
            where id = $id";
    $cqq = mysqli_query($con, $cq);

    if($cqq && mysqli_num_rows($cqq) > 0)
    {
        $r = mysqli_fetch_row($cqq);
        
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $publicationDate = $_POST['publicationDate'];
        $price = $_POST['price'];
        $code = $_POST['code'];
        $itemNumber = $_POST['itemNumber'];

        $pd = date($publicationDate);
        $addit = "update books
                   
                    SET  ISBN = $isbn, Title = '$title', Publication_Date = $pd, Price = $price, code = $code, ItemNumber = $itemNumber
                    where id = $id";
       $ch =  mysqli_query($con, $addit);

       if($ch)
       {
           echo "works";
       }
       else{
           echo "doesn't work";
       }

    }

//
    if(isset($_POST['submit'])){
       header("Location: adminpage.php");
        }
?>
</body>

<div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Book Details</div>

            <label for="isbn">ISBN:</label>
            <input  id = "text" type = "text" name = "isbn"  value = "<?php echo $r[0];?>">

            <label for="isbn">Title:</label>
            <input  id = "text" type = "text" name = "title"  value = "<?php echo $r[1];?>">

            <label for="isbn">Publication Date:</label>
            <input  id = "text" type = "text" name = "publicationDate"  value = "<?php echo $r[2];?>">

            <label for="isbn">Price:</label>
            <input  id = "text" type = "text" name = "price"  value = "<?php echo $r[3];?>">

            <label for="isbn">Code:</label>
            <input id = "text" type = "text" name = "code"  value = "<?php echo $r[4];?>"> 

            <label for="isbn">Item Number:</label>
            <input  id = "text" type = "text" name = "itemNumber"  value = "<?php echo $r[5];?>">


            <input id = "button" type = "submit"  value = "Update" name = "submit"><br></br>

        </form>
</div>

</html>