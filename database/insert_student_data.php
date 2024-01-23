<?php
//4
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}

//Select database
mysqli_select_db($conn, "sda23db");

//Insert data to table
$query = "INSERT INTO Student (studentName, icNo, mailingAddress, programme, phoneNo, email, studentPassword) 
VALUES
('User1', '021111-01-1111', 'MA1-1-01, Kolej Tun Dr Ismail UTM', 'SECJH','0147852369','user1@gmail.com','123456'),
('John Doe', '0123456951', '123 Main St, Anytown', 'SE', '0123456789', 'johndoe@example.com', '456789'),
('LIM SHI KAI', '020729-01-0149', 'Bukit Pasir, Johor', 'SECJH', '01154285809', 'skylimsk@hotmail.com', '852963'),
('Jane Smith', '234569871', '456 Side St, Othertown', 'IT', '9876543210', 'janesmith@example.com', '147852')";

if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

//Close connection
mysqli_close($conn);
?>
