<?php
namespace Classes;

class Restaurant {
    private $menu;
    private $name;

    public function __construct($name) {
        $this->menu = new Menu();
        $this->name = $name;
    }

    public function addItem(Item $item) {
        $this->menu->addItem($item);
    }

    public function showMenu() {
        echo "Menu for {$this->name}:" . PHP_EOL;
        $this->menu->showMenu();
    }
}
