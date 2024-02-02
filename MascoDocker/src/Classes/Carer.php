<?php
class Carer extends User {
    private $idDocument;
    private $place;
    private $rating;

    public function __construct($userId ,$username, $email, $password, $phone, $hasPlace, $area, $verified, $idDocument, $place, $rating) {
        parent::__construct($userId,$username, $email, $password, $phone, $hasPlace, $area, $verified);
        $this->idDocument = $idDocument;
        $this->place = $place;
        $this->rating = $rating;
    }

    public function getIdDocument() {
        return $this->idDocument;
    }

    public function hasPlace() {
        return $this->place;
    }

    public function getRating() {
        return $this->rating;
    }
}
  
?>