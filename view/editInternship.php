<?php
// Database configuration
$host = 'localhost';
$dbname = 'sda23db';
$username = 'root';
$password = '';

// Create a new PDO instance
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    // Assume you have POST data for 'position', 'branch', 'roles', 'requirements', 'company_id'
    $sql = "UPDATE internship SET position = :position, branch =
    :branch, roles = :roles, requirements = :requirements WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':position' => $_POST['position'],
        ':branch' => $_POST['branch'],
        ':roles' => $_POST['roles'],
        ':requirements' => $_POST['requirements'],
        ':id' => $_POST['id']
    ]);

    echo "<script>alert('Internship updated successfully.'); window.location.href = 'internshipList.php';</script>";
}

// Fetch internship data
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM internship WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
    $internship = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$internship) {
        exit('Internship not found.');
    }
} else {
    exit('No ID specified.');
}

?>

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

<body>
<?php include('header_company.php'); ?>

    <!-- Main Content -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-700 p-4">
            <nav>
                <a href="companyDaashboard.php" class="block text-white py-2">Dashboard</a>
                <a href="internshipList.php" class="block text-white py-2">Internship</a>
                <a href="internshipList.php" class="block text-white py-2">Application</a>
            </nav>
        </aside>
        <div class="flex-1 p-8">
            <main class="flex-1 p-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Edit Internship Information</h2>
                    <form action="editInternship.php" method="post">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($internship['id']); ?>">
                        <input type="text" id="position" name="position" required
                            class="w-full p-2 border border-gray-300 rounded"
                            value="<?php echo htmlspecialchars($internship['position']); ?>">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <label for="branch" class="block mb-2">Branch:</label>
                    <input type="text" id="branch" name="branch" required
                        class="w-full p-2 border border-gray-300 rounded"
                        value="<?php echo isset($internship['Branch'])
                        ? htmlspecialchars($internship['Branch']) : ''; ?>">
                </div>


                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <label for="roles" class="block mb-2">Key Roles & Responsibilities:</label>
                    <textarea id="roles" name="roles" required class="w-full p-2 border border-gray-300 rounded h-24">
                        <?php echo htmlspecialchars($internship['roles']); ?></textarea>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <label for="requirements" class="block mb-2">Requirements:</label>
                    <textarea id="requirements" name="requirements" required
                        class="w-full p-2 border border-gray-300 rounded h-24">
                        <?php echo htmlspecialchars($internship['requirements']); ?></textarea>
                </div>
        </div>
        <div class="relative">
            <button type="submit" name="update"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute bottom-4 right-4">
                Update
            </button>
        </div>
        </form>
    </div>
    </main>
</body>

</html>