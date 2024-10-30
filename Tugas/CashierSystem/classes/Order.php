<?php
namespace Classes;

class Order {
    private $items = [];

    public function addItem(Item $item) {
        $this->items[] = $item;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function showOrder() {
        foreach ($this->items as $item) {
            echo $item->getDescription() . PHP_EOL;
        }
        echo "Total: Rp." . $this->getTotal() . PHP_EOL;
    }
}
