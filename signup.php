<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name =  $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        mysqli_query($con, $query);

         header("Location: login.php");
        die;
    }
    else
    {
        echo"please enter some valid information";
    }
}
?>7

<!DOCTYPE html>
<html>
<head>
        <title> Sign up</title>
        <img class="logo" src="images/book-logo.png" alt="logo">
</head>
<body>
    <!---
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
    </style>
--->
    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Sign up</div>
            <label for="fname">Username:</label>
            <input id = "text" type = "text" name = "user_name"> <br></br>

            <label for="fname">Password:</label>
            <input  id = "text" type = "password" name = "password"><br></br>


            <input id = "button" type = "submit"  value = "Signup"><br></br>


            <a href= "login.php"> Click to Login</a>
        </form>
</body>
</html>