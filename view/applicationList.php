<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
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

                    <div class="flex justify-between items-center mb-4">
                        <?php

                        // Connection parameters should be replaced with your actual database details
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

                        // SQL query to fetch data from the database
                        $sql = "SELECT student_id, name, email FROM applicant";
                        $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                echo '<h2 class="text-lg font-bold">
                                You have ' . $result->num_rows . ' applications!</h2>';
                            } else {
                                echo '<h2 class="text-lg font-bold">You have 0 applications!</h2>';
                            }
                        ?>
                    </div>
                    <table class="min-w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left">Application ID</th>
                                <th class="py-2 px-4 text-left">Applicant Name</th>
                                <th class="py-2 px-4 text-left">Email</th>
                                <th class="py-2 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($result && $result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr class='border-b'>";
                                    echo "<td class='py-2 px-4'>" . $row["student_id"] . "</td>";
                                    echo "<td class='py-2 px-4'>" . $row["name"] . "</td>";
                                    echo "<td class='py-2 px-4'>" . $row["email"] . "</td>";
                                    echo "<td class='py-2 px-4 flex items-center'>";
                                    echo "<a href='viewApplication.php?student_id=" . $row["student_id"] . "'
                                    class='text-blue-600 hover:text-blue-800 mr-2'>";
                                    echo "<i class='fas fa-eye'></i></a>";
                                
                                    echo "<a href='acceptApplication.php?student_id=" . $row["student_id"] . "'
                                    class='text-green-600 hover:text-green-800 mr-2'>";
                                    echo "<i class='fas fa-check'></i></a>";
                                
                                    echo "<a href='rejectApplication.php?student_id=" . $row["student_id"] . "'
                                    class='text-red-600 hover:text-red-800'>";
                                    echo "<i class='fas fa-times'></i></a>";
                                
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No data available</td></tr>";
                            }
                        
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>