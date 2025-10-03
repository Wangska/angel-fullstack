<?php

require '../functions/validation.php';
require_once '../config/connection.php';
require_once '../model/User.php';
require_once '../controller/session_data.php';

class UserController
{
    private $user;

    public function __construct($conn)
    {
        $this->user = new User($conn);
    }


    public function insertUser()
    {
        $valid = true;
        validateUserInput($valid);

        if (!$valid) {
            header("Location: ../index.php");
            exit();
        }

        $dob = $_SESSION['date'] ?? '';
        $age = $this->user->calculateAge($dob);

        $fields = [
            "lastname" => "lastname",
            "firstname" => "firstname",
            "middle" => "middle",
            "sex" => "sex",
            "civil_status" => "civilStatus",
            "other_status" => "otherStatus",
            "tax" => "tax",
            "nationality" => "nationality",
            "religion" => "religion",
            "b_unit" => "birth_unit",
            "b_house" => "birth_house",
            "b_street" => "birth_street",
            "b_subdivision" => "birth_subdivision",
            "b_baranggay" => "birth_baranggay",
            "municipality_birth" => "municipality_birth",
            "province_birth" => "province_birth",
            "b_country" => "birth_country",
            "b_zip" => "birth_zip",
            "unit" => "unit",
            "house_no" => "houseNo",
            "street" => "street",
            "subdivision" => "subdivision",
            "baranggay" => "baranggay",
            "city_municipality" => "cityMunicipality",
            "province_home" => "province_home",
            "country" => "country",
            "zip" => "zip",
            "mobile" => "mobile",
            "email" => "email",
            "telephone" => "telephone",
            "father_lastname" => "lastnameFather",
            "father_firstname" => "firstnameFather",
            "father_middleinitial" => "middleinitialFather",
            "mother_lastname" => "lastnameMother",
            "mother_firstname" => "firstnameMother",
            "mother_middleinitial" => "middleinitialMother"
        ];

        $data = ["dob" => $dob, "age" => $age];

        foreach ($fields as $key => $sessionKey) {
            $data[$key] = $_SESSION[$sessionKey] ?? '';
        }

        $result = $this->user->insert($data);

        if ($result !== true) {
            echo "Insert failed";
            exit();
        }

        header("Location: ../views/dataView.php");
        exit();
    }


    public function updateUser($user_id, $data)
    {
        $_SESSION['old_input'] = $data;

        $valid = true;
        validateUserInput($valid);
        // var_dump($_SESSION['old_input']);

        // var_dump($data);
        // exit();

        if ($valid) {
            if ($this->user->update($user_id, $data)) {
                unset($_SESSION['old_input']);
                header("Location: ../success.php?id=" . urlencode($user_id));
                exit();
            }
        } else {
            header("Location: ../views/updateView.php?id=" . urlencode($user_id));
            exit();
        }
    }

    public function deleteUser($user_id)
    {

        if ($this->user->deleteSpecific($user_id)) {
            header("Location: ../views/archiveView.php?message=User Deleted successfully");
            exit();
        } else {
            echo "Failed to delete user.";
        }
    }
    public function deleteAll($user_id)
    {

        if ($this->user->deleteAll($user_id)) {
            header("Location: ../views/archiveView.php?message=Users Deleted successfully");
            exit();
        } else {
            echo "Failed to delete user.";
        }
    }
    public function delete($user_id)
    {

        if ($this->user->delete($user_id)) {
            header("Location: ../views/dataView.php?message=User Deleted successfully");
            exit();
        } else {
            echo "Failed to delete user.";
        }
    }
    public function restoreUser($user_id)
    {

        if ($this->user->restore($user_id)) {
            header("Location: ../views/dataView.php?message=User Restored successfully");
            exit();
        } else {
            echo "Failed to delete user.";
        }
    }
}
