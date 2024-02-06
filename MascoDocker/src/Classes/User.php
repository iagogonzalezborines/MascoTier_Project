<?php

require_once '../DataBase/dataBase.php';
require_once 'PHPMailer/PHPMailer.php';
class User {
    private int $userId;
    private string $username;
    private string $email;
    private string $password;
    private string $phone;
    private bool $hasPlace;
    private string $area;
    private bool $verified;


    public function __construct(int $userId,string $username, string $email, string $password, string $phone, bool $hasPlace, string $area, bool $verified) {
        $this->userId = $userId;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->hasPlace = $hasPlace;
        $this->area = $area;
        $this->verified = $verified;

    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function transformEmailToUsername(): void {
        $this->username = strstr($this->email, '@', true);
    }

    public function hashPassword(): string {
        return $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function saveUser() {
        $hashedPassword = $this->hashPassword();
          $query = "INSERT INTO users (user_id, email, pwd, phone, has_place, area, verified) VALUES ('$this->userId', '$this->email', '$hashedPassword', '$this->phone', '$this->hasPlace', '$this->area', '$this->verified')";
            $db = dataBase::getInstance();
            $db->connectToDatabase();
            $db->executeQuery($query);
            $db->disconnectFromDatabase();
    }
 
    public function transformResultSetIntoUserArray($result){
        $userArray = [];
        while ($row = $result->fetch_assoc()) {
            $userArray[] = $row;
        }
        return $userArray;
    }
    public function getUserDataFromDataBase(){
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        $result = $db->executeQuery($query);
        $db->disconnectFromDatabase();
        return $this->transformResultSetIntoUserArray($result);   
    }
    public function setUserToVerified($bool){
      if($bool == true) {
        $verified = true;
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
?>
