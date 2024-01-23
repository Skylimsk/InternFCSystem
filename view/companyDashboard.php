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

    $sql = "SELECT name, contactNum, email, address, region FROM company";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $companyName = $row['name'];
        $contactNum = $row['contactNum'];
        $email = $row['email'];
        $address = $row['address'];
        $region = $row['region'];
    } else {
        $companyName = $contactNum = $email = $address = $region = "N/A";
    }

    $conn->close();
    ?>


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
        <div class="flex-1 p-8">
            <!-- Other content -->
            <div class="flex mt-8">
                <div class="flex-1 p-8">
                    <div class="flex justify-between items-center">

                        <div class="flex mt-8">
                            <div class="w-1/2 p-4 custom-gray flex justify-center items-center">
                                <!-- Static image placeholder or dynamic content -->
                                <img src="../images/RWG.png" alt="Placeholder image for additional content">
                            </div>
                            <div class="w-1/2 p-8 custom-border">
                                <!-- Right side content where you want to display the data -->
                                <div class="mb-4">
                                    <label class="block text-gray-700">Company Name:</label>
                                    <div class="p-2 text-gray-900">
                                        <?php echo htmlspecialchars($companyName); ?>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700">Contact Number:</label>
                                    <div class="p-2 text-gray-900">
                                        <?php echo htmlspecialchars($contactNum); ?>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700">Email Address:</label>
                                    <div class="p-2 text-gray-900">
                                        <?php echo htmlspecialchars($email); ?>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700">Full Address:</label>
                                    <div class="p-2 text-gray-900">
                                        <?php echo htmlspecialchars($address); ?>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700">Region:</label>
                                    <div class="p-2 text-gray-900">
                                        <?php echo htmlspecialchars($region); ?>
                                    </div>
                                </div>
                                <div class="text-xs text-gray-500 mt-4">
                                    All data are according to the FC Database.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</body>

</html>