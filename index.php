<?php
include 'controller/session_data.php';
// new changes for the form
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="icon" type="image/png" href="assets/image/icons8-google-forms-48.png" />
  <title>Register New Details</title>
</head>

<body>
  <header class="index-head">
    <h3 class="head-p">Register New Data</h3>
    <button onclick="window.location.href='views/dataView.php'">View All</button>
  </header>
  <div class=" container">


    <form action="routes/process.php" class="form" method="POST">
      <input type="hidden" name="id" value="<?= $user['user_id'] ?? '' ?>">
      <div class="tab active first">
        <p class="p1"><b>General Information</b></p>

        <div class="upper">
          <div class="input">
            <label for="lastname">Last Name</label><br />
            <input type="text" name="lastname" value="<?php echo $lastname ?>" placeholder="Last Name" /><br>
            <span class="error"><?php echo $lastnameInvalid; ?></span>
          </div>

          <div class="input">
            <label for="firstname">First Name</label>
            <br />
            <input type="text" name="firstname" value="<?php echo $firstname ?>" placeholder="First Name" /><br>
            <span class="error"><?php echo $firstnameInvalid; ?></span>
          </div>

          <div class="input">
            <label for="middle">Middle Initial</label>
            <br />
            <input type="text" name="middle" value="<?php echo $middle ?>" placeholder="e.g., I" /><br>
            <span class="error"><?php echo $middleInvalid; ?></span>
            <input type="text" id="age" name="age" value="<?php echo $data['age'] ?? ''; ?>" readonly hidden /><br />
          </div>
        </div>

        <div class="center">
          <div class="input">
            <label for="date">Date of Birth</label><br />
            <input type="date" value="<?php echo $date ?>" name="date" /><br />
            <span class="error"><?php echo $dateInvalid; ?></span>
          </div>

          <div class="input2">
            <label for="sex">Sex</label>
            <div class="radio-group">
              <div>
                <input type="radio" name="sex" id="male" value="Male"
                  <?php echo $sex === 'Male' ? 'checked' : ''; ?> />
                <label for="male">Male</label>
              </div>
              <div>
                <input type="radio" name="sex" id="female" value="Female"
                  <?php echo $sex === 'Female' ? 'checked' : ''; ?> />
                <label for="female">Female</label>
              </div>
            </div>
            <span class="error"><?php echo $sexInvalid; ?></span>
          </div>

          <div class="input">
            <label for="civilStatus">Civil Status</label><br />

            <div class="select">
              <select name="civilStatus" id="civilStatus" onchange="clickOthers()">
                <option value="" disabled <?php echo empty($civilStatus) ? 'selected' : ''; ?>>Select Civil Status</option>
                <option value="Single" <?php echo $civilStatus === 'Single' ? 'selected' : ''; ?>>Single</option>
                <option value="Married" <?php echo $civilStatus === 'Married' ? 'selected' : ''; ?>>Married</option>
                <option value="Widowed" <?php echo $civilStatus === 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
                <option value="Legally Separated" <?php echo $civilStatus === 'Legally Separated' ? 'selected' : ''; ?>>Legally Separated</option>
                <option value="others" <?php echo $civilStatus === 'Others' ? 'selected' : ''; ?>>Others</option>
              </select><br>
              <span class="error"><?php echo $civilStatusInvalid; ?></span>
            </div>

            <input
              type="text"
              id="otherStatus"
              name="otherStatus"
              placeholder="Specify your status"
              value="<?php echo $otherStatus; ?>"
              style="display: <?php echo $civilStatus === 'others' ? 'block' : 'none'; ?>;" />
            <span class="error"><?php echo $otherStatusInvalid; ?></span>
          </div>

        </div>
        <div class="center2">
          <div class="input">
            <label for="tax">Tax Identification Number</label><br />
            <input
              type="text"
              name="tax"
              value="<?php echo $tax ?>"
              placeholder="e.g., 123-45-6789" /><br />
            <span class="error"><?php echo $taxInvalid; ?></span>
          </div>
          <div class="input">
            <label for="nationality">Nationality</label><br />
            <input
              type="text"
              name="nationality"
              value="<?php echo $nationality ?>"
              placeholder="Nationality" /><br />
            <span class="error"><?php echo $nationalityInvalid; ?></span>
          </div>
          <div class="input">
            <label for="religion">Religion</label><br />
            <input type="text" name="religion" value="<?php echo $religion ?>" placeholder="Religion" /><br>
            <span class="error"><?php echo $religionInvalid; ?></span>
          </div>
        </div>
        <div class="buttons">
          <button type="button" id="nextBtn" onclick="nextTab()">&#8594;</button>
        </div>
      </div>

      <div class="tab">
        <div class="foot">
          <p class="p1"> <b>Place of Birth</b></p>

          <div class="top-birth">
            <div class="input">
              <label for="birth_unit">RM/FLR/Unit No. & Bldg. Name</label><br />
              <input class="input5" type="text" name="birth_unit" value="<?php echo $birth_unit ?>" placeholder="e.g., 1234 Unit Bldg." /><br>
              <span class="error"><?php echo $birth_unitInvalid; ?></span>
            </div>

            <div class="input">
              <label for="birth_house">House/Lot & Blk. No</label><br />
              <input class="input5" type="text" name="birth_house" value="<?php echo $birth_house ?>" placeholder="e.g., 5678 Block 9" /><br>
              <span class="error"><?php echo $birth_houseInvalid; ?></span>
            </div>

            <div class="input">
              <label for="birth_street">Street Name</label><br />
              <input class="input5" type="text" name="birth_street" value="<?php echo $birth_street ?>" placeholder="e.g., Main Street" /><br>
              <span class="error"><?php echo $birth_streetInvalid; ?></span>
            </div>
          </div>

          <div class="top-birth">
            <div class="input">
              <label for="birth_subdivision">Subdivision</label><br />
              <input class="input5" type="text" name="birth_subdivision" value="<?php echo $birth_subdivision ?>" placeholder="e.g., Sunshine Subdivision" /><br>
              <span class="error"><?php echo $birth_subdivisionInvalid; ?></span>
            </div>

            <div class="input">
              <label for="birth_baranggay">Barangay/District/Locality</label><br />
              <input type="text" name="birth_baranggay" value="<?php echo $birth_baranggay ?>" placeholder="e.g., Tunghaan" /><br>
              <span class="error"><?php echo $birth_baranggayInvalid; ?></span>
            </div>

            <div class="input">
              <label for="municipality_birth">City/Municipality</label><br />
              <input class="input5" type="text" name="municipality_birth" value="<?php echo $municipality_birth ?>" placeholder="e.g., Minglanilla" /><br>
              <span class="error"><?php echo $municipalityInvalid; ?></span>
            </div>
          </div>

          <div class="top-birth">

            <div class="input">
              <label for="province_birth">Province</label><br />
              <input type="text" name="province_birth" value="<?php echo $province_birth ?>" placeholder="e.g.,Cebu Province" /><br>
              <span class="error"><?php echo $provinceInvalid; ?></span>
            </div>

            <?php

            $countriesData = file_get_contents("countries.json");
            $countries = json_decode($countriesData, true);

            $selectedBirthCountry = isset($_SESSION['birth_country']) ? $_SESSION['birth_country'] : "";
            ?>

            <div class="input">
              <label for="birth_country">Country</label><br />
              <select name="birth_country">
                <option value="">Select a country</option>
                <?php
                foreach ($countries as $birth_country) {
                  $isSelected = ($birth_country === $selectedBirthCountry) ? " selected" : "";
                  echo "<option value='$birth_country'$isSelected>$birth_country</option>";
                }
                ?>
              </select><br />
              <span class="error"><?php echo $birth_countryInvalid; ?></span>
            </div>


            <div class="input">
              <label for="birth_zip">Zip Code</label><br />
              <input type="text" name="birth_zip" value="<?php echo $birth_zip ?>" placeholder="e.g., 6046" /><br>
              <span class="error"><?php echo $birth_zipInvalid; ?></span>
            </div>

          </div>
          <div class="buttons home_button">
            <button type="button" id="prevBtn" onclick="prevTab()">&#8592;</button>
            <button type="button" id="nextBtn" onclick="nextTab()">&#8594;</button>
          </div>
        </div>
      </div>


      <div class="tab">
        <div class="foot">
          <p class="p1"> <b>Home Address</b></p>

          <div class="top-birth">
            <div class="input in_num">
              <label for="unit">RM/FLR/Unit No. & Bldg. Name</label><br />
              <input
                type="text"
                name="unit"
                value="<?php echo $unit ?>"
                placeholder="e.g., 1234 Unit Bldg." /><br />
              <span class="error"><?php echo $unitInvalid; ?></span>
            </div>

            <div class="input in_num">
              <label for="houseNo">House/Lot & Blk. No</label><br />
              <input
                type="text"
                name="houseNo"
                value="<?php echo $houseNo ?>"
                placeholder="e.g., 5678 Block 9" /><br />
              <span class="error"><?php echo $houseNoInvalid; ?></span>
            </div>

            <div class="input">
              <label for="street">Street Name</label><br />
              <input
                type="text"
                name="street"
                value="<?php echo $street ?>"
                placeholder="e.g., Main Street" /><br />
              <span class="error"><?php echo $streetInvalid; ?></span>
            </div>
          </div>

          <div class="top-birth">
            <div class="input">
              <label for="subdivision">Subdivision</label><br />
              <input
                type="text"
                name="subdivision"
                value="<?php echo $subdivision ?>"
                placeholder="e.g., Sunshine Subdivision" /><br />
              <span class="error"><?php echo $subdivisionInvalid; ?></span>
            </div>

            <div class="input">
              <label for="baranggay">Barangay/District/Locality</label><br />
              <input type="text" name="baranggay" value="<?php echo $baranggay ?>" placeholder="e.g., Tunghaan" /><br>
              <span class="error"><?php echo $baranggayInvalid; ?></span>
            </div>

            <div class="input">
              <label for="cityMunicipality">City/Municipality</label><br />
              <input class="input5" type="text" name="cityMunicipality" value="<?php echo $cityMunicipality ?>" placeholder="e.g., Minglanilla" /><br>
              <span class="error"><?php echo $cityMunicipalityInvalid; ?></span>
            </div>
          </div>

          <div class="top-birth">

            <div class="input">
              <label for="province_home">Province</label><br />
              <input type="text" name="province_home" value="<?php echo $province_home ?>" placeholder="e.g., Cebu Province" /><br>
              <span class="error"><?php echo $provinceInvalid; ?></span>
            </div>

            <?php

            $countriesData = file_get_contents("countries.json");
            $countries = json_decode($countriesData, true);

            $selectedHomeCountry = isset($_SESSION['country']) ? $_SESSION['country'] : "";
            ?>

            <div class="input">
              <label for="country">Country</label><br />
              <select name="country">
                <option value="">Select a country</option>
                <?php
                foreach ($countries as $country) {
                  $isSelected = ($country === $selectedHomeCountry) ? " selected" : "";
                  echo "<option value='$country'$isSelected>$country</option>";
                }
                ?>
              </select><br />
              <span class="error"><?php echo $countryInvalid; ?></span>
            </div>



            <div class="input">
              <label for="zip">Zip Code</label><br />
              <input type="text" name="zip" value="<?php echo $zip ?>" placeholder="e.g., 6046" /><br>
              <span class="error"><?php echo $zipInvalid; ?></span>
            </div>

          </div>
          <div class="buttons home_button">
            <button type="button" id="prevBtn" onclick="prevTab()">&#8592;</button>
            <button type="button" id="nextBtn" onclick="nextTab()">&#8594;</button>
          </div>
        </div>
      </div>


      <div class="tab">
        <p class="p1"><b>Contact Information</b></p>

        <div class="upper">
          <div class="input">
            <label for="mobile">Mobile/ Cellphone Number</label>
            <input
              type="text"
              name="mobile"
              value="<?php echo $mobile ?>"
              placeholder="e.g., 09123456789" /><br />
            <span class="error"><?php echo $mobileInvalid; ?></span>
          </div>
          <div class="input">
            <label for="email">Email Address</label><br />
            <input
              type="email"
              name="email"
              value="<?php echo $email ?>"
              placeholder="Email Address" /><br />
            <span class="error"><?php echo $emailInvalid; ?></span>
          </div>
          <div class="input">
            <label for="telephone">Telephone</label><br />
            <input
              type="text"
              name="telephone"
              value="<?php echo $telephone ?>"
              placeholder="e.g., +1 (746) 672-4801" /><br />
            <span class="error"><?php echo $telephoneInvalid; ?></span>
          </div>
        </div>
        <p class="p1"><b>Guardian's Information</b></p>
        <div class="guardian">
          <div class="father_info">
            <p class="p1">Father's Name</p>
            <label for="lastnameFather">Last Name</label><br />
            <input
              type="text"
              name="lastnameFather"
              value="<?php echo $lastnameFather ?>"
              placeholder="Father's Last Name" /><br />
            <span class="error"><?php echo $lastnameFatherInvalid; ?></span>
            <br>
            <label for="firstnameFather">First Name</label><br />
            <input
              type="text"
              name="firstnameFather"
              value="<?php echo $firstnameFather ?>"
              placeholder="Father's First Name" /><br />
            <span class="error"><?php echo $firstnameFatherInvalid; ?></span>
            <br>
            <label for="middleinitialFather">Middle Name</label><br />
            <input
              type="text"
              name="middleinitialFather"
              value="<?php echo $middleinitialFather ?>"
              placeholder="Father's Middle Name" /><br />
            <span class="error"><?php echo $middleinitialFatherInvalid; ?></span>
            <br>
          </div>

          <div class="mother_info">
            <p class="p1">Mother's Maiden Name</p>
            <label for="lastnameMother">Last Name</label><br />
            <input
              type="text"
              name="lastnameMother"
              value="<?php echo $lastnameMother ?>"
              placeholder="Mother's Last Name" /><br />
            <span class="error"><?php echo $lastnameMotherInvalid; ?></span>
            <br>
            <label for="firstnameMother">First Name</label><br />
            <input
              type="text"
              name="firstnameMother"
              value="<?php echo $firstnameMother ?>"
              placeholder="Mother's First Name" /><br />
            <span class="error"><?php echo $firstnameMotherInvalid; ?></span> <br>
            <label for="middleinitialMother">Middle Name</label><br />
            <input
              type="text"
              name="middleinitialMother"
              value="<?php echo $middleinitialMother ?>"
              placeholder="Mother's Middle Name" /><br />
            <span class="error"><?php echo $middleinitialMotherInvalid; ?></span> <br>
          </div>
        </div>

        <div class="buttons button2">
          <button type="button" id="prevBtn" onclick="prevTab()">&#8592;</button>
          <button type="submit">Add User Details</button>
        </div>
      </div>
    </form>
  </div>

  <script src="assets/js/main.js"></script>
</body>

</html>