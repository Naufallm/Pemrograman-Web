<?php
require_once __DIR__ . '/traits/Describable.php';
require_once __DIR__ . '/classes/Item.php';
require_once __DIR__ . '/classes/Food.php';
require_once __DIR__ . '/classes/Beverage.php';
require_once __DIR__ . '/classes/Order.php';
require_once __DIR__ . '/classes/Cashier.php';

use Classes\Food;
use Classes\Beverage;
use Classes\Order;
use Classes\Cashier;

// Create instances of items with prices in thousands
$rawon = new Food("Rawon", 25000); 
$teh = new Beverage("Teh", 3000); 
$mendol = new Food("Mendol", 5000);

// Create a new order and add items
$order = new Order();
$order->addItem($rawon);
$order->addItem($teh);
$order->addItem($mendol);

// Process the order through the cashier
$cashier = new Cashier();
$cashier->processOrder($order);
