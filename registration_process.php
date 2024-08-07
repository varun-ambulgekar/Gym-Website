<?php
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $pass_word = $_POST["pwd"]; // Assuming there's a password field
    $m_address = $_POST["address"];
    $city = $_POST["city"];
    $zip_code = $_POST["zip"];
    $country = $_POST["country"];
    $m_type = $_POST["membership_type"];
    $duration = $_POST["duration"];

    // Database connection parameters
    $servername = "localhost"; // Change this if your database server is different
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "gym_database"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO members (full_name, email, dob, pass_word, m_address, city, zip_code, country, m_type, duration) 
    VALUES ('$full_name', '$email', '$dob',' $pass_word', '$m_address', '$city', '$zip_code', '$country',' $m_type', '$duration')");
    

    // Execute statement
    if ($stmt->execute()) {
        // Redirect to a thank you page if insertion is successful
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
