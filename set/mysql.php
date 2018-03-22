<?php
$servername = "localhost";
          $username = "admin";
          $password = "admin";
          $db = "car_db";

          $conn = mysqli_connect($servername,$username,$password,$db);

          if (!$conn) {
          echo "Iaca pula tie :D";
          }
          ////

?>
