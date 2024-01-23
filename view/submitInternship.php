<?php
// Database configuration
$host = 'localhost'; // or your database host
$dbname = 'sda23db';
$username = 'root';
$password = '';

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert form data into the database
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $position = $_POST['position'];
        $branch = $_POST['branch'];
        $roles = $_POST['roles'];
        $requirements = $_POST['requirements'];
        $company_id = $_POST['company_id'];

        // Prepare SQL statement
        $sql = "INSERT INTO internship (position, branch, roles, requirements, company_id)
            VALUES (:position, :branch, :roles, :requirements, :company_id)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters to statement variables
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':roles', $roles);
        $stmt->bindParam(':requirements', $requirements);
        $stmt->bindParam(':company_id', $company_id);

        // Execute the statement and insert the data
        $stmt->execute();

        // Redirect to a new page or display a success message
        echo "<script>alert('New internship added successfully.'); window.location.href='internshipList.php';</script>";
        // header('Location: success_page.php'); // Uncomment to redirect the user to another page
    }
} catch(PDOException $e) {
    // Handle error
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
