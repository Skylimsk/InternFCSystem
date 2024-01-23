<?php
// process_acceptance.php

// Database configuration
$host = 'localhost';
$dbname = 'sda23db'; 
$username = 'root'; 
$password = ''; 

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Establish connection to the database using PDO
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get student_id from the URL
    $student_id = $_GET['student_id'] ?? '';

    // Get other form data
    $name = $_POST['organisation'] ?? '';
    $address = $_POST['address'] ?? '';
    $website = $_POST['website'] ?? '';
    $department = $_POST['department'] ?? '';
    $cp_name = $_POST['contact_person'] ?? '';
    $cp_mobile = $_POST['cp_mobile'] ?? '';
    $cp_phone = $_POST['cp_phone'] ?? '';
    $cp_fax = $_POST['cp_fax'] ?? '';
    $cp_email = $_POST['email'] ?? '';

    // Prepare SQL statement
    $sql = "INSERT INTO companyform (student_id, name, address, website, department, cp_name, cp_mobile, cp_phone, cp_fax, cp_email)
    VALUES (:student_id, :name, :address, :website, :department, :cp_name, :cp_mobile, :cp_phone, :cp_fax, :cp_email)";
    
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters to statement variables
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':website', $website);
    $stmt->bindParam(':department', $department);
    $stmt->bindParam(':cp_name', $cp_name);
    $stmt->bindParam(':cp_mobile', $cp_mobile);
    $stmt->bindParam(':cp_phone', $cp_phone);
    $stmt->bindParam(':cp_fax', $cp_fax);
    $stmt->bindParam(':cp_email', $cp_email);

    // Execute statement
    $stmt->execute();

    // Redirect to the next page or show a success message
    header("Location: facilities.php?student_id=$student_id");
    exit;
}

?>