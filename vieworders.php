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
    <h1>View Order</h1>
    <a href = "index.php"> Back to main page </a>
</html>

<body onload>
    <?php
session_start();
    $_SESSION;
    include ("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    $userid = $user_data['id'];

    $view = "select value, date, ISBN, address from orders
            where user_id = $userid
            "
            ;
    $vq = mysqli_query($con, $view);

    if($vq && mysqli_num_rows($vq) > 0)
    {
        
        echo "<form method = 'post' action = ''>";
        echo "<table id = 'table1'>
            <tr>
            <th> Price </th>
            <th> Date Purchased </th>
            <th> ISBN </th>
            <th> shipping address </th>
            
            </tr>";
        while($row = $vq -> fetch_assoc())
        {
            echo "
            
            <tr>
            <td> " .$row['value']. "</td>
            <td> " .$row['date']. "</td>
            <td> " .$row['ISBN']. "</td>
            <td> " .$row['address']. "</td>
           ";
        }
        echo "</form>";
        echo "</table>";
            
    }
    if($vq)
    {
        echo "works";
    }
    else{
        echo "doesn't work";
    }

    ?>
</body>