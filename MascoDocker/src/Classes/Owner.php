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
        //WEELL WELL WELL, I THINK SINGLETON PATTER IS NOT THE BEST OPTION HERE
        //ANYWAY, I'LL LEAVE THIS COMMENTED CODE HERE SO WE CAN DISCUSS IT LATER WITH PATRICIA
        
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
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = 'INSERT INTO pet (user_id, name, type';
        $db->executeQuery($query);
        $db->disconnectFromDatabase();

    }

    public function createRequest($pet, $date, $time, $duration, $place, $description, $ownerId, $carerId)
    {
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "INSERT INTO request (pet_id, date, time, duration, place, description, user_owner_id, user_carer_id) VALUES ('$pet->getId()', '$date', '$time', '$duration', '$place', '$description', '$ownerId', '$carerId')";
        $db->executeQuery($query);
        $db->disconnectFromDatabase();
    }

  
}
// $prueba = new User("José","asdjfgsdg@gmail.com","12341234",null,null,null,null,null);

