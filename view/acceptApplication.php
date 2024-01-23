<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Computing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .custom-gray {
            background-color: #E5E7EB;
        }

        .custom-purple {
            background-color: #6D28D9;
        }

        .custom-border {
            border: 2px solid #D1D5DB;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
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
                    <?php

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "sda23db";


                    $conn = new mysqli($servername, $username, $password, $dbname);


                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : null;


if ($student_id !== null && is_numeric($student_id)) {

    $approveSql = "UPDATE applicant SET `status` = 'Approved' WHERE student_id = $student_id";

    if ($conn->query($approveSql) === TRUE) {
        echo "<script>
    if (confirm('Are you sure you want to approve this application?')) {
        window.location.href = 'acceptanceform.php?student_id=$student_id';
    }
</script>";

    } else {
        echo "<script>
            alert('Error updating record: " . $conn->error . "');
            window.location.href='applicationList.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid or missing Student ID in the URL.');
        window.location.href='applicationList.php';
    </script>";
}

$conn->close();
                    ?>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
