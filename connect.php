<?php
$conn = mysqli_connect("localhost", "root", "", "structure_institute");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($conn, "structure_institute");

// ...some PHP code for database "test"...

mysqli_close($conn);


?>
