<?php
require_once 'config/connection.php';
require_once 'model/User.php';

if (isset($_GET['id'])) {
  $user_id = $_GET['id'];
  $user = new User($conn);
  $data = $user->getUserDetails($user_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="assets/image/icons8-male-user-30.png" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Personal Information</title>
</head>

<body style="background-color: rgba(200, 228, 255, 0.13)">

  <header>
    <div class="back2">
      <button onclick="window.location.href='views/dataView.php'"><i class='bx bx-chevron-left'></i></button>
    </div>
    <div class="header-success" style="margin-inline:auto;">
      <h3>Dashboard</h3>
      <h3>Personal Settings</h3>
    </div>
  </header>
  <div class="wrapper">
    <section>
      <div class="left-card">
        <div class="profile">
          <div class="img">
            <img src="assets/image/profile.png" alt="profile picture" />
          </div>
          <h5>Profile</h5>
        </div>

        <div class="card-info">
          <label for="name">Name</label><br />
          <input type="text" value="<?php echo $data['firstname'] . ' ' . strtoupper(substr($data['middle'], 0, 1)) . '. ' . $data['lastname'] ?>" readonly />
        </div>

        <div class="card-info">
          <br /><label for="date">Date of Birth</label><br />
          <input type="text" value="<?php echo date('F d, Y', strtotime($data['date'])); ?>" readonly />
        </div>

        <div class="card-info">
          <br /><label for="age">Age</label><br />
          <input type="text" value="<?php echo $data['age'] . ' years old'; ?>" readonly />
        </div>

        <div class="card-info">
          <br /><label for="status">Civil Status</label><br />
          <input type="text"
            value="<?php echo ($data['civilStatus'] === 'others' && !empty($data['otherStatus'])) ? $data['otherStatus'] : $data['civilStatus']; ?>"
            readonly />
        </div>

        <div class="info-icon">
          <img src="assets/image/info.png" alt="information" />
        </div>
      </div>
    </section>

    <section class="center-section">
      <div class="board2">
        <div class="card-info">
          <label for="sex">Gender</label><br />
          <input type="text" value="<?php echo $data['sex']; ?>" readonly />
        </div>

        <div class="card-info">
          <label for="nationality">Nationality</label><br />
          <input type="text" value="<?php echo $data['nationality']; ?>" readonly />
        </div>

        <div class="card-info">
          <label for="religion">Religion</label><br />
          <input type="text" value="<?php echo $data['religion']; ?>" readonly />
        </div>

        <div class="card-info">
          <label for="tax">Tax Identification Number</label><br />
          <input type="text" value="<?php echo $data['tax']; ?>" readonly />
        </div>
      </div>

      <div class="home-add-card">
        <div class="head-home-add">
          <h5>Home Address</h5>
        </div>

        <div class="infos">
          <img src="assets/image/home.png" alt="home" />
          <small><?php echo $data['houseNo'] . ', ' . $data['street'] . ', ' . $data['baranggay'] . ', ' . $data['cityMunicipality'] . ', ' . $data['province_home']; ?></small>
        </div>
        <br />
        <div class="infos2">
          <div class="card-info2">
            <label for="subdivision">Subdivision</label><br />
            <input type="text" value="<?php echo $data['subdivision']; ?>" readonly />
          </div>
          <div class="card-info2">
            <label for="country">Country</label><br />
            <input type="text" value="<?php echo $data['country']; ?>" readonly />
          </div>
          <div class="card-info2">
            <label for="zip">Zip Code</label><br />
            <input type="text" value="<?php echo $data['zip']; ?>" readonly />
          </div>
        </div>

      </div>


      <div class="home-add-card">

        <div class="birthplace-card">
          <h5>Place of Birth</h5>
          <div class="birth">
            <img src="assets/image/home.png" alt="home" />
            <small>Born in <?php echo $data['birth_house'] . ', ' . $data['birth_street'] . ', ' . $data['birth_baranggay'] . ', ' . $data['municipality_birth'] . ', ' . $data['province_home']; ?></small>
          </div>
        </div>
        <div class="infos2">
          <div class="card-info2">
            <label for="subdivision">Subdivision</label><br />
            <input type="text" value="<?php echo $data['birth_subdivision']; ?>" readonly />
          </div>
          <div class="card-info2">
            <label for="country">Country</label><br />
            <input type="text" value="<?php echo $data['birth_country']; ?>" readonly />
          </div>
          <div class="card-info2">
            <label for="zip">Zip Code</label><br />
            <input type="text" value="<?php echo $data['birth_zip']; ?>" readonly />
          </div>
        </div>
      </div>

    </section>

    <section class="contactinfo">
      <div class="board3">
        <div class="head-board3">
          <img src="assets/image/contact.png" alt="contacte image" />
          <h5>Contact Information</h5>
        </div>

        <div class="card-info">
          <label for="cellphone">Cellphone</label><br />
          <input type="text" value="<?php echo $data['mobile']; ?>" readonly />
        </div>
        <div class="card-info">
          <br /><label for="email">Email Address</label><br />
          <input type="text" value="<?php echo $data['email']; ?>" readonly />
        </div>
        <div class="card-info">
          <br /><label for="telephone">Telephone</label><br />
          <input type="text" value="<?php echo $data['telephone']; ?>" readonly />
        </div>
      </div>
      <div class="guardians-display">
        <h5>Parent's Information</h5>
        <div class="guardian-info">
          <div class="mother-info-display">
            <div class="card-info3">
              <label for="mother">Mother's Name</label><br />
              <input type="text" value="<?php echo $data['firstnameMother'] . ' ' . $data['middleinitialMother'] . '. ' . $data['lastnameMother']; ?>" readonly />
            </div>
          </div>
          <div class="father-info-display">
            <div class="card-info3">
              <label for="father">Father's Name</label><br />
              <input type="text" value="<?php echo $data['firstnameFather'] . ' ' . $data['middleinitialFather'] . '. ' . $data['lastnameFather']; ?>" readonly />
            </div>
          </div>
        </div>
      </div>


    </section>

  </div>

</body>

</html>