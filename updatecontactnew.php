
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
        color: white;
        background-color: lightblue;
        border: none;
    }
    #box{
        background-color:grey;
        margin: auto;
        width: 400px;
        padding: 20px;
    }
    </style>

<html>
    <h1>Final edit page for user details</h1>
    <p></p>
	<a href = "adminpage.php"> Admin Page </a>
<p></p>
</br></br>
<p></p>
	<a href = "updatecontact.php"> back</a>
<p></p>
<body>
<?php
 session_start();
 $_SESSION;
 include("connection.php");
 include("functions.php");
$id =  $_SESSION['id'];
//----------------------------------
// contact details check
    $check = "select phonenum, email, address from contactdetails
    where userid = $id ";
  $checkq = mysqli_query($con, $check);

  if($checkq && mysqli_num_rows($checkq) > 0)
  {
  echo "exist";
 
      $rows = mysqli_fetch_row($checkq);

     
    

      $adc = "Update contactdetails
      where userid = $id
          SET phonenum = $phonenum, email = '$email', address= '$add' ";

      mysqli_query($con, $adc);
      

    
  }
  if($checkq && mysqli_num_rows($checkq) == 0)
  {
  echo"DE";
  $rows[0] = '';
  $rows[1] = '';
  $rows[2] = '';
      $phonenum = $_POST['phonenum'];
      $email = $_POST['email'];
      $add    = $_POST['address'];

      $adc = "insert into contactdetails (phonenum, email, address, userid, authorid)
      values ($phonenum, '$email', '$add', $id , 0)";

      mysqli_query($con, $adc);
  }
//---

// user update
$qc = "select user_name, password, First_Name, Last_Name, isAdmin, isSupplier from users
        where id = $id";

$cqc = mysqli_query($con, $qc);

if($cqc && mysqli_num_rows($cqc) > 0)
{
    echo "user continues to exist";
    $row = mysqli_fetch_row($cqc);
}
if($cqc && mysqli_num_rows($cqc) == 0)
{
    echo "user doesn't exist";
}
  
//---
?>


<div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Contact Information</div>

            <label for="fname">user name: <?php echo $row[0];?></label>
            <input id = "text" type = "text" name = "phonenum"  value = "<?php echo $row[0];?>"> 

            <label for="fname">password:</label>
            <input  id = "text" type = "text" name = "email"  value = "<?php echo $row[1];?>">

            <label for="fname">First Name</label>
            <input  id = "text" type = "text" name = "fname"  value = "<?php echo $row[2];?>">

            <label for="fname">Last Name</label>
            <input  id = "text" type = "text" name = "lname"  value = "<?php echo $row[3];?>">

            <label for="fname">Admin Status</label>
            <input  id = "text" type = "text" name = "astatus"  value = "<?php echo $row[4];?>">

            <label for="fname">Supplier Status</label>
            <input  id = "text" type = "text" name = "status"  value = "<?php echo $row[5];?>">


            <br></br>
            <h1> Contact Details</h1>

            <label for="fname">Phone Number</label>
            <input  id = "text" type = "text" name = "address"  value = "<?php echo $rows[1];?>">

            <label for="fname">Email</label>
            <input  id = "text" type = "text" name = "address"  value = "<?php echo $rows[2];?>">

            <br></br>

            <input id = "button" type = "submit"  value = "Update" name = "submit"><br></br>


            
        </form>
</div>

</body>
</html>