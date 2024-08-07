<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname="gym_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if email and password exist
    $sql = "SELECT * FROM members WHERE email=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['pass_word'])) {
            echo "Login successful!";
        
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

$stmt->close();
}
?>
