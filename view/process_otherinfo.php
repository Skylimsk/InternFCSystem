<?php

$host = 'localhost';
$dbname = 'sda23db';
$username = 'root';
$password = '';

// Establish database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate input data
    $student_id = $_GET['student_id'] ?? ''; // Assuming it's in the URL as a query parameter
    $scope = isset($_POST['scope']) ? htmlspecialchars($_POST['scope']) : '';
    $issues = isset($_POST['issues']) ? htmlspecialchars($_POST['issues']) : '';
    
    // Update data in the database
    $sql = "UPDATE companyform 
            SET scope=?, issues=?
            WHERE student_id=?";
    $stmt = $conn->prepare($sql);

    // Check if the prepared statement is successful
    if ($stmt) {
        $stmt->bind_param("ssi", $scope, $issues, $student_id);

        if ($stmt->execute()) {
            // Data updated successfully
            header("Location: submission.php?student_id=$student_id"); 
            exit();
        } else {
            // Error updating data
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Error in preparing the statement
        echo "Error preparing statement: " . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
}
?>
