<?php require './sys/functions.php';
require './set/mysql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php getHeader("Automobile"); ?>
</head>
<body>
  <?php getNavbar(); ?>

  <main>
    <select>
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
  <label>Materialize Select</label>
    <div class="container">

      <table class="centered bordered highlight">
        <thead>
          <tr>
            <th>Id</th>
            <th>Model</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT * FROM car_list
          LEFT JOIN model_list ON car_list.car_model_id = model_list.car_model_id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            print'<tr>
                <td>'.$row["car_id"].'</td> <td>'.$row["car_name"].
                ' </td> <td>'.$row["car_model_name"].' </td> <td> '.$row["car_price"].
                '</td> <td> <a href="del_item.php?id='.$row["car_id"].'"><i class="material-icons">delete_forever</i> </a> </td> </tr>';
          }
          }
          mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>


 <!-- Modal -->
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large red modal-trigger" href="#modal1">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
      <form class="col m7 s12" action="./insert_data.php" method="POST">
    <div class="modal-content">
      <div class="input-field col s12">
        <select>
          <option value="" disabled selected>Choose your option</option>

          <?php
            $sql1 = "SELECT car_model_name FROM model_list";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
            while ($select = $result1->fetch_assoc()) {
              print'<option value="'.$select["car_model_id"].'">'.$select["car_model_id"].'</option>''
           ?>

        </select>
        <label>Select car model</label>
      </div>
      <br>
      <div class="input-field col s12">
        <input placeholder="" id="car_name" name="car_name1" type="text" class="validate">
        <label>Insert car name</label>
      </div>
      <br>
      <div class="input-field col s12">
        <input placeholder="" id="car_price" name="car_price1" type="text" class="validate">
        <label>Insert car price</label>
      </div>
    </div>
    <div class="modal-footer center-align">
     <input type="submit" class="modal-action btn modal-close waves-effect">
    </div>
     </form>
  </div>





  </main>



  <?php getFooter(); ?>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
