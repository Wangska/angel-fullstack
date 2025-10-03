<?php
include 'config/connection.php';

$query = "SELECT DISTINCT city_municipality FROM addresses";
$statement = $conn->query($query);
$cities = $statement->fetchAll();

$selectedCity = isset($_POST['city']) ? $_POST['city'] : null;
$place = [];

if (!empty($selectedCity)) {
    $query = "SELECT addresses.*, users.firstname FROM addresses INNER JOIN users on addresses.user_id=users.user_id WHERE city_municipality=:city";
    $statement = $conn->prepare($query);
    $statement->bindValue(":city", $selectedCity);
    $statement->execute();
    $place = $statement->fetchAll();

    $count = "SELECT COUNT(*) AS total FROM addresses WHERE city_municipality=:city";
    $statement = $conn->prepare($count);
    $statement->bindValue(":city", $selectedCity);
    $statement->execute();
    $cityCount = $statement->fetch();
    $totalCount = $cityCount['total'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action=""></form>

<body>
    <form action="" method="POST">

        <label for="city">Select City</label>
        <select name="city" onchange="this.form.submit()">
            <option value="">Select Municipality</option>
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

        <h3>Display of Places From <?php echo $selectedCity ?></h3>
        <ul>
            <?php
            foreach ($place as $places) {
                echo $places['firstname'] . "<br>";
            }
            ?>
        </ul>

        <h3>Number of People living in <?php echo $selectedCity ?></h3>
        <h1><?php echo $totalCount ?></h1>
    </form>
</body>

</html>