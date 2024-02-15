
<?php
// Add missing import statements
require_once 'Pet.php';
require_once 'User.php';

class Request {
    private $date;
    private $status;
    private $pet;
    private $carer;

    public function __construct(string $date, string $status, Pet $pet, User $carer) {
        $this->date = $date;
        $this->status = $status;
        $this->pet = $pet;
        $this->carer = $carer;
    } 

    public function getDate(): string {
        return $this->date;
    }

    public function getStatus(): string {
        return $this->status;
    }

 
    public function getCarer(): User {
        return $this->carer;
    }

    public function getPet(): Pet{ 
        return $this->pet;
    }
}