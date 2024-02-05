<?php 
require_once 'User.php';
require_once 'DataBase/dataBase.php';
class Owner extends User { 
    private $contactNumber; 
    private $pets; 

    public function __construct($username, $email, $password, $contactNumber) { 
        parent::__construct($username, $email, $password, $contactNumber, $contactNumber, $contactNumber, $contactNumber, $contactNumber);
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

    public function getPets($userId)
    {
        $db = dataBase::getInstance();
        $query = "SELECT * FROM pet WHERE user_id = '$userId'";
        $result = $db->executeQuery($query);
        return $this->pets;
    }
}
$prueba = new User("José","asdjfgsdg@gmail.com","12341234",null,null,null,null,null);
?>
