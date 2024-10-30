<?php
namespace Classes;

class Cashier {
    public function processOrder(Order $order) {
        echo "Processing Order:" . PHP_EOL;
        $order->showOrder();
    }
}
