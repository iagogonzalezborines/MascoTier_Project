<?php

include '../DataBase/connectToDb.php';
include '../DataBase/executeQuery';

class User {
    private int $userId;
    private string $username;
    private string $email;
    private string $password;
    private string $phone;
    private bool $hasPlace;
    private string $area;
    private bool $verified;


    public function __construct(string $userId, string $email, string $password, string $phone, string $hasPlace, string $area, string $verified) {
        $this->userId = $userId;
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
        // Transform email to username code here
        //Use strings?
    }

    public function hashPassword(): string {
        return $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function saveUser() {
        $hashedPassword = $this->hashPassword();
        $query = "INSERT INTO users (user_id, email, pwd, phone, has_place, area, verified) VALUES ('$this->userId', '$this->email', '$hashedPassword', '$this->phone', '$this->hasPlace', '$this->area', '$this->verified')";
        $dbh = connectToDatabase();
        executeQuery($dbh, $query);

    }
}
?>