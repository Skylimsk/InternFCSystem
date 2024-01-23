<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Application List</title>
    <script src="https://cdn.tailwindcss.com">


    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .header-logo {
            width: 40px;
            height: 40px;
        }

        .button {
            border-radius: 0.25rem;
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            font-weight: 700;
        }

        .back-button {
            background-color: #60A5FA;
            color: white;
        }

        .reject-button {
            background-color: #EF4444;
            color: white;
        }

        .approve-button {
            background-color: #22C55E;
            color: white;
        }

        .input-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
        }

        .input-field {
            font-size: 0.875rem;
            padding: 0.5rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.375rem;
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-200">
    <div class="min-h-screen flex flex-col">
    <?php include('header_JKLI.php'); ?>
        
        <!-- Main Content -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-gray-400 p-4">
                <nav>
                    <a href="JKLIDashboard.php" class="block text-black py-5">Dashboard</a>
                    <a href="JKLIApplicationList.php" class="block text-black py-5">Application</a>
                </nav>
            </aside>

            <div class="container mx-auto my-10 p-10 bg-white rounded-lg shadow-md">
                <div class="flex flex-col space-y-4">
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

                        // Get the application ID from the URL
                        $student_id = isset($_GET['student_id']) ? $_GET['student_id'] : null;

                        // Check if student_id is set
                        if ($student_id !== null) {
                            $sql = "SELECT * FROM applicants WHERE student_id = $student_id";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h2 class='text-center text-2xl font-bold'>Application Details</h2>";
                                echo "<div class='form-group'><label class='input-label'>
                                Name :</label><input type='text' class='input-field'
                                value='" . $row["name"] . "' disabled></div>";
                                echo "<div class='form-group'><label class='input-label'>
                                IC No. :</label><input type='text' class='input-field'
                                value='" . $row["ic_no"] . "' disabled></div>";
                                echo "<div class='form-group'><label class='input-label'>
                                Mailing Address:</label><input type='text' class='input-field'
                                value='" . $row["address"] . "' disabled></div>";
                                echo "<div class='form-group'><label class='input-label'>
                                Programme:</label><input type='text' class='input-field'
                                value='" . $row["programme"] . "' disabled></div>";
                                echo "<div class='form-group'><label class='input-label'>
                                Contact No. :</label><input type='text' class='input-field'
                                value='" . $row["contactnum"] . "' disabled></div>";
                                echo "<div class='form-group'><label class='input-label'>
                                Email Address :</label><input type='text' class='input-field'
                                value='" . $row["email"] . "' disabled></div>";

                                echo "<div class='form-group flex items-center'>";
                                echo "<i class='far fa-file-pdf fa-2x text-red-500'></i>";
                                echo "<span class='ml-2'>BL1-IC Form_" . str_replace(' ', '_', $row["name"]) . ".pdf</span>";
                                echo "</div>";

                                echo "<div class='flex justify-between'>";
                                echo "<button class='button back-button' onclick='goBack()'>BACK</button>";
                                echo "<button class='button reject-button'
                                onclick='JKLIRejectApplication(" . $student_id . ")'>REJECT</button>";
                                echo "<button class='button approve-button'
                                onclick='JKLIAcceptApplication(" . $student_id . ")'>APPROVE</button>";
                                echo "</div>";
                            } else {
                                echo "<p>No application found with ID $student_id</p>";
                            }
                        } else {
                            echo "<p>Student ID not provided in the URL.</p>";
                        }
                        $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>             
        <script>
            function goBack() {
                window.location.href = 'JKLIApplicationList.php';
            }

            function JKLIRejectApplication(studentId) {
                window.location.href = 'JKLIRejectApplication.php?student_id=' + studentId;
            }

            function JKLIAcceptApplication(studentId) {
                window.location.href = 'JKLIAcceptApplication.php?student_id=' + studentId;
            }
        </script>
    

</body>

</html>
