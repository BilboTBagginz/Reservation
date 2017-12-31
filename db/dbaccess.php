<form method='post' action='dbdel.php'>
  Enter the key of a party you want to be deleted
      
      <input type='text' name='del' ;?>
      <input type='submit' value='Delete'/>
    </form>


<?php
 
  //connect to the database
  $con=mysqli_connect("localhost","root","","reservation");
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  $result = mysqli_query($con,"SELECT * FROM party");
  //display the content of the table
  while($row = mysqli_fetch_array($result))
    {
    echo $row['Pk_party']." ".$row['car']." ".$row['price']." ".$row['insurance']." ".$row['pass1']." ".$row['pass2']." ".$row['pass3']." ".$row['pass4'];
    echo "<br />";
    }

  mysqli_close($con);
?>