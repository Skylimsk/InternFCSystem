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
                        $rejectSql = "UPDATE applicants SET JKLIStatus = 'Rejected'WHERE student_id = $student_id";
                        if ($conn->query($rejectSql) === TRUE) {
                            $showModal = true;
                        } else {
                            echo "<script>
                                    alert('Error deleting record: " . $conn->error . "');
                                    window.location.href='applicationList.php';
                                  </script>";
                                  $showModal = false;
                        }
                    } else {
                        echo "<script>
                                alert('Student ID not provided in the URL.');
                                window.location.href='applicationList.php';
                              </script>";
                              $showModal = false;
                    }

                    $conn->close();
                    ?>
                </div>
            </main>

            <div id="rejectionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" style="display: none;">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                            <i class="fas fa-times-circle text-red-600 h-6 w-6" style="font-size: 1.5rem;"></i>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Reject</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                The application has been returned to the student.
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="closeButton" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-5/12 shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                                Close
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
            document.getElementById('rejectionModal').style.display = 'block';
            document.getElementById('closeButton').onclick = function () {
                window.location.href = 'JKLIViewApplication.php?student_id=' + studentId;
            };
        }
    </script>
</body>

</html>
