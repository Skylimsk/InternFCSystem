<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<?php include('header_student.php'); ?>

    
    <div class="app">
        <aside class="sidebar">
            <h3>Menu</h3>
            
            <nav class="menu">
                <a href="studentDashboard.php" class="menu-item">Dashboard</a>
                <a href="studentInternship.php" class="menu-item is-active">Internship</a>
                <a href="internApplication.php" class="menu-item">Application</a>
            </nav>
        </aside>
    
    <main class="content">
        <table class="internship-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Company Name</th>
                    <th>Location</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Resorts World Genting</td>
                    <td>Pahang</td>
                    <td>012-3456789</td>
                    <td><img src="../images/details-icon.png" alt="view details" class="view-icon"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Easybook (M) Sdn Bhd</td>
                    <td>Kuala Lumpur</td>
                    <td>012-9876543</td>
                    <td><img src="../images/details-icon.png" alt="view details" class="view-icon"></td>
                </tr>
            </tbody>
        </table>
    </main>
    </div>
</body>
</html>
