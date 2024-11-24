<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController {
    use ApiResponseFormatter;

    public function index() {
        $productModel = new Product();
        $response = $productModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id) {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert() {
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        // Validate required fields
        if (!isset($inputData["product_name"]) || !isset($inputData["quantity"]) || !isset($inputData["level_sugar"]) || !isset($inputData["cold_hot"])) {
            return $this->apiResponse(400, "All fields (product_name, quantity, level_sugar, cold_hot) are required", null);
        }

        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData["product_name"],
            "quantity" => $inputData["quantity"],
            "level_sugar" => $inputData["level_sugar"], // New field
            "cold_hot" => $inputData["cold_hot"] // New field
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id) {
        $jsonInput = file_get_contents("php://input");
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        if (!isset($inputData["product_name"]) || !isset($inputData["quantity"]) || !isset($inputData["level_sugar"]) || !isset($inputData["cold_hot"])) {
            return $this->apiResponse(400, "All fields (product_name, quantity, level_sugar, cold_hot) are required", null);
        }

        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData["product_name"],
            "quantity" => $inputData["quantity"],
            "level_sugar" => $inputData["level_sugar"], // New field
            "cold_hot" => $inputData["cold_hot"] // New field
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id) {
        $productModel = new Product();
        $response = $productModel->delete($id);
        return $this->apiResponse(200, "success", $response);
    }
}
