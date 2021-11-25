<html>
    <p></p>
	<a href = "logout.php"> Logout </a>
	<p></p>
    <p></p>
	<a href = "supplierpage.php"> Supplier Home page </a>
	<p></p>


    Welcome Supplier Add more books
    <h2>Enter ISBN of book</h2>
    <form method="post">
    <label for = "bookisbn"> Book ISBN: </label>
    <input id = "text" type = "text" name = "isbn"> 
    <input id = "button" type = "submit"  value = "Login"><br></br>
    </form>
</html>
<?php
session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    echo "user id is: ";
    echo $user_data['id'];
    echo "<br></br>";
    

    $isbn = $_POST['isbn'];
    echo $isbn;

    $ad = "select * from books
    Where ISBN = $isbn";
    $css = "select id from supplier
            where user_id = $user_data[id]";
    $cssq = mysqli_query($con, $css);
    //found supp id
    if($cssq && mysqli_num_rows($cssq) > 0)
    {
        echo "<br></br>";
        echo "found the supplier";
        echo "<br></br>";
        while ($row = $cssq -> fetch_assoc())
        {
            $supid =  $row['id'];
        }
        echo $supid;
    }
//--------------------------------

    $adq = mysqli_query($con, $ad);
    if($adq && mysqli_num_rows($adq) > 0)
    {
        echo "isbn exist";
        
        
        $cs = "select * from stock
                Where ISBN = $isbn and supplier_ID = $supid";
        $csq = mysqli_query($con, $cs);
        if($csq && mysqli_num_rows($csq) > 0)
        {
            echo "<br></br>";
            echo "supplier produces the book";
            echo "<br></br>";
            $_SESSION['isbn'] = $isbn;
            header ("Location: qtyadd.php ");
        }
        
    }
    else{
        //echo "isbn doesn't exist";
    }
?>
