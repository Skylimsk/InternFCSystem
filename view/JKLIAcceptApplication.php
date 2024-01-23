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
                            $approveSql = "UPDATE applicants SET JKLIStatus = 'Approved' WHERE student_id = $student_id";
                            if ($conn->query($approveSql) === TRUE) {
                                $showModal = true;
                            } else {
                                echo "<script>
                                        alert('Error updating record: " . $conn->error . "');
                                        window.location.href='applicationList.php';
                                    </script>";
                                $showModal = false;
                            }
                        } else {
                            echo "<script>
                                    alert('Invalid or missing Student ID in the URL.');
                                    window.location.href='applicationList.php';
                                </script>";
                            $showModal = false;
                        }
                        $conn->close();
                    ?>
                </div>
            </main>

            <div id="approvalModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" style="display: none;">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <i class="fas fa-check-circle text-green-800 h-6 w-6" style="font-size: 1.5rem;"></i>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Approve</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                The application has been forwarded to company and also cc to the student.
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="okButton" class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-5/12 shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var showModal = <?php echo json_encode($showModal); ?>;
        var studentId = <?php echo json_encode($student_id); ?>;
        
        if (showModal) {
            document.getElementById('approvalModal').style.display = 'block';
            document.getElementById('okButton').onclick = function () {
                window.location.href = 'JKLIViewApplication.php?student_id=' + studentId;
            };
        }
    </script>
</body>

</html>
