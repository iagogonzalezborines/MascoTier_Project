<?php
require_once 'User.php';
require_once 'DataBase/dataBase.php';
class Owner extends User { 
    private $contactNumber; 
    private $pets; 


    public function __construct($username, $email, $password, $phone, $contactNumber) { 
        parent::__construct('Owner',$username, $email, $password, $phone,false,'',false); //Owner has no place, no area and is not verified by default
        $this->contactNumber = $contactNumber;
        $this->pets = [];
    }


    /*
This shit needs fixing so we can create a function which creates an instance of owner so that way we can use it on user

    public function getInstance(){
        static $instance = null;
        if ($instance === null) {
            $instance = new Owner();
        }
        return $instance;
    }

*/


    //---------------------GETTERS-------------------------//
    public function getContactNumber()//returns the phone number of the owner : string
    {
        return $this->contactNumber;
    }

    public function getPets($userId)//returns the pets of the owner : array
    {
        $db = dataBase::getInstance();
        $query = "SELECT * FROM pet WHERE user_id = '$userId'";
        $result = $db->executeQuery($query);
        return $this->pets;
    }
    //----------------------------------------------------// 

    public function addPet($pet)
    {
        $this->pets[] = $pet;
    }

  
}
// $prueba = new User("José","asdjfgsdg@gmail.com","12341234",null,null,null,null,null);

