<?php
require_once 'traits/Describable.php';
require_once 'classes/Item.php';
require_once 'classes/Food.php';
require_once 'classes/Beverage.php';
require_once 'classes/Menu.php';
require_once 'classes/Restaurant.php';
require_once 'classes/Order.php';
require_once 'classes/Cashier.php';

use Classes\Restaurant;
use Classes\Food;
use Classes\Beverage;
use Classes\Cashier;
use Classes\Order;

// Membuat instance restoran dengan nama
$restaurant = new Restaurant("Restoran Nusantara");

// Menambahkan item ke menu restoran
$restaurant->addItem(new Food("Nasi Goreng", 25000, 600, "Main Course"));
$restaurant->addItem(new Beverage("Es Teh Manis", 5000, 250, false));

// Menampilkan menu restoran
$restaurant->showMenu();

// Membuat instance pesanan untuk nomor meja tertentu
$order = new Order(1);

// Menambahkan satu item makanan dan satu minuman ke pesanan
$order->addItem(new Food("Nasi Goreng", 25000, 600, "Main Course"));
$order->addItem(new Beverage("Es Teh Manis", 5000, 250, false));

// Menampilkan pesanan
$order->showOrder();

$cashier = new Cashier("Megumi", 200);

// Memproses pesanan
$cashier->processOrder($order);