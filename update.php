<?php
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");
 if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
    $user_data = check_login($con);

        $password = $_POST['password'];
        $user_Fname = $_POST['user_Fname'];
        $user_Lname = $_POST['user_Lname'];
      //  $_SESSION['user_id'] = $user_data['user_id'];
      //  $_SESSION['password'] = $user_data['password'];
        $user_name = $user_data['user_name'];




    if($user_data['password'] === $password)
        {
  //  $query = "select * from users where user_name = '$user_name' limit 1";
    $query = " update users set First_Name = '$user_Fname', Last_Name = '$user_Lname' where user_name = '$user_name' limit 1";
   // $result = mysqli_query($con, $query);
    mysqli_query($con, $query);
            echo "Updated";
        }
    else
        {
    echo "Wrong Password";
        }
    }


?>


<!DOCTYPE html>
<html>
<head>
        <title> Update your Account Information</title>
</head>
<body>
<style type = "text/css">
    #text{

        height: 35px;
        border-radius: 5px;
        padding: 4px;
        border:solid thin #aaa;
        width: 100%;

    }
    #button{
        padding: 10px;
        width: 100px;
        color: rgb(0, 0, 0);
        background-color: lightblue;
        border: none;
    }
    #box{
        background-color:grey;
        margin: auto;
        width: 600px;
        padding: 20px;
    }
    </style>
	Hello, <?php echo $user_data['user_name']; ?>
    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Account Infromation</div>
            <label for="fname">First Name:</label>
            <input id = "text" type = "text" name = "user_Fname"> <br></br>

            <label for="fname">Last Name:</label>
            <input  id = "text" type = "text" name = "user_Lname"><br></br>

            <label for="fname">Password:</label>
            <input  id = "text" type = "password" name = "password" ><br></br>


            <input id = "button" type = "submit"  value = "Update"><br></br>

        </form>
</body>
</html>
