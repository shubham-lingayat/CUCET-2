<?php
// Database connection
$servername = "localhost";
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "student_details"; //database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set parameters and execute
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare and bind SQL statement
$stmt = $conn->prepare('INSERT INTO student (fullname, email, phone) VALUES (?, ?, ?);');
$stmt->bind_param('sss', $fullname, $email, $phone);



if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
