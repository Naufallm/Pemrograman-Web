<?php
namespace Classes;

class Menu {
    private $items = [];
    private $currency;

    public function __construct($currency = "Rupiah") {
        $this->currency = $currency;
    }

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function showMenu() {
        if (empty($this->items)) {
            echo "Menu is empty." . PHP_EOL;
            return;
        }

        foreach ($this->items as $item) {
            echo $item->getDescription() . " in " . $this->currency . PHP_EOL;
        }
    }
}
