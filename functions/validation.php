<?php
require_once '../controller/session_data.php';
ob_start();



$validationFields = [
    'lastnameInvalid',
    'firstnameInvalid',
    'middleInvalid',
    'dateInvalid',
    'sexInvalid',
    'civilStatusInvalid',
    'otherStatusInvalid',
    'taxInvalid',
    'nationalityInvalid',
    'religionInvalid',

    "birth_unitInvalid",
    "birth_houseInvalid",
    "birth_streetInvalid",
    "birth_subdivisionInvalid",
    "birth_baranggayInvalid",
    "municipalityInvalid",
    "provinceInvalid",
    "birth_countryInvalid",
    "birth_zipInvalid",

    "unitInvalid",
    "houseNoInvalid",
    "streetInvalid",
    "subdivisionInvalid",
    "baranggayInvalid",
    "cityMunicipalityInvalid",
    "province_homeInvalid",
    "countryInvalid",
    "zipInvalid",

    'mobileInvalid',
    'emailInvalid',
    'telephoneInvalid',

    'lastnameFatherInvalid',
    'firstnameFatherInvalid',
    'middleinitialFatherInvalid',

    'lastnameMotherInvalid',
    'firstnameMotherInvalid',
    'middleinitialMotherInvalid'
];

foreach ($validationFields as $field) {
    $_SESSION[$field] = '';
}

$valid = true;

$dataFields = [
    'lastname',
    'firstname',
    'middle',
    'date',
    'sex',
    'civilStatus',
    'otherStatus',
    'tax',
    'nationality',
    'religion',

    "birth_unit",
    "birth_house",
    "birth_street",
    "birth_subdivision",
    "birth_baranggay",
    "municipality_birth",
    "province_birth",
    "birth_country",
    "birth_zip",

    "unit",
    "houseNo",
    "street",
    "subdivision",
    "baranggay",
    "cityMunicipality",
    "province_home",
    "country",
    "zip",

    'mobile',
    'email',
    'telephone',

    'lastnameFather',
    'firstnameFather',
    'middleinitialFather',

    'lastnameMother',
    'firstnameMother',
    'middleinitialMother'
];

foreach ($dataFields as $field) {
    $_SESSION[$field] = trim($_POST[$field]);
}

// require
function validateRequiredField($fieldName, $validationSession, $errorMessage, &$valid)
{
    if (empty($_POST[$fieldName])) {
        $_SESSION[$validationSession] = $errorMessage;
        $valid = false;
    }
}

// only letter, proper name
function validateNameField($fieldName, $validationSession, $errorMessage, &$valid)
{
    validateRequiredField($fieldName, $validationSession, $errorMessage, $valid);

    if ($valid && !preg_match("/^[A-Z][a-zA-Z\s]*$/", $_POST[$fieldName])) {
        $_SESSION[$validationSession] = 'Must start with a capital letter and contain only letters!';
        $valid = false;
    }
}

// middle initial example I.
function validateMiddleInitial($fieldName, $validationSession, &$valid)
{
    validateRequiredField($fieldName, $validationSession, 'Middle Initial is required', $valid);

    if ($valid && !preg_match("/^[A-Z](\.)?$/", $_POST[$fieldName])) {
        $_SESSION[$validationSession] = 'Middle initial should be a single uppercase letter, optionally followed by a period.';
        $valid = false;
    }
}


// validaiton age (18 up dapat)
function validateDateOfBirth($fieldName, $validationSession, &$valid)
{
    validateRequiredField($fieldName, $validationSession, 'Date is required!', $valid);

    if ($valid) {
        $birthDate = new DateTime($_POST[$fieldName]);
        $now = new DateTime();
        $age = $now->diff($birthDate)->y;

        if ($age < 18) {
            $_SESSION[$validationSession] = 'You must be at least 18 years old!';
            $valid = false;
        }
    }
}
//  Only Letters
function checkLetters($value)
{
    return preg_match("/^[A-Z][a-zA-Z\s]*$/", $value);
}

//  Numbers Only
function isNumber($value)
{
    return preg_match("/^[0-9]+$/", $value);
}

//  Tax Format (XXX-XX-XXXX)
function validateTax($fieldName, $validationSession, &$valid)
{
    validateRequiredField($fieldName, $validationSession, 'Tax number is required!', $valid);
    if ($valid && !preg_match("/^[0-9]{3}-[0-9]{2}-[0-9]{4}$/", $_POST[$fieldName])) {
        $_SESSION[$validationSession] = 'Invalid format (XXX-XX-XXXX)';
        $valid = false;
    }
}

//  Generic Text Input (Capitalized & Letters)
function validateTextInput($fieldName, $validationSession, $errorMessage, &$valid)
{
    validateRequiredField($fieldName, $validationSession, $errorMessage, $valid);

    if ($valid && !preg_match('/^[A-Z][A-Za-z0-9 ]*$/', $_POST[$fieldName])) {
        $_SESSION[$validationSession] = 'Invalid input! Must start with a capital letter and contain only letters, numbers, and spaces.';
        $valid = false;
    }
}

// email validaiton
function validateEmail($fieldName, $validationSession, &$valid)
{
    validateRequiredField($fieldName, $validationSession, 'Email is required!', $valid);

    if ($valid && !filter_var($_POST[$fieldName], FILTER_VALIDATE_EMAIL)) {
        $_SESSION[$validationSession] = 'Invalid email format!';
        $valid = false;
    }
}

// numbers onl
function validateNumeric($fieldName, $validationSession, $errorMessage, &$valid)
{
    validateRequiredField($fieldName, $validationSession, $errorMessage, $valid);
    if ($valid && !isNumber($_POST[$fieldName])) {
        $_SESSION[$validationSession] = 'Must be numeric!';
        $valid = false;
    }
}

function validateTelephone($fieldName, $validationSession, $errorMessage, &$valid)
{

    validateRequiredField($fieldName, $validationSession, $errorMessage, $valid);
    if ($valid && !preg_match("/^\+1 \(\d{3}\) \d{3}-\d{4}$/", $_POST[$fieldName])) {
        $_SESSION[$validationSession] = 'Telephone number must be in the format: +1 (746) 672-4801';
        $valid = false;
    }
}


function validateUserInput(&$valid)
{
    global $validationFields;
    foreach ($validationFields as $field) {
        $_SESSION[$field] = '';
    }

    // personal details
    validateNameField('lastname', 'lastnameInvalid', 'Last name is required!', $valid);
    validateNameField('firstname', 'firstnameInvalid', 'First name is required!', $valid);
    validateMiddleInitial('middle', 'middleInvalid', $valid);

    // parent's names
    validateNameField('lastnameFather', 'lastnameFatherInvalid', 'Father\'s last name is required!', $valid);
    validateNameField('firstnameFather', 'firstnameFatherInvalid', 'Father\'s first name is required!', $valid);
    validateNameField('middleinitialFather', 'middleinitialFatherInvalid', 'Father\'s middle name is required!', $valid);

    validateNameField('lastnameMother', 'lastnameMotherInvalid', 'Mother\'s last name is required!', $valid);
    validateNameField('firstnameMother', 'firstnameMotherInvalid', 'Mother\'s first name is required!', $valid);
    validateNameField('middleinitialMother', 'middleinitialMotherInvalid', 'Mother\'s middle name is required!', $valid);

    validateNameField('nationality', 'nationalityInvalid', 'Nationality is required!', $valid);
    validateNameField('religion', 'religionInvalid', 'Religion is required!', $valid);

    // date of birth
    validateDateOfBirth('date', 'dateInvalid', $valid);

    // sex/gender
    validateRequiredField('sex', 'sexInvalid', 'Gender is required!', $valid);

    // civil status
    validateRequiredField('civilStatus', 'civilStatusInvalid', 'Civil status is required!', $valid);
    if ($_POST['civilStatus'] == 'others') {
        validateNameField('otherStatus', 'otherStatusInvalid', 'Please specify your civil status', $valid);
    }

    // tax 
    validateTax('tax', 'taxInvalid', $valid);

    //birth place details
    validateNameField('province_birth', 'provinceInvalid', 'Province is required!', $valid);
    validateTextInput('birth_unit', 'birth_unitInvalid', 'Unit is required!', $valid);
    validateTextInput('birth_house', 'birth_houseInvalid', 'House number is required!', $valid);
    validateNameField('birth_street', 'birth_streetInvalid', 'Street name is required!', $valid);
    validateNameField('birth_subdivision', 'birth_subdivisionInvalid', 'Subdivision name is required!', $valid);
    validateNameField('birth_baranggay', 'birth_baranggayInvalid', 'Baranggay name is required!', $valid);
    validateNameField('municipality_birth', 'municipalityInvalid', 'City/Municipality is required!', $valid);
    validateNameField('birth_country', 'birth_countryInvalid', 'Country is required!', $valid);

    // current address details
    validateTextInput('unit', 'unitInvalid', 'Unit is required!', $valid);
    validateTextInput('houseNo', 'houseNoInvalid', 'House number is required!', $valid);
    validateNameField('street', 'streetInvalid', 'Street name is required!', $valid);
    validateNameField('subdivision', 'subdivisionInvalid', 'Subdivision name is required!', $valid);
    validateNameField('baranggay', 'baranggayInvalid', 'Baranggay name is required!', $valid);
    validateNameField('cityMunicipality', 'cityMunicipalityInvalid', 'City/Municipality is required!', $valid);
    validateNameField('province_home', 'province_homeInvalid', 'Province (home) is required!', $valid);
    validateNameField('country', 'countryInvalid', 'Country is required!', $valid);

    //numerical fields
    validateNumeric('zip', 'zipInvalid', 'Zip code is required!', $valid);
    validateNumeric('birth_zip', 'birth_zipInvalid', 'Birth zip code is required!', $valid);
    validateNumeric('mobile', 'mobileInvalid', 'Mobile number is required!', $valid);
    validateEmail('email', 'emailInvalid', $valid);
    validateTelephone('telephone', 'telephoneInvalid', 'Telephone number is required!', $valid);
}
