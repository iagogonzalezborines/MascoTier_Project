<?php
/*
Generic class for the user
Access to the database, and PHPMailer
*/
require_once '../DataBase/dataBase.php';
// require_once 'PHPMailer/PHPMailer.php';


class User
{
    private int $userId;
    private string $username;
    private string $email;
    private string $password;
    private string $phone;
    private string $area;
    private bool $verified;
    private string $type;
    //Exclusive for Owner
    private $pets;
    //Exclusive for Carer
    private bool $hasPlace;
    private $idDocument;
    private $birth_date;
    private $place;
    private $rating;

    /**
     * User constructor.
     * @param string|null $username - The username of the user
     * @param string $email - The email of the user
     * @param string $password - The password of the user
     * @param string|null $phone - The phone number of the user
     * @param string|null $area - The zone where the user is located
     * @param bool $verified - Indicates if the user is verified (0 or 1)
     * @param string $type - The type of user (owner or carer)

     * @param mixed|null $contactNumber - The contact number of the user (exclusive for owner)
     * @param mixed|null $pets - The pets of the user (exclusive for owner)

     * @param bool|null $hasPlace - Indicates if the user has a place to take care of the animals (exclusive for carer)
     * @param mixed|null $idDocument - The ID document of the user (exclusive for carer)
     * @param mixed|null $place - The place of the user (exclusive for carer)
     * @param mixed|null $rating - The rating of the user (exclusive for carer)
     */
    public function __construct(
        string $email,
        string $password,
        string $type,
        string $birth_date,
        string $username = null,
        string $phone = null,
        string $area = null,
        bool $verified = null,
        //Exclusive for Owner
        $pets = null,
        //Exclusive for Carer
        bool $hasPlace = null,
        $idDocument = null,
        $place = null,
        $rating = null
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->hasPlace = $hasPlace;
        $this->area = $area;
        $this->verified = $verified;
        $this->type = $type;
        $this->pets = $pets;
        $this->idDocument = $idDocument;
        $this->birth_date=$birth_date;
        $this->place = $place;
        $this->rating = $rating;
    }


    /**
     * Get the user ID.
     * @return int - The user ID
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Get the username.
     * @return string - The username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Get the email.
     * @return string - The email
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getArea(): string
    {
        return $this->area;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getHasPlace(): bool
    {
        return $this->hasPlace;
    }
    public function getVerified(): bool
    {
        return $this->verified;
    }

    /**
     * Set the password.
     * @param string $password - The password to set
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Transform the email to username.
     */
    public function transformEmailToUsername(): void
    {
        $this->username = strstr($this->email, '@', true);
    }

    /**
     * Hash the password.
     * @return string - The hashed password
     */
    public function hashPassword(): string
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    /**
     * Save the user to the database.
     * @param mixed $userToSave - The user object to save
     */
    public function saveUserToDb($userToSave)
    {
        $hashedPassword = $this->hashPassword();
        $query = "INSERT INTO users (username, email, psw, phone, area, verified, type, contactNumber, pets, hasPlace, idDocument, place, rating) 
        VALUES ('$this->username', '$this->email', '$hashedPassword', '$this->phone', '$this->area', '$this->verified', '$this->type', '$this->pets', '$this->hasPlace', '$this->idDocument', '$this->place', '$this->rating)";

        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $executed = $db->executeQuery($query);
        //Testing echoes for comprobation
        $db->executeQuery($query);
        $db->disconnectFromDatabase();
        
        if ($executed) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Transform the result set into an array of user data.
     * @param mixed $result - The result set to transform
     * @return array - The array of user data
     */
    public function transformResultSetIntoUserArray($result)
    {
        $userArray = [];
        while ($row = $result->fetch_assoc()) {
            $userArray[] = $row;
        }
        return $userArray;
    }

    /**
     * Get the user data from the database.
     * @return array - The array of user data
     */
    public function getUserDataFromDataBase()
    {
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $db->executeQuery($query);
        $db->disconnectFromDatabase();
        return $this->transformResultSetIntoUserArray($result);
    }

    //These two functions will help us to mantain a better track of what kind of info we are looking for

    public function getOwnerDataFromDataBase()
    { //The same as the previous function, but for the owner
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "SELECT * FROM owner WHERE user_id = '$this->userId'";
        $result = $db->executeQuery($query);
        $db->disconnectFromDatabase();
        return $this->transformResultSetIntoUserArray($result);
    }
    public function getCarerDataFronDataBase()
    { //Basically the same as the previous function, but for the carer
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "SELECT * FROM carer WHERE user_id = '$this->userId'";
        $result = $db->executeQuery($query);
        $db->disconnectFromDatabase();
        return $this->transformResultSetIntoUserArray($result);
    }

    /**
     * Set the user as verified or unverified.
     * @param bool $bool - Indicates if the user should be set as verified (true) or unverified (false)
     */
    public function setUserToVerified($bool)
    {
        if ($bool == true) {
            $this->verified = true;
            $query = "UPDATE users SET verified = 1 WHERE email = '$this->email'";
        } else {
            $this->verified = false;
            $query = "UPDATE users SET verified = 0 WHERE email = '$this->email'";
        }

        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $db->executeQuery($query);
        $db->disconnectFromDatabase();
    }

    public function showRequests($userId)
    {
        $db = dataBase::getInstance();
        $query = "SELECT * FROM request WHERE user_owner_id = '$userId'";
        $result = $db->executeQuery($query);

        return ($result);
    }


    /*METHODS FROM Owner.php*/

    public function getPets($userId) //returns the pets of the owner : array
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
