<?php
include '../config/connection.php';

$get_zip = "SELECT DISTINCT zip FROM addresses";
$statement = $conn->query($get_zip);
$zip_codes = $statement->fetchAll();

$selectedZip = isset($_POST['zip']) ?
  $_POST['zip'] : null;
$zip = [];

if (!empty($selectedZip)) {
  $query = "SELECT * FROM addresses WHERE zip=:zip";
  $statement = $conn->prepare($query);
  $statement->bindValue(":zip", $selectedZip);
  $statement->execute();
  $zip = $statement->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <form action="" method="post">
    <label for="">Select Zip Code</label>
    <select name="zip" onchange="this.form.submit()">
      <option value="">Select Zip Code</option>
      <?php foreach ($zip_codes as $code) {
        $ZipCode = $code['zip'];
        if ($selectedZip == $ZipCode) {
          $isSelected = 'selected';
        } else {
          $isSelected = '';
        }

        echo "<option value='$ZipCode' $isSelected> $ZipCode</option>";
      }
      ?>
    </select>
  </form>

  <h2>Zip Code: <?php echo $selectedZip ?></h2>
  <ul>
    <?php foreach ($zip as $zipCode) {
      echo $zipCode['zip'] . "-" . $zipCode['city_municipality'] . "<br>";
    } ?>
  </ul>


  <?php
  include 'config/connection.php';

  $query = "SELECT DISTINCT city_municipality FROM addresses ORDER BY city_municipality ASC";
  $stmt = $conn->query($query);
  $cities = $stmt->fetchAll();


  $selectedCity = isset($_POST['city']) ? $_POST['city'] : null;
  $places = [];

  if (!empty($selectedCity)) {
    $query = "SELECT * FROM addresses WHERE city_municipality = :city";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":city", $selectedCity, PDO::PARAM_STR);
    $stmt->execute();
    $places = $stmt->fetchAll();
  }

  //   if (!empty($selectedCity)) {
  //     $query = "SELECT addresses.*, users.firstname 
  //     FROM addresses 
  //     INNER JOIN users ON addresses.user_id = users.user_id
  //     WHERE addresses.city_municipality = :city";
  //     $statement = $conn->prepare($query);
  //     $statement->bindValue(":city", $selectedCity);
  //     $statement->execute();
  //     $places = $statement->fetchAll();
  // }
  ?>
  <!-- cities -->
  <form method="POST">
    <label>Select City:</label>
    <select name="city" onchange="this.submit.form()">
      <option value="">Select City</option>
      <?php
      foreach ($cities as $city) {
        $cityName = $city['city_municipality'];

        if ($selectedCity == $cityName) {
          $isSelected = 'selected';
        } else {
          $isSelected = '';
        }


        echo "<option value='$cityName' $isSelected>$cityName</option>";
      }

      ?>
    </select>
  </form>


  <h2>Places in <?php echo $selectedCity; ?></h2>
  <ul>
    <?php foreach ($places as $place) { ?>
      <li><?php echo $place['city_municipality'] . " - " . $place['baranggay'] . "-" . $place['unit']; ?></li>
    <?php } ?>
  </ul>
  <!-- count -->
  <?php
  if (!empty($selectedCity)) {
    $countQuery = "SELECT COUNT(*) AS total FROM addresses WHERE city_municipality = :city";
    $stmt = $conn->prepare($countQuery);
    $stmt->bindValue(":city", $selectedCity);
    $stmt->execute();
    $cityCount = $stmt->fetch();
    $totalCount = $cityCount['total'];

    echo "<h3>Total Addresses in $selectedCity: $totalCount</h3>";
  } else {
    echo "<h3>Select a city to see the count</h3>";
  }
  ?>

</body>

</html>