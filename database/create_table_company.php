<?php
//3
$con = mysqli_connect("localhost", "root","");
if(!$con){
    die("Could not connect: " . mysqli_connect_error());
}

//Select database
mysqli_select_db($con, "sda23db");

//Create table
$sql = "CREATE TABLE `applicant` (
    `name` varchar(50) NOT NULL,
    `ic_no` varchar(15) NOT NULL,
    `address` varchar(500) NOT NULL,
    `programme` varchar(5) NOT NULL,
    `contactnum` varchar(15) NOT NULL,
    `email` varchar(100) NOT NULL,
    `status` varchar(50) NOT NULL,
    `student_id` int(5) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`student_id`)
  );

CREATE TABLE `company` (
    `company_id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) DEFAULT NULL,
    `contactnum` int(15) DEFAULT NULL,
    `email` varchar(50) DEFAULT NULL,
    `address` varchar(100) DEFAULT NULL,
    `region` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`company_id`)
  );

CREATE TABLE `companyform` (
    `student_id` int(5) NOT NULL,
    `name` varchar(50) NOT NULL,
    `address` varchar(250) NOT NULL,
    `website` varchar(1000) NOT NULL,
    `department` varchar(100) NOT NULL,
    `cp_name` varchar(250) NOT NULL,
    `cp_mobile` varchar(15) NOT NULL,
    `cp_phone` varchar(15) NOT NULL,
    `cp_fax` varchar(15) NOT NULL,
    `cp_email` varchar(100) NOT NULL,
    `accommodation` varchar(25) NOT NULL,
    `allowance` varchar(25) NOT NULL,
    `allowance_type` varchar(50) NOT NULL,
    `transportation` varchar(25) NOT NULL,
    `facilities` varchar(25) NOT NULL,
    `facilities_etc` varchar(250) NOT NULL,
    `scope` varchar(1000) NOT NULL,
    `issues` varchar(1000) NOT NULL,
    `file_name` varchar(255) NOT NULL,
    `file_mime` varchar(255) NOT NULL,
    `file_data` longblob NOT NULL,
    `monthly_payment` varchar(255) DEFAULT NULL,
    `incentive_money` varchar(255) DEFAULT NULL,
    `facilities_provided` varchar(255) DEFAULT NULL,
    `category` varchar(1000) NOT NULL
  );

  CREATE TABLE `internship` (
    `id` int(5) NOT NULL AUTO_INCREMENT,
    `position` varchar(100) NOT NULL,
    `Branch` varchar(50) NOT NULL,
    `roles` varchar(1000) NOT NULL,
    `requirements` varchar(1000) NOT NULL,
    `company_id` int(20) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `company_id` (`company_id`),
    CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`)
  );

";

if (mysqli_multi_query($con, $sql)) {
  echo "Tables created successfully";
} else {
  echo "Error creating tables: " . mysqli_error($con);
}

//Close connection
mysqli_close($con);
?>