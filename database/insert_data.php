<?php
//4
$con = mysqli_connect("localhost", "root","");
if(!$con){
    die("Could not connect: " . mysqli_connect_error());
}

//Select database
mysqli_select_db($con, "sda23db");

//Insert data to table
mysqli_query($con, "INSERT INTO `company` (`company_id`, `name`, `contactnum`, `email`, `address`, `region`) VALUES
(1, 'Genting Malaysia Berhad', 603123456, 'genting-internship@rwgenting.com', 'Genting Highlands Resort, Pahang.', 'Pahang, Malaysia')");
mysqli_query($con, "INSERT INTO `applicant` (`name`, `ic_no`, `address`, `programme`, `contactnum`, `email`, `status`, `student_id`) VALUES
('LIM SHI KAI', '020729-01-0149', 'Bukit Pasir, Johor', 'SECJH', '01154285809', 'skylimsk@hotmail.com', 'Approved', 6),
('LIM SHI KAI', '020729-01-0149', 'Bukit Pasir, Johor', 'SECJH', '01154285809', 'skylimsk@hotmail.com', 'Approved', 7)");
mysqli_query($con, "INSERT INTO `companyform` (`student_id`, `name`, `address`, `website`, `department`, `cp_name`, `cp_mobile`, `cp_phone`, `cp_fax`, `cp_email`, `accommodation`, `allowance`, `allowance_type`, `transportation`, `facilities`, `facilities_etc`, `scope`, `issues`, `file_name`, `file_mime`, `file_data`, `monthly_payment`, `incentive_money`, `facilities_provided`, `category`) VALUES
(6, 'Genting Malaysia Berhad', 'Resorts World Genting, Pahang', 'www.rwgenting.com', 'IT Department', 'Sky', '601154285809', '603587599', '603587599', 'sky@rwgenting.com.my', 'Provided', 'Provided', 'Monthly Payment', 'Provided', 'Computer, Internet, Works', '', 'Test', 'Test', '', '', '', '1000', '', 'Provided', 'Software_Engineering')");
mysqli_query($con, "INSERT INTO `internship` (`id`, `position`, `Branch`, `roles`, `requirements`, `company_id`) VALUES
(1, 'IT Software Engineer (Back End Developer)', 'Main', '- Design, develop, test, debug, and implementation of applications to satisfy business requirements. \r\n- Provide technical consultation for developing new system or enhancing existing ones to support the business needs. \r\n- Research and evaluation of alternative solutions, and recommended implementations. Perform code reviews and testing.', '- Professional Certificate, Diploma, Advance/Higher/Graduate Diploma, bachelor’s degree, Post Graduate Diploma or Professional Degree in Software Engineer/ Computer Science/Information Technology or equivalent. \r\n- Knowledge of and experience with system design using Python, Visual Studio, ASP.NET, JavaScript, HTML, CSS, AJAX, C#. \r\n- Experience in Microsoft Power BI will be added advantage.', 1)");


//Close connection
mysqli_close($con);
?>