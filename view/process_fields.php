<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Check if the student_id is set and is a valid number
    $student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : null;

    // Redirect if student_id is not provided or is not a valid number
    if ($student_id === null || !is_numeric($student_id)) {
        header("Location: applicationList.php");
        exit();
    }

    // Check if the category is selected
    if (isset($_POST['category'])) {
        $selectedCategory = $_POST['category'];

        // Handle different categories
        switch ($selectedCategory) {
            case 'Database':
                updateDatabase($student_id, $selectedCategory);
                break;
            case 'Network_Security':
                updateDatabase($student_id, $selectedCategory);
                break;
            case 'Software_Engineering':
                    updateDatabase($student_id, $selectedCategory);
                break;
            case 'Graphics_Multimedia':
                    updateDatabase($student_id, $selectedCategory);
                break;
                case 'Bioinformatics':
                    updateDatabase($student_id, $selectedCategory);
                break;
            default:
                // Handle unknown category
                break;
        }

        // Additional processing for the "ETC" field
        if (isset($_POST['field'])) {
            $etcField = $_POST['field'];
            // Process the "ETC" field as needed
        }

        // Redirect to a success page or perform additional actions
        header("Location: otherinfo.php?student_id=$student_id");
        exit();
    }
}

// Function to update the database
function updateDatabase($student_id, $category) {
    // Use prepared statements to prevent SQL injection
    $host = "localhost"; // Replace with your database host
    $dbname = "sda23db"; // Replace with your database name
    $user = "root"; // Replace with your database user
    $password = ""; // Replace with your database password

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE companyform SET category = :category WHERE student_id = :student_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
