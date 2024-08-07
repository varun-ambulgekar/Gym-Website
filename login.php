<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL injection prevention: Using prepared statements
    $stmt = $conn->prepare("SELECT (email,pass_word) FROM members WHERE VALUES($email) AND VALUES($password)");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row matches the login credentials
    if ($result->num_rows == 1) {
        echo "Login successful!";
        // Redirect to dashboard or another page
    } else {
        echo "Invalid email or password!";
    }  

    // Close prepared statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
