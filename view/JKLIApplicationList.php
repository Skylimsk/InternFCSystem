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
                    <div class="flex justify-between items-center mb-4">
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
                        $sql = "SELECT applicants.applicationID, applicants.JKLIStatus, Student.studentID, Student.studentName, Student.email 
                                FROM Student 
                                INNER JOIN applicants ON Student.studentID = applicants.student_id
                                ORDER BY applicants.applicationID ASC";
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
                                <th class="py-2 px-4 text-left">Form Status</th>
                                <th class="py-2 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($result && $result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr class='border-b'>";
                                        echo "<td class='py-2 px-4'>" . $row["applicationID"] . "</td>";
                                        echo "<td class='py-2 px-4'>" . $row["studentName"] . "</td>";
                                        echo "<td class='py-2 px-4'>" . $row["email"] . "</td>";
                                        echo "<td class='py-2 px-4'>" . $row["JKLIStatus"] . "</td>";
                                        echo "<td class='py-2 px-4 flex items-center'>";
                                        echo "<a href='JKLIViewApplication.php?student_id=" . $row["studentID"] . "'
                                        class='text-blue-600 hover:text-blue-800 mr-2'>";
                                        echo "<i class='fas fa-eye'></i></a>";
                                    
                                        echo "<a href='JKLIAcceptApplication.php?student_id=" . $row["studentID"] . "'
                                        class='text-green-600 hover:text-green-800 mr-2'>";
                                        echo "<i class='fas fa-check'></i></a>";
                                    
                                        echo "<a href='JKLIRejectApplication.php?student_id=" . $row["studentID"] . "'
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