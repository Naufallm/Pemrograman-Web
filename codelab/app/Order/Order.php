<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "praktikumweb4");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari products.html
$data = json_decode(file_get_contents("php://input"), true);
$productName = $data["product_name"];
$quantity = $data["quantity"];
$temperature = $data["temperature"];
$sugarLevel = $data["sugar_level"];

// Query SQL INSERT
$sql = "INSERT INTO zusammen (product_name, quantity, temperature, sugar_level) 
        VALUES ('$productName', $quantity, '$temperature', '$sugarLevel')";

if ($conn->query($sql) === TRUE) {
    echo "Pesanan berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>