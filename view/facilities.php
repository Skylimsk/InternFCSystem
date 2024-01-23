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
                        background-color: #4F46E5;
                        color: black;
                        padding: 0.75rem 1.5rem;
                        border-radius: 0.375rem;
                        font-weight: 600;
                        text-align: center;
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
            <form action="process_facilities.php?student_id=<?php echo $student_id; ?>" method="POST">
                <div class="form-section">
                    <label class="form-label">Accommodation: </label>
                    <input type="radio" name="accommodation" value="Not Provided"> Not Provided
                    <input type="radio" name="accommodation" value="Provided"> Provided
                </div>

                <div class="form-section">
                    <label class="form-label">Allowance: </label>
                    <input type="radio" name="allowance" value="Not Provided" onclick="toggleAllowance(false)"> Not
                    Provided
                    <input type="radio" name="allowance" value="Provided" onclick="toggleAllowance(true)"> Provided
                </div>

                <!-- Additional Allowance Options -->
                <div id="additional-allowance-options" class="hidden form-section">
                    <label class="form-label">If YES:</label>
                    <div class="form-section">
                        <input type="radio" name="allowance_type" value="Monthly Payment">
                        <span>Monthly Payment RM</span>
                        <input type="text" name="monthly_payment" class="form-input" placeholder="Amount">
                    </div>
                    <div class="form-section">
                        <input type="radio" name="allowance_type" value="Incentive Money">
                        <span>Incentive Money RM</span>
                        <input type="text" name="incentive_money" class="form-input" placeholder="Amount">
                    </div>
                </div>

                <div class="form-section">
                    <label class="form-label">Transportation: </label>
                    <input type="radio" name="transportation" value="Not Provided"> Not Provided
                    <input type="radio" name="transportation" value="Provided"> Provided
                </div>

                <!-- Facilities and Equipment -->
                <div class="form-section">
                    <label class="form-label">Facilities and Equipment: </label>
                    <input type="radio" name="facilities_provided" value="Not Provided"
                        onclick="toggleFacilities(false)"> Not Provided
                    <input type="radio" name="facilities_provided" value="Provided" onclick="toggleFacilities(true)">
                    Provided
                </div>

                <div id="facilities-options" class="hidden form-section">
                    <div>
                        <input type="checkbox" name="facilities[]" value="Computer">
                        <span>Computer</span>
                    </div>
                    <div>
                        <input type="checkbox" name="facilities[]" value="Printer">
                        <span>Printer</span>
                    </div>
                    <div>
                        <input type="checkbox" name="facilities[]" value="Internet">
                        <span>Internet</span>
                    </div>
                    <div>
                        <input type="checkbox" name="facilities[]" value="Workspace">
                        <span>Workspace</span>
                    </div>
                </div>



                <div class="form-section">
                    <label class="form-label">ETC (Please State): </label>
                    <textarea name="etc" class="form-input" rows="4" cols="50"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">NEXT</button>
                </div>
            </form>
        </div>

        <script>
            function toggleAllowance(isProvided) {
                var allowanceOptions = document.getElementById('additional-allowance-options');
                if (isProvided) {
                    allowanceOptions.classList.remove('hidden');
                } else {
                    allowanceOptions.classList.add('hidden');
                }
            }

            function toggleFacilities(isProvided) {
                var facilitiesOptions = document.getElementById('facilities-options');
                if (isProvided) {
                    facilitiesOptions.classList.remove('hidden');
                } else {
                    facilitiesOptions.classList.add('hidden');
                }
            }

        </script>
    </div>
</body>

</html>
