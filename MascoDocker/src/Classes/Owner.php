<?php 

include '/DataBase/connectToDb';
include '/DataBase/executeQuery';
class Owner extends User { private $contactNumber; private $pets; public function __construct($username, $email, $password, $contactNumber) { parent::__construct($username, $email, $password);
        $this->contactNumber = $contactNumber;
        $this->pets = [];
    }

    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    public function addPet($pet)
    {
        $this->pets[] = $pet;
    }

    public function getPets(userId)
    {
      $dbh = connectToDb();
      $query = 'SELECT * FROM pet WHERE user_id = '$userId'';
      $pets = executeQuery($dbh, $query);
      //Turn resultset to type
        return $this->pets;
    }
}
?>
