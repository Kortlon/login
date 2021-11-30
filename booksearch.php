<!--

SELECT MIN(id) AS id, title
FROM tbl_countries
GROUP BY title

<?php
session_start();
include("connection.php");
include("functions.php");
?>


-->
<!DOCTYPE html> 
<html>
    
<br><br>
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
   
    #box{
        background-color:grey;
        margin: auto;
        width: 600px;
        padding: 20px;
    }
    #boxs{
        content: " ";
        display: table;
        clear: both;
    }
   
    table{
        border-collapse: collapse;
        width: 75%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: center;
        align-self: center;
    }
    th{
        background-color: #588c7e;
        color: white;

    }
   tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>
<p></p>


<a href = "index.php"> Back to main page </a>

    <div id = "box">
        <form method= "post">
            <div style = "font-size: 20px; margin: 10px; ">Book Search</div>
            <p> Leave input fields blank if you don't know those search parameters!!!</p>
<!------------------------------ISBN---------------------------------------------------------->
            <label for="fname">Book ISBN13:</label>
            <input id = "text" type = "text" name = "isbn" > <br></br>
    <?php 
            $_SESSION;
                if ($_SERVER['REQUEST_METHOD'] == "POST")
                {

                 $bookTitle = $_POST['book_title'];
                 $bookISBN = $_POST['isbn'];
                 $A_LN = $_POST['Author_LName'];
                 $A_FN = $_POST['Author_FName'];
                 $price = $_POST['Price'];
                //--------------------------------------------------------------
                $isbnS = NULL;
             if(!empty($bookISBN) && is_numeric($bookISBN)) 
                 {
          //echo"empty here";
                     $queryisbn = "select * from books where ISBN = '$bookISBN'limit 1";
                     $resultisbn = mysqli_query($con, $queryisbn);
                     if($resultisbn)
                         {
            
                         $resultisbn = mysqli_query($con, $queryisbn);
                        if($resultisbn &&  mysqli_num_rows($resultisbn) > 0)
                             {
                              $whereisbn = "ISBN = $bookISBN  ";
                                // echo"'$whereisbn'";
                            }
                    else{
                      $whereisbn = " ";
                     echo "ISBN not found, Please leave Text
                      Field blank or enter a valid ISBN";
                        }       
            
            
                    }


                }
                else{
                    $whereisbn = " $bookISBN  ";
                }
                
                } 
        ?>
         <!--

          
         -->
<!------------------------------Title--------------------------------------------------------->
           
    <p></p> 
         <label for="fname">Book Title :</label>
            <input  id = "text" type = "text" name = "book_title"><br></br>
            <?php
            $_SESSION;
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {

     $bookTitle = $_POST['book_title'];
     $bookISBN = $_POST['isbn'];
     $A_LN = $_POST['Author_LName'];
     $A_FN = $_POST['Author_FName'];
     $price = $_POST['Price'];
     
     
     $querybookcheck = "select * from books where Title LIKE '%$bookTitle%'";
     $resultbookcheck = mysqli_query($con, $querybookcheck);
     if(!empty($bookTitle))
     {
    if($resultbookcheck)
    {
        $resultbookcheck = mysqli_query($con, $querybookcheck);
        if($resultbookcheck && mysqli_num_rows($resultbookcheck) > 0)
        {
            echo"book found";
            $wheretitle = "Title LIKE '%$bookTitle%'  ";
        }
        else{
            $wheretitle= "  ";
            echo"title not found";
        }
    }
   
    }
    else
    {
        $wheretitle = "  $bookTitle  ";
    }
    }
    

    ?>   

<!------------------------------FirstName----------------------------------------------------->
            <p></p>
            <label for="fname">Author (First Name):</label>
            <input  id = "text" type = "text" name = "Author_FName" ><br></br>
    <?php
   $_SESSION;
   if ($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
    $bookTitle = $_POST['book_title'];
    $bookISBN = $_POST['isbn'];
    $A_LN = $_POST['Author_LName'];
    $A_FN = $_POST['Author_FName'];
    $price = $_POST['Price'];
    
    if(!empty($A_FN))
    {
        $QLC = "select * from author where First_Name = '$A_FN' ";
        $RQLC = mysqli_query($con, $QLC);
    if($RQLC)
    {
        $RQLC = mysqli_query($con, $QLC);
        if($RQLC && mysqli_num_rows($RQLC) > 0)
        {
            $wherefn = "  First_Name = '$A_FN'  ";
            echo"name found";
        }
        else{
            $wherefn = "  ";
            echo"author Last Name not found";
        }
       
    }
    }
    else{
        $wherefn = "  $A_FN  ";
    }



   }
    ?>
<!------------------------------LastName------------------------------------------------------>
        <p></p>
            <label for="fname">Author (Last Name):</label>
            <input  id = "text" type = "text" name = "Author_LName" ><br></br> 
            <?php
   $_SESSION;
   if ($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
    $bookTitle = $_POST['book_title'];
    $bookISBN = $_POST['isbn'];
    $A_LN = $_POST['Author_LName'];
    $A_FN = $_POST['Author_FName'];
    $price = $_POST['Price'];
    
    if(!empty($A_LN))
    {
        $QLC = "select * from author where Last_Name = '$A_LN' ";
        $RQLC = mysqli_query($con, $QLC);
    if($RQLC)
    {
        $RQLC = mysqli_query($con, $QLC);
        if($RQLC && mysqli_num_rows($RQLC) > 0)
        {
            $whereln = "Last_Name = '$A_LN'";
            echo"name found";
        }
        else{
            $whereln = NULL;
            echo"author Last Name not found";
        }
       
    }
    }
    else{
        $whereln = $A_LN;
    }

   }
    ?>
<!------------------------------Price--------------------------------------------------------->
    <p></p>
            <label for="fname">Book Price:</label>
            <input  id = "text" type = "text" name = "Price" >
            <?php
  $_SESSION;
   if ($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
    $bookTitle = $_POST['book_title'];
    $bookISBN = $_POST['isbn'];
    $A_LN = $_POST['Author_LName'];
    $A_FN = $_POST['Author_FName'];
    $price = $_POST['Price'];
    
    if(!empty($price))
    {
        $QP = "select * from books where Price <= '$price' ";
        $RQP = mysqli_query($con, $QP);
        if($RQP)
        {
            $RQP = mysqli_query($con, $QP);
            if($RQP && mysqli_num_rows($RQP) > 0)
            {
             $whereprice = "  Price <=   $price  ";
             
                echo"found";
            }
            else{
                $whereprice = "  ";
                
                echo"No prices where less than the input price";
            }
        }
        }
        else{
            $whereprice = "  $price  ";
        }
            
             }

   
    ?>
            
            <p></p>
<!--------------------------------------------------------------------------------------->
         <!--   <select name = "dropdown">
                <option value = "Computer Architecture" selected>Computer Architecture</option>
                <option value = "Java">Java</option>
                <option value = "Discrete Mathematics">Discrete Mathematics</option>
             </select>
             <br><br>
 -->
            <input id = "button" type = "submit"  value = "Search"><br></br>
            
        </form>
</div>
           

<body>
   
        <?php


 if ($_SERVER['REQUEST_METHOD'] == "POST")
 {
  //   echo $whereisbn;
   //  echo $wheretitle;
   
//-------Charts
//ISBN chart
    $testq = "select  ISBN, Title, category, Price, First_Name, Last_Name from books
    INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
     where $whereisbn ";
    //$finalr = mysqli_query($con, $finalq);
    
    $testr = mysqli_query($con, $testq);
    if($testr&& mysqli_num_rows($testr) > 0)
    {
        echo" <h1>The is ISBN Search</h1>";
        echo"<table>
        <tr>
            
            <th>ISBN</th>
            <th>Price</th>
            <th>Title</th>
            <th>Category</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>";
        while($row = $testr-> fetch_assoc())
        {
            echo"<tr><td>". $row["ISBN"]. "</td><td>" .
            $row["Price"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["category"]. "</td><td>". $row["First_Name"]. "</td><td>". $row["Last_Name"]
            ."</td></tr>";
        }
        echo"</table>";
    }
    else{
      //  echo"no results";
    }
//----------------------------
//Title chart

    //echo $bookTitle;
    $titlec = "select  ISBN, Title, category, Price, First_Name, Last_Name from books
    INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
     where $wheretitle ";

 $titler = mysqli_query($con, $titlec);

 if($titler && mysqli_num_rows($titler) > 0)
 {
    echo"<h1>The is Title Search</h1>";
    echo"<table>
    <tr>
        
        <th>ISBN</th>
        <th>Price</th>
        <th>Title</th>
        <th>Category</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>";
    // echo"title loaded";
     while($row = $titler-> fetch_assoc())
     {
         echo"<tr><td>". $row["ISBN"]. "</td><td>" .
         $row["Price"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["category"]. "</td><td>" . $row["First_Name"]. "</td><td>". $row["Last_Name"]
         ."</td></tr>";
     }
     echo"</table>";
 }
 else{
    // echo"not working";
 }
 //---------------------------------------
 //First name Charts
  $fname =  "select  ISBN, Title, category, Price, First_Name, Last_Name from books
  INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
   where $wherefn ";

   $fn = mysqli_query($con, $fname);

   if($fn && mysqli_num_rows($fn) > 0)
   {
    echo"<h1>The is First Name Search</h1>";
    echo"<table>
    <tr>
        
        <th>ISBN</th>
        <th>Price</th>
        <th>Title</th>
        <th>Category</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>";
     //echo"title loaded";
     while($row = $fn-> fetch_assoc())
     {
         echo"<tr><td>". $row["ISBN"]. "</td><td>" .
         $row["Price"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["category"]. "</td><td>" . $row["First_Name"]. "</td><td>". $row["Last_Name"]
         ."</td></tr>";
     }
     echo"</table>";
   }
//--------------------------------------
//Last name Charts
    $lname =  "select  ISBN, Title, category, Price, First_Name, Last_Name from books
    INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
 where $whereln ";

 $ln = mysqli_query($con, $lname);

 if($ln && mysqli_num_rows($ln) > 0)
 {
  echo"<h1>The is Last Name Search</h1>";
  echo"<table>
  <tr>
      
      <th>ISBN</th>
      <th>Price</th>
      <th>Title</th>
      <th>Category</th>
      <th>First Name</th>
      <th>Last Name</th>
  </tr>";
   //echo"title loaded";
   while($row = $ln-> fetch_assoc())
   {
       echo"<tr><td>". $row["ISBN"]. "</td><td>" .
       $row["Price"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["category"]. "</td><td>"  . $row["First_Name"]. "</td><td>". $row["Last_Name"]
       ."</td></tr>";
   }
   echo"</table>";
 }
 //Price chart

 $pc = "select  ISBN, Title, category, Price, First_Name, Last_Name from books
 INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
  where $whereprice ";

  $pn = mysqli_query($con, $pc);

  if($pn && mysqli_num_rows($pn) > 0)
  {
    echo"<h1>The is Price Search</h1>";
    echo"<table>
    <tr>
        
        <th>ISBN</th>
        <th>Price</th>
        <th>Title</th>
        <th>Category</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>";
     //echo"title loaded";
     while($row = $pn-> fetch_assoc())
     {
         echo"<tr><td>". $row["ISBN"]. "</td><td>" .
         $row["Price"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["category"]. "</td><td>" . $row["First_Name"]. "</td><td>". $row["Last_Name"]
         ."</td></tr>";
     }
     echo"</table>";
   }
//-------------------
//Union Attemp

    $unionq =  "select  ISBN, Title, category, Price, First_Name, Last_Name from books
    INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
 where $whereisbn UNION select  ISBN, Title, category, Price, First_Name, Last_Name from books
 INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
  where $wheretitle UNION select  ISBN, Title, category, Price, First_Name, Last_Name from books
  INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
   where $wherefn UNION select  ISBN, Title, category, Price, First_Name, Last_Name from books
   INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
    where $whereln UNION select  ISBN, Title, category, Price, First_Name, Last_Name from books
    INNER JOIN author ON books.Author_ID = author.id INNER JOIN category ON books.code = category.code
     where $whereprice ";

    $unionr = mysqli_query($con, $unionq);

    if($unionr && mysqli_num_rows($unionr) > 0)
    {
    

    echo"<h1>The is Result of Search</h1>";
    echo"<table>
    <tr>
        
        <th>ISBN</th>
        <th>Price</th>
        <th>Title</th>
        <th>Category</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>";
     //echo"title loaded";
     while($row = $unionr-> fetch_assoc())
     {
         echo"<tr><td>". $row["ISBN"]. "</td><td>" .
         $row["Price"]. "</td><td>" . $row["Title"]. "</td><td>" . $row["category"]. "</td><td>". $row["First_Name"]. "</td><td>". $row["Last_Name"]
         ."</td></tr>";
     }
     echo"</table>";

    }
  }
  
?>
</table>
</body>


</body>
</html>