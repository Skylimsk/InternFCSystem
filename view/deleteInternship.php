<?php
// Database configuration
$host = 'localhost';
$dbname = 'sda23db';
$username = 'root';
$password = '';

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit('Database connection failed: ' . $e->getMessage());
}

// Check if the internship ID is provided via GET parameter
if (isset($_GET['id'])) {
    $internshipId = $_GET['id'];

    // Delete internship record
    $sql = "DELETE FROM internship WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    try {
        $stmt->execute([':id' => $internshipId]);
        echo "<script>alert('Internship deleted successfully.'); window.location.href = 'internshipList.php';</script>";
    } catch (PDOException $e) {
        exit('Error deleting internship: ' . $e->getMessage());
    }
} else {
    exit('No ID specified for deletion.');
}
?>
