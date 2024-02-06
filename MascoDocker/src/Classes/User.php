<?php
/*
Generic class for the user
Access to the database, and PHPMailer
*/
require_once '../DataBase/dataBase.php';
require_once 'PHPMailer/PHPMailer.php';
class User
{
    private int $userId;
    private string $username;
    private string $email;
    private string $password;
    private string $phone;
    private bool $hasPlace;
    private string $area;
    private bool $verified;
    private string $type;

/*
public constructor 
generic user parameters do not include exlusive parameters for other descending user classes like owner or carer
*/  
    public function __construct(string $type, string $username, string $email, string $password, string $phone, bool $hasPlace, string $area, bool $verified)
    {
        $this->type = $type;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->hasPlace = $hasPlace;
        $this->area = $area;
        $this->verified = $verified;
    }

   

    // Temporary comment: Should determine which getters and setters are necessary
    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
// Other functions


/**
* function to transform the email into a username
* @return  void
* note: should be called before saving the user to the database
* note: should return a string
* Still to be updated
 */
    public function transformEmailToUsername(): void
    {
        $this->username = strstr($this->email, '@', true);
    }
/*
function to hash the password
@return a string
*/
    public function hashPassword(): string
    {
        return $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    }
/**
 * function to save the user to the database
 * @return void
 * note: should be called after the transformEmailToUsername
 * function IF the user is not already in the database 
 * or the username has beem modified by the user
 */
    public function saveUser()
    {
        $hashedPassword = $this->hashPassword();
        $query = "INSERT INTO users (email, pwd, phone, has_place, area, verified) VALUES ('$this->userId', '$this->email', '$hashedPassword', '$this->phone', '$this->hasPlace', '$this->area', '$this->verified')";
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $db->executeQuery($query);
        // Depending on the user type, insert into the corresponding table
        $type = $this->type;
        if($this->$type == "carer"){
            $query = "INSERT INTO carer (user_id) VALUES ('$this->userId')";
            $db->executeQuery($query);
            $db->disconnectFromDatabase();
        }   // Somehow create an instance, so we can use the its functions, maybe get user id from the database? with last inserted id query?
        else if($this->$type == "owner"){
            $query = "INSERT INTO owner (user_id, full_name, id_doc) VALUES ('$this->userId')";
            $db->executeQuery($query);
            $db->disconnectFromDatabase();
            // Somehow create an instance, so we can use the its functions, maybe get user id from the database? with last inserted id query?
        }
       
    }
/** 
 * function to transform the result set into a user array
 * @return array
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
 * function to get the user data from the database
 * @return result
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
/**
 * function to verify the user
 * @return bool
 */
    public function setUserToVerified($bool)
    {
        if ($bool == true) {
            $this->verified = true;
            $query = "UPDATE users SET verified = 1 WHERE email = '$this->email'";
            $db = dataBase::getInstance();
            $db->connectToDatabase();
            $db->executeQuery($query);
            $db->disconnectFromDatabase();
        } else {
            $verified = false;
            $query = "UPDATE users SET verified = 0 WHERE email = '$this->email'";
        }
    }

}
/* public function verifyUserPhpMailer(){}
      function which sends and recieves an email from the user to confirmed its verified if it is call 
      setUserToVerified          $mail->Username = '
   
}
*/
