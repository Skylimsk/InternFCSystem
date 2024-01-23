<?php
//4
$conn = mysqli_connect("localhost", "root","");
if(!$conn){
    die("Could not connect: " . mysqli_connect_error());
}

//Select database
mysqli_select_db($conn, "sda23db");
mysqli_query($conn,"INSERT INTO applicants (name, ic_no, address, programme, contactnum, email, JKLIStatus, companyStatus,student_id) 
VALUES 
('John Doe', '0123456951', '123 Main St, Anytown', 'SE', '0123456789', 'johndoe@example.com', 'Pending', 'Pending',2),
('Jane Smith', '234569871', '456 Side St, Othertown', 'IT', '9876543210', 'janesmith@example.com', 'Pending', 'Pending',4),
('User1', '021111-01-1111', 'MA1-1-01, Kolej Tun Dr Ismail UTM', 'SECJH', '014-7852369', 'user1@gmail.com', 'Pending', 'Pending',1);");


//Close connection
mysqli_close($conn);
?>