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
        //read from database
       
        $query = "select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            $result = mysqli_query($con,$query);
            if($result &&  mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['id'] = $user_data['id'];
                    if($user_data['isAdmin'] == 1)
                    {
                    header("Location: adminpage.php");
                    }
                    elseif($user_data['isSupplier'] == 1)
                    {
                    header("Location: supplierpage.php");
                    }
                    else
                    {
                    header("Location: index.php");
                    }
                    die;
                }
            }
        }
        echo"Wrong Username or Password";
    }
    else
    {
        echo"please enter some valid information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
</head>
<body>
    <header>
        <img class="logo" src="images/book-logo.png" alt="logo">
    </header>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="user_name" value="" required>
                <label for="fname">Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <label for="fname">Password</label>
            </div>
            <input type="submit" value="Login">
            <div class="signup_link">
                No account? <a href="signup.php">Signup</a>
            </div>
        </form>
    </div>
</body>
</html>
</body>
</html>