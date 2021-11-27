<style type = "text/css">
#text{
    height: 25px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

}
#textr{
    height: 25px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

}
#box{
        background-color:grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }
 #button{
        padding: 10px;
        width: 120px;
        color: rgb(0, 0, 0);
        background-color: lightblue;
        border: none;
    }
    #buttondel{
        padding: 10px;
        width: 110px;
        color: rgb(0, 0, 0);
        background-color: red;
        border: none;
    }

</style>
<html>
    <p></p>
	<a href = "logout.php"> Logout </a>
	<p></p>
    <p></p>
	<a href = "supplierpage.php"> Supplier Home page </a>
	<p></p>
    <h1>Change the book qty</h1>
    <body>

 
    <?php
    session_start();
    $_SESSION;
    include ("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $isbn = $_SESSION['isbn'];
    $qn = $_POST['qty'];
    
    $ids = "select id from supplier
        where user_id = $user_data[id];";

        $idsq = mysqli_query($con, $ids);
        $row = mysqli_fetch_row($idsq);


    $qty = "select quantity from stock
            where ISBN = $_SESSION[isbn]";
    $qtyq = mysqli_query($con, $qty);
    $rows = mysqli_fetch_row($qtyq);
    
if($qtyq && mysqli_num_rows($qtyq) == 0)
{
echo "needs to add to stock";
$rows[0] = '';

$int = "insert into stock (ISBN, supplier_ID, quantity)
    values ($isbn, $row[0], $qn )";

mysqli_query($con, $int);

}

    $update = "update stock
                SET quantity =  $qn
                where ISBN = $_SESSION[isbn]";
    $updateq = mysqli_query($con, $update);
    if($updateq)
    {
        echo "updated";
        header("Location: addqty.php");
    }
    else{
        echo "not updated";
    }


    ?>
    <div id = "box">
        <form method= "post">
        <label for="fname">ISBN:</label>
            <?php echo $_SESSION['isbn']; ?>
            <br></br>

            <label for="fname">Book Qty:</label>
            <input  id = "textr" type = "text" name = "qty" value = <?php echo $rows[0];  ?>><br></br>
            <input id = "button" type = "submit"  value = "Change Quantity"><br></br>
    </form>
    </body>
</html>