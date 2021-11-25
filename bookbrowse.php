
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            //Assign Click event to Button.
            $("#btnGet").click(function () {
                var message = "Id Name                  Country\n";

                //Loop through all checked CheckBoxes in GridView.
                $("#Table1 input[type=checkbox]:checked").each(function () {
                    var row = $(this).closest("tr")[0];
                    message += row.cells[1].innerHTML;
                    message += "   " + row.cells[2].innerHTML;
                    message += "   " + row.cells[3].innerHTML;
                    message += "\n";
                });

                //Display selected Row data in Alert Box.
                alert(message);
                return false;
            });
        });
    </script>
</script>

---->
<html>
    <body>
    <a href = "index.php"> Back to main page </a>
        <div id = "box">
        <form method="POST" id = theForm>
            <label for="Manufacturer"> Sort By: </label>
            <select id="cmbMake" name="Make"     onchange="document.getElementById('selected_text').value = 
            this.options[this.selectedIndex].text">
                 <option value="0">-------</option>
                 <option value="1">Title</option>
                <option value="2">Publication date</option>
                <option value="3">Category</option>
                <option value="4">Reviews</option>
            </select>
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="search" value="Sort"/>
        </form>

        </div>
<?php
    session_start();
    include("connection.php");
    include("functions.php");
    
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $value = $_POST['Make'];
        echo $value;
        echo "<br></br>";

 if($value == 1)
         {
           // echo "title";
               
                
            $ar = "select * , First_Name, category, ROUND(AVG(rating),1) as rating from books
            INNER JOIN reviews
            ON books.ISBN = reviews.ISBN
            INNER JOIN author ON books.Author_ID = author.id 
            INNER JOIN category ON books.code = category.code
            group by books.ISBN
            order by books.Title
       ";
             $qr = mysqli_query($con, $ar);
             if($qr && mysqli_num_rows($qr) > 0)
              {
              echo"<table>
              <tr>
              <th>ISBN</th>
              <th>Title</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Category</th>
               <th>Publication Date</th>
               <th>Stars</th>
              </tr>";
              while($row = $qr-> fetch_assoc() )
            {
                   echo"<tr><td>" .$row['ISBN']. "</td><td>" . $row["Title"]. "</td><td>" .
                     $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td><td>" . $row["category"]. "</td><td>". $row["Publication_Date"]. 
                      "</td><td>". $row["rating"]
                        ."</td></tr>";
                   }
             echo"</table>";

             
                 }
             else{
       echo "no books";
           }
        }
 if($value == 2)
       {
          // echo 'pub';
              
                
           $ar = "select * , First_Name, category, ROUND(AVG(rating),1) as rating from books
           INNER JOIN reviews
           ON books.ISBN = reviews.ISBN
           INNER JOIN author ON books.Author_ID = author.id 
           INNER JOIN category ON books.code = category.code
           group by books.ISBN
           order by books.Publication_Date
      ";
  $qr = mysqli_query($con, $ar);
  if($qr && mysqli_num_rows($qr) > 0)
      {
      echo"<table>
      <tr>
      <th>ISBN</th>
      <th>Title</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Category</th>
      <th>Publication Date</th>
      <th>Stars</th>
  </tr>";
  while($row = $qr-> fetch_assoc() )
  {
      echo"<tr><td>" .$row['ISBN']. "</td><td>" . $row["Title"]. "</td><td>" .
      $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td><td>" . $row["category"]. "</td><td>". $row["Publication_Date"]. 
      "</td><td>". $row["rating"]
      ."</td></tr>";
  }
  echo"</table>";

      
  }
  else{
      echo "no books";
          }
       }
 if($value == 3)
        {
           // echo "Category";
                   
            $ar = "select * , First_Name, category, ROUND(AVG(rating),1) as rating from books
            INNER JOIN reviews
            ON books.ISBN = reviews.ISBN
            INNER JOIN author ON books.Author_ID = author.id 
            INNER JOIN category ON books.code = category.code
            group by books.ISBN
            order by category
       ";
   $qr = mysqli_query($con, $ar);
   if($qr && mysqli_num_rows($qr) > 0)
       {
       echo"<table>
       <tr>
       <th>ISBN</th>
       <th>Title</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Category</th>
       <th>Publication Date</th>
       <th>Stars</th>
   </tr>";
   while($row = $qr-> fetch_assoc() )
   {
       echo"<tr><td>" .$row['ISBN']. "</td><td>" . $row["Title"]. "</td><td>" .
       $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td><td>" . $row["category"]. "</td><td>". $row["Publication_Date"]. 
       "</td><td>". $row["rating"]
       ."</td></tr>";
   }
   echo"</table>";

       
   }
   else{
       echo "no books";
           }
        }
 if($value == 4)
       {
           //echo 'Reviews';
                  
           $ar = "select * , First_Name, category, ROUND(AVG(rating),1) as rating from books
           INNER JOIN reviews
           ON books.ISBN = reviews.ISBN
           INNER JOIN author ON books.Author_ID = author.id 
           INNER JOIN category ON books.code = category.code
           group by books.ISBN
           order by rating
      ";
  $qr = mysqli_query($con, $ar);
  if($qr && mysqli_num_rows($qr) > 0)
      {
      echo"<table>
      <tr>
      <th>ISBN</th>
      <th>Title</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Category</th>
      <th>Publication Date</th>
      <th>Stars</th>
  </tr>";
  while($row = $qr-> fetch_assoc() )
  {
      echo"<tr><td>" .$row['ISBN']. "</td><td>" . $row["Title"]. "</td><td>" .
      $row["First_Name"]. "</td><td>" . $row["Last_Name"]. "</td><td>" . $row["category"]. "</td><td>". $row["Publication_Date"]. 
      "</td><td>". $row["rating"]
      ."</td></tr>";
  }
  echo"</table>";

     
  }
  else{
      echo "no books";
          }
       }
    }
    else{
        echo" chart not made";
    }

    
?>
<body onload>
    <?php
    $user_data = check_login($con);
    $userid = $user_data['id'];
   if($value == 0)
   { 
       
       
           
           $ar = "select * , First_Name, category, ROUND(AVG(rating),1) as rating from books
            INNER JOIN reviews
            ON books.ISBN = reviews.ISBN
            INNER JOIN author ON books.Author_ID = author.id 
            INNER JOIN category ON books.code = category.code
            group by books.ISBN
            order by books.Publication_Date
       ";
   $qr = mysqli_query($con, $ar);
   if($qr && mysqli_num_rows($qr) > 0)
       {
           echo "<form method = 'post' action = ''>";
       echo"<table id = 'table1'>
       <tr>
       <th> </th>
       <th>ISBN</th>
       <th>Title</th>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Category</th>
       <th>Publication Date</th>
       <th>Stars</th>
   </tr>";
   $i = 0;
   while($row = $qr-> fetch_assoc() )
   {
       $i= $i+1;
       echo"
    
       <tr>
       <td><input type= 'checkbox'  name='row[]' value= ".$row['ISBN']. "></td>
       <td>" .$row['ISBN']. "</td>
       <td>" . $row["Title"]. "</td>
       <td>" . $row["First_Name"]. "</td>
       <td>" . $row["Last_Name"]. "</td>
       <td>" . $row["category"]. "</td>
       <td>". $row["Publication_Date"]."</td>
       <td>". $row["rating"]."</td>
       </tr>
       
       ";
       
   }
   echo "</form>";
   echo"</table>";
   
   echo"number of rows: ";
    echo $i;
    echo"<br></br>";
    //echo $row[1];
      // echo"regular";
      if(isset($_POST['submit'])){

        if(!empty($_POST['row'])) {
    
            foreach($_POST['row'] as $value){
                // add to cart here
                $q = "insert into cart (user_id, ISBN)
                        values($userid, $value);";
                echo "user id is:";
                echo $userid;
                echo"<br></br>";
                mysqli_query($con, $q);
                echo "Chosen ISBN : ".$value.'<br/>';
            }
    
        }
    
    }
   }
   else{
       echo "no books";
           }
        }

    
    ?>


</body>
<input id = "button" type = "submit"  value = "submit" name = "submit"><br></br>
<input id = "btnGet" type="button" value="Get Selected" />
    </body>
</html>