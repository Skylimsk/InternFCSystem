<?php
// process_facilities.php

// Database configuration variables
$host = 'localhost';
$dbname = 'sda23db';
$username = 'root';
$password = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve student_id from the URL
    $student_id = $_GET['student_id'] ?? ''; // Assuming it's in the URL as a query parameter

    // Make sure you validate and sanitize $student_id before using it in the query to prevent SQL injection

    // Retrieve form data
    $accommodation = isset($_POST['accommodation']) ? $_POST['accommodation'] : '';
    $allowance = isset($_POST['allowance']) ? $_POST['allowance'] : '';
    $allowanceType = isset($_POST['allowance_type']) ? $_POST['allowance_type'] : '';
    $monthlyPayment = isset($_POST['monthly_payment']) ? $_POST['monthly_payment'] : '';
    $incentiveMoney = isset($_POST['incentive_money']) ? $_POST['incentive_money'] : '';
    $transportation = isset($_POST['transportation']) ? $_POST['transportation'] : '';
    $facilitiesProvided = isset($_POST['facilities_provided']) ? $_POST['facilities_provided'] : '';
    $facilities = isset($_POST['facilities']) ? $_POST['facilities'] : [];
    $etc = isset($_POST['etc']) ? $_POST['etc'] : '';

    // Validate or process the data as needed
    // For simplicity, this example just echoes the data

    echo "Accommodation: $accommodation<br>";
    echo "Allowance: $allowance<br>";
    if ($allowance == 'Provided') {
        echo "Allowance Type: $allowanceType<br>";
        echo "Monthly Payment: $monthlyPayment<br>";
        echo "Incentive Money: $incentiveMoney<br>";
    }
    echo "Transportation: $transportation<br>";
    echo "Facilities Provided: $facilitiesProvided<br>";
    if ($facilitiesProvided == 'Provided') {
        echo "Facilities: " . implode(', ', $facilities) . "<br>";
    }
    echo "ETC: $etc<br>";

    // Prepare the SQL statement
    $sql = "UPDATE companyform SET accommodation=?, allowance=?, allowance_type=?, monthly_payment=?, incentive_money=?, transportation=?, facilities_provided=?, facilities=?, facilities_etc=? WHERE student_id=?";
    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute the statement
    if ($allowance == 'Provided' && $facilitiesProvided == 'Provided') {
        $stmt->execute([$accommodation, $allowance, $allowanceType, $monthlyPayment, $incentiveMoney, $transportation, $facilitiesProvided, implode(', ', $facilities), $etc, $student_id]);
    } elseif ($allowance == 'Provided') {
        $stmt->execute([$accommodation, $allowance, $allowanceType, $monthlyPayment, $incentiveMoney, $transportation, $facilitiesProvided, null, $etc, $student_id]);
    } elseif ($facilitiesProvided == 'Provided') {
        $stmt->execute([$accommodation, $allowance, null, null, null, $transportation, $facilitiesProvided, implode(', ', $facilities), $etc, $student_id]);
    } else {
        $stmt->execute([$accommodation, $allowance, null, null, null, $transportation, $facilitiesProvided, null, $etc, $student_id]);
    }

    header("Location: fileds.php?student_id=$student_id");
    exit;
}
?>
