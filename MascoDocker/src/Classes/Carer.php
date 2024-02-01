<?php
class Carer extends User {
    private $idDocument;
    private $place;
    private $rating;

    public function __construct($username, $email, $password, $idDocument, $place, $rating) {
        parent::__construct($username, $email, $password);
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