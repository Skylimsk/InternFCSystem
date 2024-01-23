<?php
// Check if the student_id is set and is a valid number
$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : null;

// Redirect if student_id is not provided or is not a valid number
if ($student_id === null || !is_numeric($student_id)) {
    header("Location: applicationList.php");
    exit();
}
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
                        color: black;
                        padding: 0.75rem 1.5rem;
                        border-radius: 0.375rem;
                        font-weight: 600;
                        text-align: center;
                    }
                    .category {
            margin-bottom: 10px;
        }
                </style>

<body class="bg-gray-200">
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

        <!-- Page content -->
        <div class="container mx-auto my-10 p-10 bg-white rounded-lg shadow-md">
            <h1 class="text-xl font-bold mb-4">Facilities And Amenities Provided</h1>
            <form action="process_fields.php?student_id=<?php echo $student_id; ?>" method="POST">
            <div class="category">
                <h2><strong>Database & Information Systems</strong></h2>
                <p>Description: (System Development, System Analysis & Design, Office Automation, Database, Information System Quality, Knowledge Management, IT Entrepreneur, Data Mining)</p>
                <input type="radio" name="category" value="Database" required>
                <label for="Database">Select Database & Information Systems</label>
            </div>

            <div class="category">
                <h2><strong>Computer Network & Security</strong></h2>
                <p>Description: (System Development, System Analysis, System Integration, Data Communication,O/S, Compiler, Computer System Configuration, , Network Security, Data Security, Distributed System, Embedded System)</p>
                <input type="radio" name="category" value="Network_Security" required>
                <label for="Network_Security">Select Computer Network & Security</label>
            </div>

            <div class="category">
                <h2><strong>Software Engineering</strong></h2>
                <p>Description: (Software Development, Software Maintenance, Artificial Intelligent System ,Embedded Real Time Software, Algorithm)</p>
                <input type="radio" name="category" value="Software_Engineering" required>
                <label for="Software_Engineering">Select Software Engineering</label>
            </div>

            <div class="category">
                <h2><strong>Graphics and Multimedia</strong></h2>
                <p>Description: (Computer Graphics, Image Processing & Pattern Recognition, Computer Animation, Computer Games, Geographical Information System, Visualization, Computer Vision, Multimedia Development, Video & Audio in Multimedia, HCI)</p>
                <input type="radio" name="category" value="Graphics_Multimedia" required>
                <label for="Graphics_Multimedia">Select Graphics and Multimedia</label>
            </div>

            <div class="category">
                <h2><strong>Bioinformatics</strong></h2>
                <p>Description: (Database, Visualisation, HCI, Software Design and Development, High-Performance and Parallel Computing, Grid Computing)</p>
                <input type="radio" name="category" value="Bioinformatics" required>
                <label for="Bioinformatics">Select Bioinformatics</label>
            </div>

            <div class="category">
                <h2><strong>ETC (Please State): </strong> </h2>
                <input type="text" name="field" class="form-input" placeholder="Other field">
            </div>

            <div class="text-right">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">NEXT</button>
            </div>

    </form>

    </body>
</html>