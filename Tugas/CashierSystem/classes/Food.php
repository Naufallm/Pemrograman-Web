<?php
namespace Classes;

use Traits\Describable;

class Food extends Item {
    use Describable;

    public function getDescription() {
        return "Food - " . $this->describe();
    }
}
