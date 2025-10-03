<?php
include '../controller/session_data.php';
require_once '../config/connection.php';
require_once '../model/User.php';
session_destroy();
$user = new User($conn);
$data = $_SESSION['old_input'] ?? [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && isset($_GET['id']) && empty($data)) {
    $user_id = $_GET['id'];
    $data = $user->getUserDetails($user_id);
}
// unset($_SESSION['old_input']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="icon" type="image/png" href="../assets/image/icons8-female-user-update-64.png" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Form Input</title>
</head>

<body>
    <header class="update-header">

        <div class="update-con">
            <button onclick="window.location.href='../views/dataView.php'"><i class='bx bx-chevron-left'></i></button>
            <h3 class="">Update Personal Information</h3>

        </div>

    </header>

    <div class="container">
        <form action="../routes/process.php" class="form" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $data['user_id'] ?? '' ?>">
            <div class="tab active first">
                <p class="p1"><b>Personal Information</b></p>


                <div class="upper">
                    <div class="input">
                        <label for="lastname">Last Name</label><br />
                        <input type="text" name="lastname"
                            value="<?php echo $data['lastname'] ?>"
                            placeholder="Last Name" />
                        <br>
                        <span class="error"><?php echo $lastnameInvalid ?? ''; ?></span>
                    </div>

                    <div class="input">
                        <label for="firstname">First Name</label>
                        <br />
                        <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>" placeholder="First Name" /><br>
                        <span class="error"><?php echo $firstnameInvalid; ?></span>
                    </div>

                    <div class="input">
                        <label for="middle">Middle Initial</label>
                        <br />
                        <input type="text" name="middle" value="<?php echo $data['middle'] ?>" placeholder="e.g., I" /><br>
                        <span class="error"><?php echo $middleInvalid; ?></span>
                        <input type="text" id="age" name="age" value="<?php echo $data['age'] ?? ''; ?>" readonly hidden /><br />
                    </div>
                </div>

                <div class="center">
                    <div class="input">
                        <label for="date">Date of Birth</label><br />
                        <input type="date" value="<?php echo $data['date'] ?>" name="date" /><br />
                        <span class="error"><?php echo $dateInvalid; ?></span>
                    </div>

                    <div class="input2">
                        <label for="sex">Sex</label>
                        <div class="radio-group">
                            <div>
                                <input type="radio" name="sex" id="male" value="Male"
                                    <?php echo isset($data['sex']) && $data['sex'] === 'Male' ? 'checked' : ''; ?> />
                                <label for="male">Male</label>
                            </div>
                            <div>
                                <input type="radio" name="sex" id="female" value="Female"
                                    <?php echo isset($data['sex']) && $data['sex'] === 'Female' ? 'checked' : ''; ?> />
                                <label for="female">Female</label>
                            </div>
                        </div>
                        <span class="error"><?php echo $sexInvalid; ?></span>
                    </div>

                    <div class="input">
                        <label for="civilStatus">Civil Status</label><br />

                        <div class="select">
                            <select name="civilStatus" id="civilStatus" onchange="clickOthers()">
                                <option value="" disabled <?php echo empty($data['civilStatus']) ? 'selected' : ''; ?>>Select Civil Status</option>
                                <option value="Single" <?php echo $data['civilStatus'] === 'Single' ? 'selected' : ''; ?>>Single</option>
                                <option value="Married" <?php echo $data['civilStatus'] === 'Married' ? 'selected' : ''; ?>>Married</option>
                                <option value="Widowed" <?php echo $data['civilStatus'] === 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
                                <option value="Legally Separated" <?php echo $data['civilStatus'] === 'Legally Separated' ? 'selected' : ''; ?>>Legally Separated</option>
                                <option value="others" <?php echo $data['civilStatus'] === 'others' ? 'selected' : ''; ?>>Others</option>
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
                            value="<?php echo $data['tax'] ?>"
                            placeholder="e.g., 123-45-6789" /><br />
                        <span class="error"><?php echo $taxInvalid; ?></span>
                    </div>
                    <div class="input">
                        <label for="nationality">Nationality</label><br />
                        <input
                            type="text"
                            name="nationality"
                            value="<?php echo $data['nationality'] ?>"
                            placeholder="Nationality" /><br />
                        <span class="error"><?php echo $nationalityInvalid; ?></span>
                    </div>
                    <div class="input">
                        <label for="religion">Religion</label><br />
                        <input type="text" name="religion" value="<?php echo $data['religion'] ?>" placeholder="Religion" /><br>
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
                            <input class="input5" type="text" name="birth_unit" value="<?php echo $data['birth_unit'] ?>" placeholder="e.g., 1234 Unit Bldg." /><br>
                            <span class="error"><?php echo $birth_unitInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="birth_house">House/Lot & Blk. No</label><br />
                            <input class="input5" type="text" name="birth_house" value="<?php echo $data['birth_house'] ?>" placeholder="e.g., 5678 Block 9" /><br>
                            <span class="error"><?php echo $birth_houseInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="birth_street">Street Name</label><br />
                            <input class="input5" type="text" name="birth_street" value="<?php echo $data['birth_street'] ?>" placeholder="e.g., Main Street" /><br>
                            <span class="error"><?php echo $birth_streetInvalid; ?></span>
                        </div>
                    </div>

                    <div class="top-birth">
                        <div class="input">
                            <label for="birth_subdivision">Subdivision</label><br />
                            <input class="input5" type="text" name="birth_subdivision" value="<?php echo $data['birth_subdivision'] ?>" placeholder="e.g., Sunshine Subdivision" /><br>
                            <span class="error"><?php echo $birth_subdivisionInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="birth_baranggay">Barangay/District/Locality</label><br />
                            <input type="text" name="birth_baranggay" value="<?php echo $data['birth_baranggay'] ?>" placeholder="e.g., Tunghaan" /><br>
                            <span class="error"><?php echo $birth_baranggayInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="municipality_birth">City/Municipality</label><br />
                            <input class="input5" type="text" name="municipality_birth" value="<?php echo $data['municipality_birth'] ?>" placeholder="e.g., Minglanilla" /><br>
                            <span class="error"><?php echo $municipalityInvalid; ?></span>
                        </div>
                    </div>

                    <div class="top-birth">

                        <div class="input">
                            <label for="province_birth">Province</label><br />
                            <input type="text" name="province_birth" value="<?php echo $data['province_birth'] ?>" placeholder="e.g.,Cebu Province" /><br>
                            <span class="error"><?php echo $provinceInvalid; ?></span>
                        </div>

                        <?php

                        $countriesData = file_get_contents("../countries.json");
                        $countries = json_decode($countriesData, true);

                        $selectedBirthCountry = isset($_SESSION['birth_country']) ? $_SESSION['birth_country'] : "";
                        ?>

                        <div class="input">
                            <label for="birth_country">Country</label><br />
                            <select name="birth_country">
                                <option value="">Select a country</option>
                                <?php
                                foreach ($countries as $birth_country) {
                                    $isSelected = ($birth_country === $data['birth_country']) ? " selected" : "";
                                    echo "<option value='$birth_country'$isSelected>$birth_country</option>";
                                }
                                ?>
                            </select><br />
                            <span class="error"><?php echo $birth_countryInvalid; ?></span>
                        </div>


                        <div class="input">
                            <label for="birth_zip">Zip Code</label><br />
                            <input type="text" name="birth_zip" value="<?php echo $data['birth_zip'] ?>" placeholder="e.g., 6046" /><br>
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
                                value="<?php echo $data['unit'] ?>"
                                placeholder="e.g., 1234 Unit Bldg." /><br />
                            <span class="error"><?php echo $unitInvalid; ?></span>
                        </div>

                        <div class="input in_num">
                            <label for="houseNo">House/Lot & Blk. No</label><br />
                            <input
                                type="text"
                                name="houseNo"
                                value="<?php echo $data['houseNo'] ?>"
                                placeholder="e.g., 5678 Block 9" /><br />
                            <span class="error"><?php echo $houseNoInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="street">Street Name</label><br />
                            <input
                                type="text"
                                name="street"
                                value="<?php echo $data['street'] ?>"
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
                                value="<?php echo $data['subdivision'] ?>"
                                placeholder="e.g., Sunshine Subdivision" /><br />
                            <span class="error"><?php echo $subdivisionInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="baranggay">Barangay/District/Locality</label><br />
                            <input type="text" name="baranggay" value="<?php echo $data['baranggay'] ?>" placeholder="e.g., Tunghaan" /><br>
                            <span class="error"><?php echo $baranggayInvalid; ?></span>
                        </div>

                        <div class="input">
                            <label for="cityMunicipality">City/Municipality</label><br />
                            <input class="input5" type="text" name="cityMunicipality" value="<?php echo $data['cityMunicipality'] ?>" placeholder="e.g., Minglanilla" /><br>
                            <span class="error"><?php echo $cityMunicipalityInvalid; ?></span>
                        </div>
                    </div>

                    <div class="top-birth">

                        <div class="input">
                            <label for="province_home">Province</label><br />
                            <input type="text" name="province_home" value="<?php echo $data['province_home'] ?>" placeholder="e.g., Cebu Province" /><br>
                            <span class="error"><?php echo $provinceInvalid; ?></span>
                        </div>

                        <?php

                        $countriesData = file_get_contents("../countries.json");
                        $countries = json_decode($countriesData, true);

                        $selectedHomeCountry = isset($_SESSION['country']) ? $_SESSION['country'] : "";
                        ?>

                        <div class="input">
                            <label for="country">Country</label><br />
                            <select name="country">
                                <option value="">Select a country</option>
                                <?php
                                foreach ($countries as $country) {
                                    $isSelected = ($country === $data['country']) ? " selected" : "";
                                    echo "<option value='$country'$isSelected>$country</option>";
                                }
                                ?>
                            </select><br />
                            <span class="error"><?php echo $countryInvalid; ?></span>
                        </div>



                        <div class="input">
                            <label for="zip">Zip Code</label><br />
                            <input type="text" name="zip" value="<?php echo $data['zip'] ?>" placeholder="e.g., 6046" /><br>
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
                <h5>Contact Information</h5>

                <div class="upper">
                    <div class="input">
                        <label for="mobile">Mobile/ Cellphone Number</label>
                        <input
                            type="text"
                            name="mobile"
                            value="<?php echo $data['mobile'] ?>"
                            placeholder="e.g., 09123456789" /><br />
                        <span class="error"><?php echo $mobileInvalid; ?></span>
                    </div>
                    <div class="input">
                        <label for="email">Email Address</label><br />
                        <input
                            type="email"
                            name="email"
                            value="<?php echo $data['email'] ?>"
                            placeholder="Email Address" /><br />
                        <span class="error"><?php echo $emailInvalid; ?></span>
                    </div>
                    <div class="input">
                        <label for="telephone">Telephone</label><br />
                        <input
                            type="text"
                            name="telephone"
                            value="<?php echo $data['telephone'] ?>"
                            placeholder="e.g., (032) 123-4567" /><br />
                        <span class="error"><?php echo $telephoneInvalid; ?></span>
                    </div>
                </div>
                <h5>Guardian's Information</h5>
                <div class="guardian">
                    <div class="father_info">
                        <h5>Father's Name</h5>
                        <label for="lastnameFather">Last Name</label><br />
                        <input
                            type="text"
                            name="lastnameFather"
                            value="<?php echo $data['lastnameFather'] ?>"
                            placeholder="Father's Last Name" /><br />
                        <span class="error"><?php echo $lastnameFatherInvalid; ?></span>
                        <br>
                        <label for="firstnameFather">First Name</label><br />
                        <input
                            type="text"
                            name="firstnameFather"
                            value="<?php echo $data['firstnameFather'] ?>"
                            placeholder="Father's First Name" /><br />
                        <span class="error"><?php echo $firstnameFatherInvalid; ?></span>
                        <br>
                        <label for="middleinitialFather">Middle Name</label><br />
                        <input
                            type="text"
                            name="middleinitialFather"
                            value="<?php echo $data['middleinitialFather'] ?>"
                            placeholder="Father's Middle Name" /><br />
                        <span class="error"><?php echo $middleinitialFatherInvalid; ?></span>
                        <br>
                    </div>

                    <div class="mother_info">
                        <h5>Mother's Maiden Name</h5>
                        <label for="lastnameMother">Last Name</label><br />
                        <input
                            type="text"
                            name="lastnameMother"
                            value="<?php echo $data['lastnameMother'] ?>"
                            placeholder="Mother's Last Name" /><br />
                        <span class="error"><?php echo $lastnameMotherInvalid; ?></span>
                        <br>
                        <label for="firstnameMother">First Name</label><br />
                        <input
                            type="text"
                            name="firstnameMother"
                            value="<?php echo $data['firstnameMother'] ?>"
                            placeholder="Mother's First Name" /><br />
                        <span class="error"><?php echo $firstnameMotherInvalid; ?></span> <br>
                        <label for="middleinitialMother">Middle Name</label><br />
                        <input
                            type="text"
                            name="middleinitialMother"
                            value="<?php echo $data['middleinitialMother'] ?>"
                            placeholder="Mother's Middle Name" /><br />
                        <span class="error"><?php echo $middleinitialMotherInvalid; ?></span> <br>
                    </div>
                </div>

                <div class="buttons button2">
                    <button type="button" onclick="prevTab()">&#8592;</button>
                    <button type="submit" name="update_user" value="<?= $data['user_id'] ?? '' ?>">Update Details</button>
                </div>
            </div>
        </form>
    </div>

    <script src="../assets/js/main.js"></script>
</body>

</html>