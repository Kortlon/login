
<style type = "text/css">
    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

    }
    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }
    #box{
        background-color:grey;
        margin: auto;
        width: 300px;
        padding: 20px;
        
    }
    body{
        background-color: #0088a9 ;
    }
    </style>
<html>
<h1>Change your contact details</h1>
<a href = "index.php"> Back to main page </a>
<br></br>
<body onload>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");

    $phonenum = $_POST['phonenum'];
    $email = $_POST['email'];
    $add    = $_POST['address'];
    
    $user_data = check_login($con);
	$id = $user_data['id'];
	$username = $user_data['user_name'];


    $check = "select phonenum, email, address from contactdetails
            where userid = $id ";
    $checkq = mysqli_query($con, $check);
    echo "user id is: ";
    echo $id;

    if($checkq && mysqli_num_rows($checkq) > 0)
    {

        echo"exist";
        $rows = mysqli_fetch_row($checkq);
       
        $adc = "Update contactdetails
            SET phonenum = $phonenum, email = '$email', address= '$add'
            where userid = $id ";

        mysqli_query($con, $adc);

      

    }
    if($checkq && mysqli_num_rows($checkq) == 0)
    {
        echo "doesnt exist";
        $row0 = '';
        $row1 = '';
        $row2 = '';
        $rows[0] = '';
        $rows[1] = '';
        $rows[2] = '';
        $adc = "insert into contactdetails (phonenum, email, address, userid)
        values ($phonenum, '$email', '$add', $id)";

        mysqli_query($con, $adc);

    }

    if(isset($_POST['submit'])){
    header("Location: index.php");
    }
?>
</body>

<div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Contact Information</div>

            <label for="fname">phone number:</label>
            <input id = "text" type = "text" name = "phonenum"  value = "<?php echo $rows[0];?>"> 

            <label for="fname">email:</label>
            <input  id = "text" type = "text" name = "email"  value = "<?php echo $rows[1];?>">

            <label for="fname">address:</label>
            <input  id = "text" type = "text" name = "address"  value = "<?php echo $rows[2];?>">



            <input id = "button" type = "submit"  value = "Update" name = "submit"><br></br>


            
        </form>
</div>
</html>