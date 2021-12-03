<style type = "text/css">
    #text{

        height: 35px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

    }
    #textbox{
        width: 40px;
    }
   
    #box{
        background-color:grey;
        margin: auto;
        width: 600px;
        padding: 20px;
    }
    #boxs{
        content: " ";
        display: table;
        clear: both;
    }
   
    table{
        border-collapse: collapse;
        width: 75%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: center;
        align-self: center;
    }
    th{
        background-color: #588c7e;
        color: white;

    }
   tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>

<?php

session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$id= $user_data['id'];
echo $id;
echo "<br></br>";
//---------------------------------------------------------
$cartq = "select ISBN, Title, Last_Name, qty, PPU from cart
        where user_id = $id
        
  
      ";
$i = 0;
$cart = mysqli_query($con, $cartq);
echo "<br></br>";

if($cart && mysqli_num_rows($cart) > 0)
{
    echo "items in cart";
    echo "<form method = 'post' action = ''>";
    echo"<table id = 'table1'>
    <tr>
    <th> Quantity</th>
    <th>ISBN</th>
    <th>Title</th>
    <th>Author Last Name</th>
    <th> Quantity </th>
    <th> Price per unit </th>
    </th>";

    while($row = $cart -> fetch_assoc())
    {
        $i = $i + 1;
        echo"
    
        <tr>
        <td>" .$row['qty']." </td>
        <td>" . $row['ISBN']. "</td>
        <td>" . $row["Title"]. "</td>
        <td>" . $row["Last_Name"]. "</td>
        <td>" . $row["qty"]. "</td>
        <td>" . $row["PPU"]. "</td>
    
       
        </tr>
        
        ";
        
    }
    echo "</form>";
    echo"</table>";
    echo "I =:  ";
    echo $i;
    $j = 0;
    $k = $i - 1 ;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $addy = $_POST['addy'];
    $num = $_POST['phonenum'];
    $emails = $_POST['email'];

    if(isset($_POST['submit'])){
   
      
            $se = "select ISBN from cart
                    where user_id = $id";
           $seq = mysqli_query($con, $se);
        
         while($row = $seq -> fetch_assoc())
         {
             echo  $row['ISBN'];
            $R = $row['ISBN'];
            $quatityorder = "select qty, PPU from cart
            where user_id = $id and ISBN = '$R'";

            $quatityoq = mysqli_query($con, $quatityorder);
            $qrs = mysqli_fetch_row($quatityoq);

            $qty = $qrs[0];
            $price = $qrs[1];
            $tp = $qty * $price;
            $addorder = "insert into orders (user_id, value, ISBN, qty, address, phonenum, email) 
            values ($id ,$tp ,'$R', $qty, '$addy', $num, '$emails')";
            mysqli_query($con, $addorder);
            $delstock = "update stock
            SET quantity = quantity - $qty
                        where ISBN = $R
                       ";
            mysqli_query($con, $delstock);

            $deletecart = "delete from cart
                            where user_id = $id";
            mysqli_query($con, $deletecart);
            echo "<br></br>";
            echo "number of J's:    ";
            echo $j;
            echo "<br></br>";

             echo "<br></br>";
         }
          

        header("Location: index.php");
           
        
    }
     



}
//------------------------------------------------------

$userinfo = "select First_Name, Last_Name from users
        where id = $id";
$uinfo = mysqli_query($con, $userinfo);

$in = mysqli_fetch_row($uinfo);
//---------------------------------------------------------------------------
$contact = "select phonenum, email, address from contactdetails
            where userid = $id";

$cin = mysqli_query($con, $contact);

$cn = mysqli_fetch_row($cin);

if($cin && mysqli_fetch_row($cin) == 0)
{
    $cn[0] = '';
    $cn[1] = '';
    $cn[2] = '';

}
//-----------------------------------------------------------------------------

?>
<html>
        <h1>Place order here</h1>
        <p></p>
    <a href = "cart.php"> Back </a>
    <p></p>

    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Contact Information</div>

            <label for="fname">First Name</label>
            <input  id = "text" type = "text" name = "fname"  value = "<?php echo $in[0];?>">

            <label for="fname">Last Name</label>
            <input  id = "text" type = "text" name = "lname"  value = "<?php echo $in[1];?>">

            <label for="fname">Address </label>
            <input  id = "text" type = "text" name = "addy"  value = "<?php echo $cn[2];?>">

            <label for="fname">phone number:</label>
            <input id = "text" type = "text" name = "phonenum"  value = "<?php echo $cn[0];?>"> 

            <label for="fname">email:</label>
            <input  id = "text" type = "text" name = "email"  value = "<?php echo $cn[1];?>">

          


            
            <input id = "button" type = "submit"  value = "Place Order" name = "submit"><br></br>

<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$addy = $_POST['addy'];
$num = $_POST['phonenum'];
$emails = $_POST['email'];

?>
            
        </form>
</div>

</html>
