<?php
    $con = mysqli_connect("localhost", "root", "");

    if(!$con){
        die('Could not connect: '.mysqli_connect_error());
    }
    
    mysqli_select_db($con, "internFC");

    $sql = "CREATE TABLE Student (
        studentID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        studentName varchar(50),
        icNo varchar(50),
        programme varchar(250),
        phoneNo varchar(100),
        email varchar(100),
        studentPassword varchar(250),
        CONSTRAINT UC_User_Email UNIQUE (email)
    )";

    if (mysqli_query($con, $sql)) {
        echo 'Table created successfully';
    } else {
        echo 'Error creating table: ' . mysqli_error($con);
    }

    $sql = "CREATE TABLE coordinatorInfo (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        coorName varchar(250),
        coorFac varchar(250),
        coorOfficeNo varchar(50),
        coorPhoneNo varchar(50),
        coorEmail varchar(250),
        coorProgramme varchar(250)
    )";

    if (mysqli_query($con, $sql)) {
        echo 'Table created successfully';
    } else {
        echo 'Error creating table: ' . mysqli_error($con);
    }
    
    $sql = "CREATE TABLE companyInfo (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        comName varchar(250) UNIQUE,
        comRegNo varchar(250),
        comPicName varchar(250),
        comWeb varchar(250),
        comCategory varchar(250),
        comSector varchar(250),
        comCity varchar(250),
        comState varchar(250),
        comPostcode varchar(50),
        comCountry varchar(50),
        comOfficeNo varchar(50),
        comFaxNo varchar(50)
    )";

    if (mysqli_query($con, $sql)) {
        echo 'Table created successfully';
    } else {
        echo 'Error creating table: ' . mysqli_error($con);
    }

    $sql = "CREATE TABLE companyDepartment (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        departName varchar(250),
        picName varchar(250),
        picOfficePhoneNo varchar(50),
        picFaxNo varchar(50),
        picMobileNo varchar(50),
        picEmail varchar(250)
    )";

    if (mysqli_query($con, $sql)) {
        echo 'Table created successfully';
    } else {
        echo 'Error creating table: ' . mysqli_error($con);
    }

    $sql = "CREATE TABLE placementDetails (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        accommodation varchar(250),
        distance varchar(50),
        transportation varchar(250),
        comProfile varchar(250),
        scopeOffer varchar(250)
    )";

    if (mysqli_query($con, $sql)) {
        echo 'Table created successfully';
    } else {
        echo 'Error creating table: ' . mysqli_error($con);
    }

    $sql = "CREATE TABLE internApplication (
        applicationId int AUTO_INCREMENT NOT NULL PRIMARY KEY,
        coordinatorInfo int NOT NULL,
        companyDetails int NOT NULL,
        departmentDetails int NOT NULL,
        placeDetails int NOT NULL,
        userApplication int,
        Foreign Key (coordinatorInfo) REFERENCES coordinatorInfo(id),
        Foreign Key (companyDetails) REFERENCES companyInfo(id),
        Foreign Key (departmentDetails) REFERENCES companyDepartment(id),
        Foreign Key (placeDetails) REFERENCES placementDetails(id),
        Foreign Key (userApplication) REFERENCES Student(studentId)
    )";

    if (mysqli_query($con, $sql)) {
        echo 'Table created successfully';
    } else {
        echo 'Error creating table: ' . mysqli_error($con);
    }
?>