<html>
    <h1>Input query below</h1>
    <p></p>
	<a href = "adminpage.php"> Admin Page </a>
	<p></p>

            <label for="fname">Query</label>
            <input  id = "text" type = "text" name = "fname" >
            <input id = "button" type = "submit"  value = "Submit" name = "submit"><br></br>

    <?php
    session_start();
    //error_reporting(E_ERROR | E_PARSE);
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    $q = $_POST['fname'];

    

     if(isset($_POST['submit'])){

        $query =  mysqli_query($con, '$q');
   


    while($row = mysqli_fetch_assoc($query)){
        foreach($row as $cname => $cvalue){
            print "$cname: $cvalue\t";
        }
        print "\r\n";
    }

     }
?>
</html>