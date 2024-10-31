<?php
namespace Classes;

class Order {
    private $orderItems = [];
    private $tableNumber;
    private $totalPrice = 0.0;

    public function __construct($tableNumber) {
        $this->tableNumber = $tableNumber;
    }

    public function addItem(Item $item) {
        $this->orderItems[] = $item;
        $this->calculateTotal();
    }

    private function calculateTotal() {
        $this->totalPrice = 0.0;
        foreach ($this->orderItems as $item) {
            $this->totalPrice += $item->price;
        }
    }

    public function showOrder() {
        echo "Order for Table {$this->tableNumber}:" . PHP_EOL;
        foreach ($this->orderItems as $item) {
            echo $item->getDescription() . PHP_EOL;
        }
        echo "Total Price: Rp. " . number_format($this->totalPrice, 2) . PHP_EOL;
    }
}
