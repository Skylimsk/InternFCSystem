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
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sda23db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Adjusted SQL to select data from JKLI table
        $sql = "SELECT JKLIName, JKLIContactNo, JKLIEmailAddress, JKLICoordinatorFor FROM JKLI";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the first row of result
            $row = $result->fetch_assoc();
            $jkliName = $row['JKLIName'];
            $jkliContactNo = $row['JKLIContactNo'];
            $jkliEmailAddress = $row['JKLIEmailAddress'];
            $jkliCoordinatorFor = $row['JKLICoordinatorFor'];
        } else {
            $jkliName = $jkliContactNo = $jkliEmailAddress = $jkliCoordinatorFor = "N/A";
        }

        $conn->close();
    ?>
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
            <div class="flex-1 p-8">
                <div class="flex mt-8">
                    <div class="flex-1 p-8">
                        <div class="flex justify-between items-center">
                            <div class="flex mt-8">
                                <div class="w-1/2 p-4 custom-gray flex justify-center items-center">
                                    <img src="../images/avatar_scholar_256.png" alt="Placeholder image for additional content">
                                </div>
                                <div class="w-1/2 p-8 custom-border">
                                    <!-- Display JKLI information -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700">JKLI Name:</label>
                                        <div class="p-2 text-gray-900">
                                            <?php echo htmlspecialchars($jkliName); ?>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Contact Number:</label>
                                        <div class="p-2 text-gray-900">
                                            <?php echo htmlspecialchars($jkliContactNo); ?>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Email Address:</label>
                                        <div class="p-2 text-gray-900">
                                            <?php echo htmlspecialchars($jkliEmailAddress); ?>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Coordinator For:</label>
                                        <div class="p-2 text-gray-900">
                                            <?php echo htmlspecialchars($jkliCoordinatorFor); ?>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-4">
                                        All data are according to the FC Database.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>