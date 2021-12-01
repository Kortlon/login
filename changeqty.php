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

<?php
session_start();
$_SESSION;
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$qty =  $_SESSION['qty'];
$id = $user_data['id'];

$stock = "select quantity from stock
        where ISBN = $qty ";
$sq = mysqli_query($con,$stock);

$r = mysqli_fetch_row($sq);



$limit = $r[0];


$carts = "select qty from cart
        where user_id = $id and ISBN = $qty ";
$cq = mysqli_query($con, $carts);

$cr = mysqli_fetch_row($cq);


if(isset($_POST['submit'])){

    $current = $_POST['qty'];
    echo $current;
    if($current > $limit)
    {
        echo " please enter a Quantity less than:  ";
        echo $limit;
    }
    else{
        $update = "Update cart
                    SET qty = $current
                    where user_id = $id AND ISBN = $qty
                    ";
      $uq =   mysqli_query($con, $update);
      if($uq)
      {
          echo "works";
      }
      else{
          echo "nope";
      }
    }

    


   // header("Location: adminpage.php");
    }
?>
    

<html>
    <h1>Change quantity</h1>
    <p></p>
	<a href = "cart.php"> back</a>
	<p></p>
    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Contact Information</div>

            <label for="fname">ISBN:</label>
            <?php echo $qty;?><br></br>


            <label for="fname">Quantity</label>
            <input  id = "text" type = "text" name = "qty"  value = "<?php echo $cr[0];?>">

            
            <input id = "button" type = "submit"  value = "Update" name = "submit"><br></br>


            
        </form>
</div>
</html>

