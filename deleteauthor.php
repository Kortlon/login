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
   <h1>Add author contact details</h1>
<body>
    <?php
    session_start();
    include("connection.php");
    include("functions.php");

    $ac = "select * from author";
    $aq = mysqli_query($con, $ac);

    if($aq && mysqli_num_rows($aq) > 0)
    {
        echo "<form method = 'post' action = ''>";
        echo"<table id = 'table1'>
        <tr>
        <th> </th>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>DOB</th>
        <th>Gender</th>
       
    </tr>";
    
    while($row = $aq -> fetch_assoc())
    {
        echo"
    
        <tr>
        <td><input type= 'checkbox'  name='row[]' value= ".$row['id']. "></td>
       
        <td>" . $row['id']. "</td>
        <td>" . $row["First_Name"]. "</td>
        <td>" . $row["Last_Name"]. "</td>
        <td>" . $row["DOB"]. "</td>
        <td>" .$row["Gender"]. "</td>
        </tr>
        
        ";
        
    }
    echo "</form>";
    echo"</table>";
//-------------------------------------------
// button press
    if(isset($_POST['submit'])){
        echo"button check";

       $i = 0;
        if(!empty($_POST['row'])) {
            foreach($_POST['row'] as $value){
                $i = $i+1;
            echo "Chosen author ID : ".$value.'<br/>';
        }
        echo $i;
    }
    if($i != 1)
    {
        echo "Select One Author only";
    }
    if($i == 1)
    {
        // move to new page and edit contact info
        $_SESSION['aid'] = $value;
        header("Location: aedit.php");
    }
    else{
        echo "empty";
    }
    
}

//delete button
if(isset($_POST['delete'])){
    echo"button check";

   $i = 0;
    if(!empty($_POST['row'])) {
        foreach($_POST['row'] as $value){
            $i = $i+1;
        echo "Chosen author ID : ".$value.'<br/>';
    }
    echo $i;
}
if($i != 1)
{
    echo "Select one author only";
}
if($i == 1)
{
    // move to new page and edit contact info
    $_SESSION['id'] = $value;
    $query = "DELETE FROM author WHERE id = $value";
    $query_run = mysqli_query($con, $query);

    header("Location: adminpage.php");
}
else{
    echo "empty";
}
    
}


//-----------------------------------------
    }
    ?>
</body>

<input id = "button" type = "submit"  value = "submit" name = "submit"><br></br>
<input id = "button" type = "submit"  value = "Delete" name = "delete">

</html>