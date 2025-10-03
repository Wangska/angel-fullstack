<?php
class User
{
    private $conn;

    public function __construct($db_conn)
    {
        $this->conn = $db_conn;
    }


    public function calculateAge($dob)
    {
        if (empty($dob)) {
            return null;
        }

        $dob = new DateTime($dob);
        $today = new DateTime();
        return $today->diff($dob)->y;
    }

    public function insert($data)
    {

        $user_id = $this->insertTable('users', $data);
        if (!$user_id) {
            return "Failed to insert user.";
        }
        $data['user_id'] = $user_id;

        $tables = ['addresses', 'contacts', 'parents', 'birth_place'];

        foreach ($tables as $table) {
            $this->insertTable($table, $data);
        }

        return true;
    }

    private function insertTable($table, $data)
    {
        $status = 'Active';
        $data['status'] = $status;
        $table_col = [
            'users' => ['firstname', 'lastname', 'middle', 'dob', 'age', 'sex', 'civil_status', 'other_status', 'tax', 'nationality', 'religion', 'status'],
            'addresses' => ['user_id', 'unit', 'house_no', 'street', 'subdivision', 'baranggay', 'city_municipality', 'province_home', 'country', 'zip'],
            'contacts' => ['user_id', 'mobile', 'email', 'telephone'],
            'parents' => ['user_id', 'father_lastname', 'father_firstname', 'father_middleinitial', 'mother_lastname', 'mother_firstname', 'mother_middleinitial'],
            'birth_place' => ['user_id', 'b_unit', 'b_house', 'b_street', 'b_subdivision', 'b_baranggay', 'b_country', 'b_zip', 'municipality_birth', 'province_birth']
        ];

        if (!isset($table_col[$table])) {
            return false;
        }

        $cols = implode(', ', $table_col[$table]);
        $placeholders = ':' . implode(', :', $table_col[$table]);

        $insert_data = "INSERT INTO $table ($cols) VALUES ($placeholders)";
        $statement = $this->conn->prepare($insert_data);

        foreach ($table_col[$table] as $column) {
            $statement->bindValue(":$column", $data[$column]);
        }
        if (!$statement->execute()) {
            print_r($statement->errorInfo());
            exit();
        }

        if ($table === 'users') {
            return $this->conn->lastInsertId();
        } else {
            return true;
        }
    }

    public function getAll()
    {
        $dataQuery = "SELECT users.user_id, users.firstname, users.lastname, users.middle, users.dob,users.age, users.sex, users.civil_status, users.other_status, users.tax, users.nationality, users.religion,users.status,
        
        ad.unit, ad.house_no, ad.street, ad.subdivision, ad.baranggay, ad.city_municipality, ad.province_home, ad.country, ad.zip, 
         
        birth.b_unit, birth.b_house, birth.b_subdivision, birth.b_baranggay, birth.municipality_birth, birth.province_birth, birth.b_country,  birth.b_zip, birth.b_street,
        
        contacts.mobile, contacts.email, contacts.telephone,
        
        parents.father_lastname, parents.father_firstname, parents.father_middleinitial, parents.mother_lastname, parents.mother_firstname, parents.mother_middleinitial
        
        FROM users 
        LEFT JOIN addresses ad ON users.user_id = ad.user_id
        LEFT JOIN birth_place birth ON users.user_id = birth.user_id
        LEFT JOIN contacts ON users.user_id = contacts.user_id
        LEFT JOIN parents ON users.user_id = parents.user_id
        WHERE users.status = 'Active';
        ";

        $statement = $this->conn->prepare($dataQuery);
        if (!$statement->execute()) {
            print_r($statement->errorInfo());
            exit();
        }
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function getAllArchived()
    {
        $dataQuery = "SELECT users.user_id, users.firstname, users.lastname, users.middle, users.dob,users.age, users.sex, users.civil_status, users.other_status, users.tax, users.nationality, users.religion,users.status,
        
        ad.unit, ad.house_no, ad.street, ad.subdivision, ad.baranggay, ad.city_municipality, ad.province_home, ad.country, ad.zip, 
         
        birth.b_unit, birth.b_house, birth.b_subdivision, birth.b_baranggay, birth.municipality_birth, birth.province_birth, birth.b_country,  birth.b_zip, birth.b_street,
        
        contacts.mobile, contacts.email, contacts.telephone,
        
        parents.father_lastname, parents.father_firstname, parents.father_middleinitial, parents.mother_lastname, parents.mother_firstname, parents.mother_middleinitial
        
        FROM users 
        LEFT JOIN addresses ad ON users.user_id = ad.user_id
        LEFT JOIN birth_place birth ON users.user_id = birth.user_id
        LEFT JOIN contacts ON users.user_id = contacts.user_id
        LEFT JOIN parents ON users.user_id = parents.user_id

         WHERE users.status = 'Archived';
        ";


        $statement = $this->conn->prepare($dataQuery);
        if (!$statement->execute()) {
            print_r($statement->errorInfo());
            exit();
        }
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function getUserDetails($user_id)
    {
        $query = "SELECT users.user_id, users.firstname, users.lastname, users.middle, users.dob as 'date', users.age, users.sex, users.civil_status as civilStatus, users.other_status as otherStatus, users.tax, users.nationality, users.religion,
        
        ad.unit, ad.house_no as houseNo, ad.street, ad.subdivision, ad.baranggay, ad.city_municipality as cityMunicipality, ad.province_home, ad.country, ad.zip, 
         
        birth.b_unit as birth_unit, birth.b_house as birth_house, birth.b_subdivision as birth_subdivision, birth.b_baranggay as birth_baranggay, birth.municipality_birth, birth.province_birth, birth.b_country as birth_country,  birth.b_zip as birth_zip, birth.b_street as birth_street,
    
        contacts.mobile, contacts.email, contacts.telephone,
        
        parents.father_lastname as lastnameFather, parents.father_firstname as firstnameFather, parents.father_middleinitial as middleinitialFather, parents.mother_lastname as lastnameMother, parents.mother_firstname as firstnameMother, parents.mother_middleinitial as middleinitialMother
        
        FROM users 
        LEFT JOIN addresses ad ON users.user_id = ad.user_id
        LEFT JOIN birth_place birth ON users.user_id = birth.user_id
        LEFT JOIN contacts ON users.user_id = contacts.user_id
        LEFT JOIN parents ON users.user_id = parents.user_id
        WHERE users.user_id = :user_id";

        $statement = $this->conn->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update($user_id, $fields)
    {
        $fields['age'] = $this->calculateAge($fields['date']);
        $fields['dob'] = $fields['date'];
        unset($fields['date']);


        $change_field = [
            'lastnameFather' => 'father_lastname',
            'firstnameFather' => 'father_firstname',
            'middleinitialFather' => 'father_middleinitial',
            'lastnameMother' => 'mother_lastname',
            'firstnameMother' => 'mother_firstname',
            'middleinitialMother' => 'mother_middleinitial',
            'civilStatus' => 'civil_status',
            'otherStatus' => 'other_status',
            'houseNo' => 'house_no',
            'birth_unit' => 'b_unit',
            'birth_house' => 'b_house',
            'birth_subdivision' => 'b_subdivision',
            'birth_baranggay' => 'b_baranggay',
            'birth_country' => 'b_country',
            'birth_zip' => 'b_zip',
            'birth_street' => 'b_street',
            'cityMunicipality' => 'city_municipality'
        ];


        foreach ($change_field as $old_data => $new_data) {
            if (isset($fields[$old_data])) {
                $fields[$new_data] = $fields[$old_data];
            }
        }

        $fields['user_id'] = $user_id;


        foreach (['users', 'addresses', 'contacts', 'parents', 'birth_place'] as $table) {
            $this->updateTable($table, $fields);
        }

        return true;
    }

    private function updateTable($table, $data)
    {
        $table_col = [
            'users' => ['firstname', 'lastname', 'middle', 'dob', 'age', 'sex', 'civil_status', 'other_status', 'tax', 'nationality', 'religion'],
            'addresses' => ['unit', 'house_no', 'street', 'subdivision', 'baranggay', 'city_municipality', 'province_home', 'country', 'zip'],
            'contacts' => ['mobile', 'email', 'telephone'],
            'parents' => ['father_lastname', 'father_firstname', 'father_middleinitial', 'mother_lastname', 'mother_firstname', 'mother_middleinitial'],
            'birth_place' => ['b_unit', 'b_house', 'b_street', 'b_subdivision', 'b_baranggay', 'b_country', 'b_zip', 'municipality_birth', 'province_birth']
        ];

        if (!isset($table_col[$table])) {
            return false;
        }

        $setClauses = [];
        foreach ($table_col[$table] as $column) {
            $setClauses[] = "$column = :$column";
        }
        $setString = implode(', ', $setClauses);

        $update_query = "UPDATE $table SET $setString WHERE user_id = :user_id";
        $statement = $this->conn->prepare($update_query);

        foreach ($table_col[$table] as $column) {
            if (isset($data[$column])) {
                $statement->bindValue(":$column", $data[$column]);
            } else {
                $statement->bindValue(":$column", null);
            }
        }
        $statement->bindValue(":user_id", $data['user_id']);

        return $statement->execute();
    }



    public function delete($user_id)
    {
        $archivedUser = "UPDATE users SET status = 'Archived' WHERE user_id = :user_id";
        $statement = $this->conn->prepare($archivedUser);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function restore($user_id)
    {
        $restoreUser = "UPDATE users SET status = 'Active' WHERE user_id = :user_id";
        $statement = $this->conn->prepare($restoreUser);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function deleteAll($user_id)
    {

        $deleteAllUser = "DELETE FROM users WHERE status = 'Archived'";
        $statement = $this->conn->prepare($deleteAllUser);
        return $statement->execute();
    }

    public function deleteSpecific($user_id)
    {

        $deleteUser = "DELETE FROM users WHERE user_id = :user_id";
        $statement = $this->conn->prepare($deleteUser);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
