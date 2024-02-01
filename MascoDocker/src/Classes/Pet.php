<?php 
class Pet {
    private $petId;
    private $name;
    private $species;
    private $additionalInfo;

    public function __construct($name, $species, $additionalInfo) {
        $this->name = $name;
        $this->species = $species;
        $this->additionalInfo = $additionalInfo;
    }

    public function getPetId() {
        return $this->petId;
    }

    public function getName() {
        return $this->name;
    }

    public function getSpecies() {
        return $this->species;
    }

    public function getAdditionalInfo() {
        return $this->additionalInfo;
    }
}

?>