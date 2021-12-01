<!---
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
    --->
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$id= $user_data['id'];
echo $id;
$cartq = "select ISBN, Title, Last_Name, PPU, qty from cart
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
    <th> Delete</th>
    <th>ISBN</th>
    <th>Title</th>
    <th>Author Last Name</th>
    <th> Price per Book </th>
    <th> Quantity </th>
    <th> Edit Quantity </th> 
    </th>";

    while($row = $cart -> fetch_assoc())
    {
        $i = $i + 1;
        echo"
    
        <tr>
        <td><input  type = 'checkbox'  name='row[]' value =". $row['ISBN']." >
         
        
        <td>" . $row['ISBN']. "</td>
        <td>" . $row["Title"]. "</td>
        <td>" . $row["Last_Name"]. "</td>
        <td>" . $row["PPU"]. "</td>
        <td>  " . $row["qty"]. " </td>
        <td>  <input type = 'submit' name = qtychange value = ".$row['ISBN']." ></td>
       
        </tr>
        
        ";
        
    }
    echo "</form>";
    echo"</table>";



}
if($cart && mysqli_num_rows($cart) == 0)
{
    echo "Empty cart";
}

if(isset($_POST['delete'])){
    if(!empty($_POST['row'])) {
        foreach($_POST['row'] as $value ){

            $delete = "delete from cart
                        where ISBN = $value";

            $del = mysqli_query($con, $delete);

            header("Location: cart.php");




            /*
            foreach($_POST['rw'] as $isbncheck){
            $stockcheck = "select quantity from stock
                        where ISBN = $isbncheck";
            $stq = mysqli_query($con, $stockcheck);
                $s = mysqli_fetch_row($stq);
            
            $count = $s[0];
            if($value > $count){
                $next = 1;
                echo "Not enough in stock for that quantity ";
                echo "Please select a value less than:  ";
                echo $count;
                echo "    For the ISBN of:   ";
                echo $isbncheck;
                echo "<br></br>";
                echo "OR";
                echo "<br></br>";
            }
        */
            }
          

     //   echo "Chosen book ID : ".$value.'<br/>';
    
   // echo $i;

}
    }
    if(isset($_POST['qtychange'])){
        $qty = $_POST['qtychange'];
        $isbn = $_POST['ISBN'];
        echo $qty;
        $_SESSION['qty'] = $qty;
        
        header("Location: changeqty.php");
    }

    if(isset($_POST['submit'])){
        header("Location: order.php");
    }


        
    

// after you make cart view 
/*

make an order page so they can input information and place an order and recieve an email verification

make suppliers rep database.



*/
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
    <h1>user views cart here</h1>

    <p></p>
	<a href = "index.php"> Home Page </a>
	<p></p>
    <input id = "button" type = "submit"  value = "Delete" name = "delete"><br></br>
    <input id = "button" type = "submit"  value = "Check Out" name = "submit"><br></br>
</html>