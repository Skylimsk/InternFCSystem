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
                        color: white;
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
            <h1 class="text-xl font-bold mb-4">Submission</h1>
            <p>Dear Company,</p>
                        <p class="mt-4">Please check the BLI-2A form at below:</p>
                        <p class="mt-2"><i class="fas fa-file-alt"></i> BLI-2A_Form_LIM_SHI_KAI.pdf</p>
                        <p class="mt-2 text-sm">(The form is auto-generated by the system)</p>
                        <p class="mt-4">If you have anything's need to update, please click EDIT button for the form edit. If not, please click SUBMIT button to submit, and the form will send to Faculty of Computing, UTM</p>
                        <p class="mt-4">Applicant also will received the offer letter from the company.</p>
                        <div class="flex justify-between items-center mt-4">
                        <a href="acceptanceform.php?student_id=<?php echo $student_id; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            EDIT
                        </a>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showAlert()">
                                        SUBMIT
                        </button>
        </div>
    </form>

    <script>
        function showAlert() {
            var confirmation = confirm("The result has been forwarded to JKLI and also cc to the student with the offer letter. Do you want to return to the application list?");
            if (confirmation) {
                window.location.href = "applicationList.php";
            }
        }
    </script>

    </body>
</html>