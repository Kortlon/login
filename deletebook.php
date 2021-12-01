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
   <h1>Update Book Details</h1>
<body>
    <?php
    session_start();
    include("connection.php");
    include("functions.php");

    $ac = "select * from books";
    $aq = mysqli_query($con, $ac);

    if($aq && mysqli_num_rows($aq) > 0)
    {
        echo "<form method = 'post' action = ''>";
        echo"<table id = 'table1'>
        <tr>
        <th> </th>
        <th>ID</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Publication Date</th>
        <th>Price</th>
        <th>Author ID</th>
        <th>Code</th>
        <th>Item Number</th>
       
    </tr>";
    
    while($row = $aq -> fetch_assoc())
    {
        echo"
    
        <tr>
        <td><input type= 'checkbox'  name='row[]' value= ".$row['id']. "></td>
       
        <td>" . $row['id']. "</td>
        <td>" . $row["ISBN"]. "</td>
        <td>" . $row["Title"]. "</td>
        <td>" . $row["Publication_Date"]. "</td>
        <td>" .$row["Price"]. "</td>
        <td>" .$row["Author_ID"]. "</td>
        <td>" .$row["code"]. "</td>
        <td>" .$row["ItemNumber"]. "</td>
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
            echo "Chosen book ID : ".$value.'<br/>';
        }
        echo $i;
    }
    if($i != 1)
    {
        echo "Select one book only";
    }
    if($i == 1)
    {
        // move to new page and edit contact info
        $_SESSION['id'] = $value;
        header("Location: bedit.php");
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
            echo "Chosen book ID : ".$value.'<br/>';
        }
        echo $i;
    }
    if($i != 1)
    {
        echo "Select one book only";
    }
    if($i == 1)
    {
        // move to new page and edit contact info
        $_SESSION['id'] = $value;
        $query = "DELETE FROM books WHERE id = $value";
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