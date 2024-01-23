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
                        <h2 class="text-lg font-bold">Manage your Internship Details Here!</h2>
                        <a href="addInternship.php" class="text-white">
                            <button class="bg-purple-600 px-4 py-2 rounded shadow hover:bg-purple-700 
                focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">
                                <i class="fas fa-plus-circle"></i> Add New
                            </button>
                        </a>
                    </div>
                    <table class="min-w-full">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left">No.</th>
                                <th class="py-2 px-4 text-left">Position</th>
                                <th class="py-2 px-4 text-left">Branch</th>
                                <th class="py-2 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            $sql = "SELECT id, position, branch FROM internship";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr class='border-b'>";
                                    echo "<td class='py-2 px-4'>" . $row["id"] . "</td>";
                                    echo "<td class='py-2 px-4'>" . $row["position"] . "</td>";
                                    echo "<td class='py-2 px-4'>" . $row["branch"] . "</td>";
                                    echo "<td class='py-2 px-4 flex items-center'>";
                                    echo "<a href='editInternship.php?id=" . $row["id"] . "' class='text-blue-600 hover:text-blue-800 mr-2'>";
                                    echo "<i class='fas fa-pencil-alt'></i>";
                                    echo "</a>";
                                    echo "<a href='deleteInternship.php?id=" . $row["id"] . "' class='text-red-600 hover:text-red-800'>";
                                    echo "<i class='fas fa-trash'></i>";
                                    echo "</a>";
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