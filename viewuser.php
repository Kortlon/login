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
        width: 90%;
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

<h1>View Customers/Users</h1>
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

        $userq = "select * from users";
        $userc = mysqli_query($con, $userq);

        if($userc && mysqli_num_rows($userc) > 0)
        {
            echo "works";
            echo "<form method = 'post' action = ''>";
            echo "<table id = 'table1'>
                <tr>
                <th> ID </th>
                <th> User_Id </th>
                <th> user name </th>
                <th> Password </th>
                <th> date registered </th> 
                <th> First Name </th>
                <th> Last Name </th>
                <th> Admin Status </th>
                <th> Supplier Status</th>
                </tr>";
            while($row = $userc -> fetch_assoc())
            {
                echo "
                <tr>
                <td> ".$row['id']. "</td>
                <td> ".$row['user_id']. "</td>
                <td> ".$row['user_name']. "</td>
                <td> ".$row['password']. "</td>
                <td> ".$row['date']. "</td>
                <td> ".$row['First_Name']. "</td>
                <td> ".$row['Last_Name']. "</td>
                <td> ".$row['isAdmin']. "</td>
                <td> ".$row['isSupplier']. "</td>
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