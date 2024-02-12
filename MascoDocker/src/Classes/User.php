<?php
/*
Generic class for the user
Access to the database, and PHPMailer
*/
require_once '../DataBase/dataBase.php';
require_once 'PHPMailer/PHPMailer.php';

class User
{
    private int $userId; // Unique auto increment identifier for the user
    private string $username;
    private string $email;
    private string $password;
    private string $phone; // Phone number of the user
    private bool $hasPlace; // Has place to take care of the animals No (0) or Yes (1)
    private string $area;   // Zone where the user is located
    private bool $verified; // No (0) or Yes (1)
    private string $type; // owner or carer

    /**
     * User constructor.
     * @param string $type - The type of user (owner or carer)
     * @param string $username - The username of the user
     * @param string $email - The email of the user
     * @param string $password - The password of the user
     * @param string $phone - The phone number of the user
     * @param bool $hasPlace - Indicates if the user has a place to take care of the animals (0 or 1)
     * @param string $area - The zone where the user is located
     * @param bool $verified - Indicates if the user is verified (0 or 1)
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
    public function saveUserToDb($userToSave): void
    {
        $hashedPassword = $this->hashPassword();
        $query = "INSERT INTO user (username, email, pwd, phone, has_place, area, verified) VALUES ('$this->username', '$this->email', '$hashedPassword', '$this->phone', '$this->hasPlace', '$this->area', '$this->verified')";

        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $executed = $db->executeQuery($query);
        //Testing echoes for comprobation
        if($executed){echo "User saved to database"; }
        else{echo "User not saved to database";}

        if ($userToSave instanceof Carer) {
            $query = "INSERT INTO carer (user_id) VALUES ('$this->userId')";
        } else if ($userToSave instanceof Owner) {
            $query = "INSERT INTO owner (user_id, full_name, id_doc) VALUES ('$this->userId')";
        }

        $db->executeQuery($query);
        $db->disconnectFromDatabase();
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

    public function getOwnerDataFromDataBase(){ //The same as the previous function, but for the owner
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "SELECT * FROM owner WHERE user_id = '$this->userId'";
        $result = $db->executeQuery($query);
        $db->disconnectFromDatabase();
        return $this->transformResultSetIntoUserArray($result);
    }
    public function getCarerDataFronDataBase(){ //Basically the same as the previous function, but for the carer
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

    public function logIn($password, $email)
    {
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "SELECT * FROM users WHERE email = ? AND password = ?"; //This works? hashed password? How to check password?
        $stmt = $db->prepareStatement($query);
                    //This means ("ss") that it will be recieving two strings not nazi stuff
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $db->disconnectFromDatabase();
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
