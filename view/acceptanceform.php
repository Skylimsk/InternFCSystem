<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sda23db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getApprovalStatus($student_id) {

    global $conn;

    $query = "SELECT status FROM applicant WHERE student_id = $student_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['status'];
    } else {
        // Handle error or return a default value
        return 'Not Found';
    }
}

function getStudentInfoById($student_id) {

    global $conn;

    $query = "SELECT name, email FROM applicant WHERE student_id = $student_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        // Handle error or return a default value
        return false;
    }
}

$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : null;

if ($student_id !== null && is_numeric($student_id)) {
    // Check if the student with the specified student_id is approved
    $approvalStatus = getApprovalStatus($student_id);

    if ($approvalStatus === 'Approved') {

        $studentInfo = getStudentInfoById($student_id);

        if ($studentInfo) {
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Acceptance Form</title>
                <script src="https://cdn.tailwindcss.com"></script>
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                <style>
                    /* Additional styling can go here */
                    .form-section {
                        margin-bottom: 1rem;
                    }

                    .form-label {
                        font-weight: 600;
                    }

                    .form-input {
                        width: 100%;
                        padding: 0.5rem;
                        margin-bottom: 0.5rem;
                        border-radius: 0.375rem;
                        border: 1px solid #D1D5DB;
                    }

                    .button {
                        background-color: #4F46E5;
                        color: black;
                        padding: 0.75rem 1.5rem;
                        border-radius: 0.375rem;
                        font-weight: 600;
                        text-align: center;
                    }
                </style>
            </head>

            <body class="bg-gray-200">
                <!-- Header -->
                <?php include('header_company.php'); ?>

                <!-- Main Content -->
                <div class="flex flex-1">
                    <!-- Sidebar -->
                    <aside class="w-64 bg-gray-700 p-4">
                        <nav>
                            <a href="companyDashboard.php" class="block text-white py-2">Dashboard</a>
                            <a href="internshipList.php" class="block text-white py-2">Internship</a>
                            <a href="applicationList.php" class="block text-white py-2">Application</a>
                        </nav>
                    </aside>

                    <!-- Content -->
                    <main class="flex-1 p-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h1 class="text-xl font-bold mb-4">Acceptance Form</h1>
                            <form id="acceptanceForm" method="POST">
                                <div class="mb-2">
                                    <label class="form-label">Name of Organisation:</label>
                                    <input type="text" name="organisation" class="form-input">
                                </div>
                                <div class="mb-2">
                        <label class="form-label">Address:</label>
                        <input type="text" name="address" class="form-input">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Website:</label>
                        <input type="text" name="website" class="form-input">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Assigned Department for Student:</label>
                        <input type="text" name="department" class="form-input">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Name of Contact Person (CP) / Officer:</label>
                        <input type="text" name="contact_person" class="form-input">
                    </div>
                    <div class="flex mb-2">
                        <div class="mr-2 flex-1">
                            <label class="form-label">CP Mobile No.:</label>
                            <input type="text" name="cp_mobile" class="form-input">
                        </div>
                        <div class="ml-2 flex-1">
                            <label class="form-label">CP Phone (Office):</label>
                            <input type="text" name="cp_phone" class="form-input">
                        </div>
                    </div>
                    <div class="flex mb-2">
                        <div class="mr-2 flex-1">
                            <label class="form-label">CP Fax No.:</label>
                            <input type="text" name="cp_fax" class="form-input">
                        </div>
                        <div class="ml-2 flex-1">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-input">
                        </div>
                    </div>
                                <div class="text-right">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">NEXT</button>
                                </div>
                            </form>
                        </div>
                        <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Extracting student ID from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const studentId = urlParams.get('student_id');

            // Setting the form action dynamically
            const form = document.getElementById('acceptanceForm');
            form.action = `process_acceptance.php?student_id=${studentId}`;
        });
    </script>
                    </main>
                </div>
            </body>

            </html>
            <?php
        } else {
            echo "<script>
                alert('Error: Student information not found.');
                window.location.href='applicationList.php';
            </script>";
        }
    } else {
        // The student is not approved, show an error message
        echo "<script>
            alert('Error: This student is not approved.');
            window.location.href='applicationList.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid or missing Student ID in the URL.');
        window.location.href='applicationList.php';
    </script>";
}
?>
