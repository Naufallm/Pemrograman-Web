<?php
    namespace Classes;

    abstract class Item {
        protected $name;
        public $price;

        public function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }

        abstract public function getDescription();
    }
