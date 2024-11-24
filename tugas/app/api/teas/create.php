<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = ""; // Isi dengan password database Anda
$dbname = "praktikumweb4";
$tablename = "zusammen";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Menentukan method request
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Jika ada parameter id, ambil data berdasarkan ID
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM $tablename WHERE id = $id";
            $result = $conn->query($sql);

            $tea = null;
            if ($result->num_rows > 0) {
                $tea = $result->fetch_assoc();
            }

            echo json_encode($tea);
        } else {
            // Jika tidak ada parameter id, ambil semua data
            $sql = "SELECT * FROM $tablename";
            $result = $conn->query($sql);

            $teas = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $teas[] = $row;
                }
            }

            echo json_encode($teas);
        }
        break;

    case 'POST':
        // Mendapatkan data dari AJAX request
        $data = json_decode(file_get_contents('php://input'), true);
        $productName = $data['product_name'];
        $quantity = $data['quantity'];
        $levelSugar = $data['level_sugar'];
        $temperature = $data['temperature'];

        // SQL query untuk insert data
        $sql = "INSERT INTO $tablename (product_name, quantity, level_sugar, temperature, created_at, update_at) 
                VALUES ('$productName', $quantity, '$levelSugar', '$temperature', NOW(), NOW())";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true, 'message' => 'Tea added successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
        }
        break;

    case 'PUT':
        // Mendapatkan data dari AJAX request
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $productName = $data['product_name'];
        $quantity = $data['quantity'];
        $levelSugar = $data['level_sugar'];
        $temperature = $data['temperature'];

        // SQL query untuk update data
        $sql = "UPDATE $tablename SET 
                    product_name = '$productName', 
                    quantity = $quantity, 
                    level_sugar = '$levelSugar', 
                    temperature = '$temperature', 
                    update_at = NOW() 
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true, 'message' => 'Tea updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
        }
        break;

    case 'DELETE':
        // Mendapatkan ID dari request
        $id = $_GET['id'];

        // SQL query untuk delete data
        $sql = "DELETE FROM $tablename WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true, 'message' => 'Tea deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
        }
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid request method']);
        break;
}

$conn->close();
?>