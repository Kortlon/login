
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
<html>
    <h1>Author C edits from admin</h1>
    <p></p>
	<a href = "adminpage.php"> Admin Page </a>
	<p></p>
    <a href = "acd.php"> Back </a>
    <p></p>
    <?php
    
    ?>


<body onload>
<?php
    //---
    /// gets rid of errors.
    error_reporting(E_ERROR | E_PARSE);
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $_SESSION;
    include("connection.php");
    include("functions.php");
  $aid =  $_SESSION['aid'];

  

  $check = "select phonenum, email, address from contactdetails
  where authorid = $aid ";
    $checkq = mysqli_query($con, $check);
//contact
    if($checkq && mysqli_num_rows($checkq) > 0)
    {
    echo "exist";
   
        $rows = mysqli_fetch_row($checkq);
       
        $adc = "Update contactdetails
        where authorid = $aid
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

        $adc = "insert into contactdetails (phonenum, email, address, authorid)
        values ($phonenum, '$email', '$add', $aid)";

        mysqli_query($con, $adc);
    }
//

//bdetails
    $cq = "select First_Name, Last_Name, DOB, Gender from author
            where id = $aid";
    $cqq = mysqli_query($con, $cq);

    if($cqq && mysqli_num_rows($cqq) > 0)
    {
        echo 'here';
        $r = mysqli_fetch_row($cqq);
        
        $dob = $_POST['dob'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        
        $d = date($dob);

  
        $addit = "Update author
                 
                    SET  First_Name = '$fname', Last_Name = '$lname', DOB = '$d', Gender = '$gender'
                    where id = $aid";
        $d = mysqli_query($con, $addit);
    }

    if($d)
    {
        echo "works";
    }

//
    if(isset($_POST['submit'])){
        header("Location: adminpage.php");
        }
?>
</body>

<div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Update Contact Information</div>

            <label for="fname">First Name</label>
            <input  id = "text" type = "text" name = "fname"  value = "<?php echo $r[0];?>">

            <label for="fname">Last Name</label>
            <input  id = "text" type = "text" name = "lname"  value = "<?php echo $r[1];?>">

            
            <label for="fname">D.O.B (Input YYYY-MM-DD) </label>
          
            <input  id = "text" type = "text" name = "dob"  value = "<?php echo $r[2];?>">

            <label for="fname">Gender </label>
            <input  id = "text" type = "text" name = "gender"  value = "<?php echo $r[3];?>">
<br></br>
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