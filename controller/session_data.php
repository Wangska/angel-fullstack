<?php
session_start();

// Validations
$fields = [
    "lastnameInvalid",
    "firstnameInvalid",
    "middleInvalid",
    "dateInvalid",
    "sexInvalid",
    "civilStatusInvalid",
    "otherStatusInvalid",
    "taxInvalid",
    "nationalityInvalid",
    "religionInvalid",

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

    "mobileInvalid",
    "emailInvalid",
    "telephoneInvalid",
    "lastnameFatherInvalid",
    "firstnameFatherInvalid",
    "middleinitialFatherInvalid",
    "lastnameMotherInvalid",
    "firstnameMotherInvalid",
    "middleinitialMotherInvalid"
];

foreach ($fields as $field) {
    ${$field} = $_SESSION[$field] ?? "";
}

//store data

$fields = [
    "lastname",
    "firstname",
    "middle",
    "date",
    "sex",
    "civilStatus",
    "otherStatus",
    "tax",
    "nationality",
    "religion",

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

    "mobile",
    "email",
    "telephone",
    "lastnameFather",
    "firstnameFather",
    "middleinitialFather",
    "lastnameMother",
    "firstnameMother",
    "middleinitialMother"
];

foreach ($fields as $field) {
    ${$field} = htmlspecialchars($_SESSION[$field] ?? '');
}
