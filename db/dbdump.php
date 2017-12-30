<?php
  $info = unserialize($_SESSION['info']);
  $passengers = $info->get_nbr_passengers();
  $cars =  $info->get_cars();
  $price = $info->get_price();
  $insurance = $info->get_insurance();
  if ($insurance != true)
  {
    $insurance = 0;
  }

  $personal = $info->get_personal_info();
  $pass1 = $personal[0][0] . ' ' . $personal[0][1];
  $pass2 = '';
  $pass3 = '';
  $pass4 = '';

  if ($passengers > 1)
  {
    $pass2 = $personal[1][0] . ' ' . $personal[1][1];

    if ($passengers > 2)
    {
      $pass3 = $personal[2][0] . ' ' . $personal[2][1];

      if ($passengers > 3)
      {
        $pass4 = $personal[3][0]  . ' ' . $personal[3][1];
      }
    }
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "reservation";


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "INSERT INTO party (car, price, insurance, pass1, pass2, pass3, pass4)
  VALUES ('$cars', '$price', '$insurance', '$pass1', '$pass2', '$pass3', '$pass4')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

  $_SESSION['info'] = serialize($info);

  include "./destruct.php";
?>