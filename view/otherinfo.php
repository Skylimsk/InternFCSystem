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
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        /* Set height of .flex to 100% */
        .flex {
            height: 100%;
        }

        .form-input {
            display: block;
            width: 100%;
            margin: 0.5rem 0;
            padding: 0.5rem;
        }

        .form-button {
            background-color: #4F46E5; /* Tailwind blue-500 */
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 0.375rem; /* Tailwind rounded-md */
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .form-button:hover {
            background-color: #3730a3; /* Tailwind blue-700 */
        }

        .upload-button {
            padding: 10px 20px;
            border: 2px dashed #d1d5db; /* Tailwind gray-300 */
            background-color: #f9fafb; /* Tailwind gray-50 */
            text-align: center;
            cursor: pointer;
            border-radius: 0.375rem; /* Tailwind rounded-md */
        }

        .upload-button:hover {
            background-color: #e5e7eb; /* Tailwind gray-200 */
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
        <h1 class="text-xl font-bold mb-4">Other Information</h1>
        <form action="process_otherinfo.php?student_id=<?php echo $student_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <label>Please specify specific training scope offered to students:</label>
                <textarea name="scope" rows="3" class="form-input"></textarea>
            </div>
            <div class="form-section">
                <label>Any other issues to notify the Industrial Training Committee:</label>
                <textarea name="issues" rows="3" class="form-input"></textarea>
            </div>
            <div class="form-section">
                <label>Upload the Offer Letter here:</label>
                <label class="upload-button">
                    <input type="file" name="offer_letter" style="display: none;">
                    UPLOAD HERE
                </label>
            </div>
            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">SUBMIT</button>
            </div>
        </form>
    </div>
</body>

</html>
