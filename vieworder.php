<style type = "text/css">
    #text{

        height: 35px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

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
<html>
<h1>View Orders</h1>
<p></p>
	<a href = "adminpage.php"> Admin Page </a>
	<p></p>
<body>
<?php
	session_start();
	$_SESSION;
    include ("connection.php");
    include("functions.php");


$view = "select user_id, date, ISBN, qty, address, phonenum, email from orders
		
		";
$viewq = mysqli_query($con, $view);


if($viewq && mysqli_num_rows($viewq) > 0)
{
echo"<table>
<tr>
<th>User ID</th>
<th>date</th>
<th> ISBN </th>
<th> QTY </th>
<th>address</th>
<th>phone number</th>
<th>email</th>

</tr>";
while($row = $viewq-> fetch_assoc() )
{
  echo"

  <tr>
  <td>" .$row['user_id']. "</td>
 
  <td>" . $row["date"]. "</td>
  <td>" . $row["ISBN"]. "</td>
  <td>" . $row["qty"]. "</td>
  <td>" . $row["address"]. "</td>
  <td>" . $row["phonenum"]. "</td>
  <td>" . $row["email"]. "</td>
  </tr>
  
  ";
  
	 }
echo"</table>";


   }
   if($viewq && mysqli_num_rows($viewq)  == 0)
   {
	   echo" No order exist";
   }

if($viewq)
{
	echo "chart made";
}
else{
	echo"chart not made";
}
?>

</body>


</html>
