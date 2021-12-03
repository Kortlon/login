
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
  
    <p></p>
	<a href = "adminpage.php"> Admin Page </a>
<p></p>
<h1>View Suppliers Reps</h1>

</html>
<?php
 session_start();
 $_SESSION;
 include ("connection.php");
 include("functions.php");
 $user_data = check_login($con);
 $userid = $user_data['id'];

$sup = "select id, user_id, first_name, last_name, Fname, Lname from supplier
        INNER JOIN mainsupplier ON supplier.worknumber = mainsupplier.worknumber";
$supq = mysqli_query($con, $sup);

if($supq && mysqli_num_rows($supq) > 0)
        {
            
            echo "<form method = 'post' action = ''>";
            echo "<table id = 'table1'>
                <tr>
                <th> ID </th>
                <th> user_id </th>
                <th> First Name </th>
                <th>Last Name</th>
                <th>  Supplier  </th> 
                <th> Name </th>
                
                </tr>";
            while($row = $supq -> fetch_assoc())
            {
                echo "
                
                <tr>
                <td> " .$row['id']. "</td>
                <td> " .$row['user_id']. "</td>
                <td> " .$row['first_name']. "</td>
                <td> " .$row['last_name']. "</td>
                <td> " .$row['Fname']. "</td>
                <td> " .$row['Lname']. "</td>
               
              
               ";
            }
            echo "</form>";
            echo "</table>";
                
        }


?>




<html>
    <h1>View Supplier</h1>
</html>
<?php
$mains = "select * from mainsupplier";
$mainq = mysqli_query($con, $mains);

if($mainq && mysqli_num_rows($mainq) > 0)
        {
            
            echo "<form method = 'post' action = ''>";
            echo "<table id = 'table1'>
                <tr>
                <th> Work number </th>
                <th> Cell Number </th>
                <th> First Name </th>
                <th> Last Name</th>
                <th>  email  </th> 
                
                
                </tr>";
            while($row = $mainq -> fetch_assoc())
            {
                echo "
                
                <tr>
                <td> " .$row['worknumber']. "</td>
                <td> " .$row['cellnumber']. "</td>
                <td> " .$row['Fname']. "</td>
                <td> " .$row['Lname']. "</td>
                <td> " .$row['email']. "</td>
           
               
              
               ";
            }
            echo "</form>";
            echo "</table>";
                
        }

?>