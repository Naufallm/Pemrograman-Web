<?php
namespace Classes;

use Traits\Describable;

class Beverage extends Item {
    use Describable;

    public function getDescription() {
        return "Beverage - " . $this->describe();
    }
}
