<?php
// Add missing import statements
require_once 'Pet.php';
require_once 'Carer.php';

class Request {
    private $date;
    private $status;
    private $pet;
    private $carer;

    public function __construct(string $date, string $status, Pet $pet, Carer $carer) {
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

 
    public function getCarer(): Carer {
        return $this->carer;
    }

    public function getPet(): Pet{
        return $this->pet;
    }
}

?>