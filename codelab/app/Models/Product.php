<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";

use app\Config\DatabaseConfig;
use mysqli;

class Product extends DatabaseConfig {
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "praktikumweb4", 3306);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function findAll() {
        $sql = "SELECT * FROM zusammen";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function findById($id) {
        $sql = "SELECT * FROM zusammen WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function create($data) {
        if (!isset($data['quantity']) || $data['quantity'] === null || !isset($data['level_sugar']) || !isset($data['cold_hot'])) {
            throw new Exception('Quantity, level_sugar, and cold_hot are required');
        }

        $productName = $data['product_name'];
        $quantity = $data['quantity'];
        $levelSugar = $data['level_sugar'];
        $coldHot = $data['cold_hot'];

        $query = "INSERT INTO zusammen (product_name, quantity, level_sugar, cold_hot) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siss", $productName, $quantity, $levelSugar, $coldHot);
        $stmt->execute();

        return [
            "product_name" => $productName,
            "quantity" => $quantity,
            "level_sugar" => $levelSugar,
            "cold_hot" => $coldHot
        ];
    }

    public function update($data, $id) {
        if (!isset($data['quantity']) || $data['quantity'] === null || !isset($data['level_sugar']) || !isset($data['cold_hot'])) {
            throw new Exception('Quantity, level_sugar, and cold_hot are required');
        }

        $productName = $data['product_name'];
        $quantity = $data['quantity'];
        $levelSugar = $data['level_sugar'];
        $coldHot = $data['cold_hot'];

        $query = "UPDATE zusammen SET product_name = ?, quantity = ?, level_sugar = ?, cold_hot = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sissi", $productName, $quantity, $levelSugar, $coldHot, $id);
        $stmt->execute();

        return [
            "product_name" => $productName,
            "quantity" => $quantity,
            "level_sugar" => $levelSugar,
            "cold_hot" => $coldHot
        ];
    }

    public function delete($id) {
        $query = "DELETE FROM zusammen WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
