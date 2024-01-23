<?php
//4
$conn = mysqli_connect("localhost", "root","");
if(!$conn){
    die("Could not connect: " . mysqli_connect_error());
}

//Select database
mysqli_select_db($conn, "sda23db");

//Insert data to table
$query = "INSERT INTO JKLI (JKLIName, JKLIContactNo, JKLIEmailAddress, JKLICoordinatorFor) VALUES('Dr. Noorfa Haszlinna binti Mustaffa', '07-5532096', 'noorfa@utm.my', 'Coordinator Of Industrial Training')";

if(mysqli_query($conn, $query)){
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

//Close connection
mysqli_close($conn);
?>
