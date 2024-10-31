<?php
namespace Traits;

trait Describable {
    public function describe() {
        return "{$this->name} - Rp " . number_format($this->price, 0, ',', '.');
    }
}
