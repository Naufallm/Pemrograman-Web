<?php
namespace Classes;

use Traits\Describable;

class Food extends Item {
    use Describable;

    private $calories;
    private $type;

    public function __construct($name, $price, $calories, $type) {
        parent::__construct($name, $price);
        $this->calories = $calories;
        $this->type = $type;
    }

    public function getDescription() {
        return "Food: " . $this->describe() . ", Calories: {$this->calories}, Type: {$this->type}";
    }
}
