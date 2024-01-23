<?php
    $conn = mysqli_connect("localhost", "root","");
    if(!$conn){
        die("Could not connect: " . mysqli_connect_error());
    }

    //Select database
    mysqli_select_db($conn, "sda23db");

    // Create JKLI table
    $jkli = "CREATE TABLE IF NOT EXISTS JKLI (
        id INT(11) NOT NULL AUTO_INCREMENT,
        JKLIName VARCHAR(255) NOT NULL,
        JKLIContactNo VARCHAR(20) NOT NULL,
        JKLIEmailAddress VARCHAR(255) NOT NULL,
        JKLICoordinatorFor VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )";

    if (mysqli_query($conn, $jkli)) {
        echo 'Table JKLI created successfully';
    } else {
        echo 'Error creating table JKLI: ' . mysqli_error($conn);
    }

    // Create Student table
    $student = "CREATE TABLE IF NOT EXISTS Student (
        studentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        studentName VARCHAR(50),
        icNo VARCHAR(50),
        mailingAddress VARCHAR(255),
        programme VARCHAR(250),
        phoneNo VARCHAR(100),
        email VARCHAR(100) UNIQUE,
        studentPassword VARCHAR(250)
    )";

    if (mysqli_query($conn, $student)) {
        echo 'Table Student created successfully<br>';
    } else {
        echo 'Error creating table Student: ' . mysqli_error($conn) . '<br>';
    }


    // Create applicants table 
    $applicants = "CREATE TABLE IF NOT EXISTS applicants (
        applicationID INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        ic_no VARCHAR(15) NOT NULL,
        address VARCHAR(500) NOT NULL,
        programme VARCHAR(5) NOT NULL,
        contactnum VARCHAR(15) NOT NULL,
        email VARCHAR(100) NOT NULL,
        JKLIStatus VARCHAR(50) NOT NULL DEFAULT 'Pending',
        companyStatus VARCHAR(50) NOT NULL DEFAULT 'Pending',
        student_id INT(5) NOT NULL,
        PRIMARY KEY (applicationID),
        FOREIGN KEY (student_id) REFERENCES Student(studentID)
    )";


    if (mysqli_query($conn, $applicants)) {
        echo 'Table applicants created successfully<br>';
    } else {
        echo 'Error creating table applicants: ' . mysqli_error($conn) . '<br>';
    }


    mysqli_close($conn);
?>
