<?php
namespace Traits;

trait Describable {
    public function describe() {
        return "Item: " . $this->name . ", Price: Rp." . $this->price;
    }
}
