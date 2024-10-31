<?php
namespace Classes;

class Cashier {
    private $name;  // Nama kasir
    private $cashRegisterId;  // ID mesin kasir

    public function __construct($name, $cashRegisterId) {
        $this->name = $name;
        $this->cashRegisterId = $cashRegisterId;
    }

    public function processOrder(Order $order) {
        echo "Processing Order by {$this->name} (Cash Register ID: {$this->cashRegisterId}):" . PHP_EOL;
        $order->showOrder();
    }
}

