<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Internship</title>
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
        <div class="flex flex-1">
            <aside class="w-64 bg-gray-700 p-4">
                <nav>
                    <a href="companyDashboard.php" class="block text-white py-2">Dashboard</a>
                    <a href="internshipList.php" class="block text-white py-2">Internship</a>
                    <a href="applicationList.php" class="block text-white py-2">Application</a>
                </nav>
            </aside>
            <main class="flex-1 p-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold mb-4">New Internship Information</h2>
                    <form action="submitInternship.php" method="post" class="space-y-4">
                        <div>
                            <label for="position" class="block mb-2">Position:</label>
                            <input type="text" id="position" name="position" required
                                   class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div>
                            <label for="branch" class="block mb-2">Branch:</label>
                            <input type="text" id="branch" name="branch" required
                                   class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div>
                            <label for="roles" class="block mb-2">Key Roles & Responsibilities:</label>
                            <textarea id="roles" name="roles" required
                                      class="w-full p-2 border border-gray-300 rounded h-24"></textarea>
                        </div>
                        <div>
                            <label for="requirements" class="block mb-2">Requirements:</label>
                            <textarea id="requirements" name="requirements" required
                                      class="w-full p-2 border border-gray-300 rounded h-24"></textarea>
                        </div>
                        <div>
                            <label for="company_id" class="block mb-2">Company ID:</label>
                            <input type="text" id="company_id" name="company_id"
                            required class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div class="text-right">
                            <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
