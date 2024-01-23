<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty of Computing</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<?php include('header_student.php'); ?>
    
    <div class="app">
        <aside class="sidebar">
            <h3>Menu</h3>
            
            <nav class="menu">
                <a href="studentDashboard.php" class="menu-item is-active">Dashboard</a>
                <a href="studentInternship.php" class="menu-item">Internship</a>
                <a href="internApplication.php" class="menu-item">Application</a>
            </nav>
        </aside>
    
    <main class="content">
        <div class="student-info">
            <img src="../images/avatar_scholar_256.png" alt="Student Photo" class="student-photo">
            <div class="student-details">
                <div class="detail"><strong>Name:</strong><span id="studentName">XXX</span></div>
                <div class="detail"><strong>Matric Number:</strong><span id="matricNo">A21EC0000</span></div>
                <div class="detail"><strong>IC Number:</strong><span id="icNo">0123456-78-9012</span></div>
            </div>
        </div>
        <div class="student-bottom-details">
            <div class="detail"><strong>Course:</strong><span id="course">SECJH</span></div>
            <div class="detail"><strong>CGPA:</strong><span id="cgpa">4.00</span></div>
        </div>
    </main>
    </div>
</body>
</html>
