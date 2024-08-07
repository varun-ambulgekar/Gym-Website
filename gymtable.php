<!DOCTYPE html>
<html>
<body>
<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="gym_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
     die("Connection failed". $conn->connect_error);
}

$sql1 = "CREATE TABLE  members(
     full_name  VARCHAR(30) NOT NULL,
     email VARCHAR(50) PRIMARY KEY,
     dob VARCHAR(15) NOT NULL,
     pass_word VARCHAR(15) NOT NULL,
     m_address VARCHAR(50) NOT NULL,
     city VARCHAR(15) NOT NULL,
     zip_code VARCHAR(15) NOT NULL,
     country VARCHAR(15) NOT NULL,
     m_type VARCHAR(15) NOT NULL,
     duration VARCHAR(15) NOT NULL,
     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
     )";
if ($conn->query($sql1) === TRUE) 
{
	echo "Database created successfully";
} 
else 
{
	echo "Error creating database: " . $conn->error;
}
$conn->close();
?>
</body>
</html>