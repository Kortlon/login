
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
<h1>View Authors Here Admin Page</h1>
<p></p>
	<a href = "adminpage.php"> Admin Page </a>
<p></p>


<body>

<?php
    session_start();
    $_SESSION;
    include ("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    $userid = $user_data['id'];

    $aq = "select * from author";
    $q = mysqli_query($con, $aq);

    if($q && mysqli_num_rows($q) > 0)
    {
       
        echo "<form method = 'post' action = ''>";
            echo "<table id = 'table1'>
                <tr>
                <th> ID </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> D.O.B </th>
                <th> Gender </th> 
                </tr>";
    }
    while($row = $q -> fetch_assoc())
    {

        echo "
                
        <tr>
        <td> " .$row['id']. "</td>
        <td> " .$row['First_Name']. "</td>
        <td> " .$row['Last_Name']. "</td>
        <td> " .$row['DOB']. "</td>
        <td> " .$row['Gender']. "</td>
       ";
    }
    echo "</form>";
    echo "</table>";
?>


</body>
</html>
