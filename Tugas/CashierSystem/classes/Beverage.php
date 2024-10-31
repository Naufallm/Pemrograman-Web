<?php
namespace Classes;

use Traits\Describable;

class Beverage extends Item {
    use Describable;

    private $volume;
    private $isAlcoholic;

    public function __construct($name, $price, $volume, $isAlcoholic) {
        parent::__construct($name, $price);
        $this->volume = $volume;
        $this->isAlcoholic = $isAlcoholic;
    }

    public function getDescription() {
        $alcoholContent = $this->isAlcoholic ? "Alcoholic" : "Non-Alcoholic";
        return "Beverage: " . $this->describe() . ", Volume: {$this->volume}ml, {$alcoholContent}";
    }
}
