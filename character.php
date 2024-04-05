<?php

class Character {
    public $name;
    public int $strength;
    public int $dexterity;
    public int $constitution;
    public int $intelligence;
    public int $wisdom;
    public int $charisma;
    
    public function __construct(string $name, int $strength, int $dexterity, int $constitution, int $intelligence, int $wisdom, int $charisma) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->constitution = $constitution;
        $this->intelligence = $intelligence;
        $this->wisdom = $wisdom;
        $this->charisma = $charisma;
    }
    
    //Sets the name when a button is clicked.
    public function setName($input) {
        $this->name = $input;
    }

    //On a button click or prompt, generate 6 random stats
    public function generate() {
        $ability = 0;
        for ($i=0; $i < 3; $i++) { 
            $ability = $ability + rand(1,6);
        }
        return $ability;
    }

    //This acts as the "main" function which will tie together the name and generate methods.
    public function displayStat() {
        $this->strength = $this->generate();
        $this->dexterity = $this->generate();
        $this->constitution = $this->generate();
        $this->intelligence = $this->generate();
        $this->wisdom = $this->generate();
        $this->charisma = $this->generate();
    }
}

$thistle = new Character('Thistle', 10, 17, 11, 14, 18, 15);
$custom = new Character('Custom', 0, 0, 0, 0, 0, 0);
?>