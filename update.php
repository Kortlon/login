<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$_SESSION;
    include ("connection.php");
    include("functions.php");
    $user_data = check_login($con);

        $password = $_POST['password'];
        $user_Fname = $_POST['user_Fname'];
        $user_Lname = $_POST['user_Lname'];
     
        $user_name = $user_data['user_name'];
        $id = $user_data['id'];
     

        $check = "select First_Name from users
                where id = $id";
        $checkl = "select Last_Name from users
                where id = $id";


        $checkq = mysqli_query($con, $check);
        $checklq = mysqli_query($con, $checkl);
        if($checkq && mysqli_num_rows($checkq) > 0)
        {
            $rows = mysqli_fetch_row($checkq);
        }

        if($checkq && mysqli_num_rows($checkq) == 0)
        {
            $rows = mysqli_fetch_row($checkq);
         $rows[0] = '';
      
        }
        //---------------------------------------------------
        if($checklq && mysqli_num_rows($checklq) > 0)
        {
           
            $row = mysqli_fetch_row($checklq);
        }
        if($checklq && mysqli_num_rows($checklq) == 0)
        {
            $row = mysqli_fetch_row($checklq);
            $row[0] = '';
        }


   
        if(isset($_POST['submit'])){
        if($user_data['password'] === $password)
        {
  //  $query = "select * from users where user_name = '$user_name' limit 1";
    $query = " update users set First_Name = '$user_Fname', Last_Name = '$user_Lname' where id = '$id' limit 1";
   // $result = mysqli_query($con, $query);
    mysqli_query($con, $query);
            echo "Updated";
        }
    else
        {
    echo "Wrong Password";
        }

        
        
            header("Location: index.php");
        }
         

    

?>


<!DOCTYPE html>
<html>
<head>
        <title> Update your Account Information</title>
        <a href = "index.php"> Back to main page </a>
        <br></br>
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
    body{
        background-color: #0088a9 ;
    }
    </style>
	Hello, <?php echo $user_data['user_name']; ?>
   
    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Account Infromation</div>
            <label for="fname">First Name:</label>
            <input id = "text" type = "text" name = "user_Fname" value = <?php echo $rows[0];   ?>> <br></br>

            <label for="fname">Last Name:</label>
            <input  id = "text" type = "text" name = "user_Lname" value = <?php echo $row[0];  ?>><br></br>

            <label for="fname">Password:</label>
            <input  id = "text" type = "password" name = "password" ><br></br>


            <input id = "button" type = "submit" name = "submit" value = "Update"><br></br>

        </form>
</body>
</html>
