<?php

include '../DataBase/connectToDb.php';
include '../DataBase/executeQuery';

class User {
    private int $userId;
    private string $username;
    private string $email;
    private string $password;

    public function __construct(string $username, string $email, string $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
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
        $query = "INSERT INTO users (username, email, password) VALUES ('$this->username', '$this->email', '$hashedPassword')";
        $dbh = connectToDatabase();
        executeQuery($dbh, $query);

    }
}
?>