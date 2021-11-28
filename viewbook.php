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
<h1>View books</h1>
<p></p>
	<a href = "adminpage.php"> Admin Page </a>
	<p></p>
<body onload>
<?php
    session_start();
    $_SESSION;
    include ("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    $userid = $user_data['id'];
     
        $bookq = "select * from books";
        $bs = mysqli_query($con, $bookq);
        if($bs && mysqli_num_rows($bs) > 0)
        {
            
            echo "<form method = 'post' action = ''>";
            echo "<table id = 'table1'>
                <tr>
                <th> ID </th>
                <th> ISBN </th>
                <th> Title </th>
                <th> Publication Date </th>
                <th> Price </th> 
                <th> Author_ID</th>
                <th> Supplier ID</th>
                </tr>";
            while($row = $bs -> fetch_assoc())
            {
                echo "
                
                <tr>
                <td> " .$row['id']. "</td>
                <td> " .$row['ISBN']. "</td>
                <td> " .$row['Title']. "</td>
                <td> " .$row['Publication_Date']. "</td>
                <td> " .$row['Price']. "</td>
                <td> " .$row['Author_ID']. "</td>
                <td> " .$row['supplier_ID']. "</td>
               ";
            }
            echo "</form>";
            echo "</table>";
                
        }
        else{
            echo "no table";
        }



    

?>
</body>
</html>