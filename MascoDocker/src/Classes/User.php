<?php

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

    public function transformEmailToUsername($username): void {
        // Transform email to username code here
    }

    private function hashPassword($password): void {
        // Hash password code here
    }

    public function saveUser(): void {
        // Save user code here
    }

    
}
?>