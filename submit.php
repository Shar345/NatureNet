<?php
// Database connection
$servername = "localhost";
$username = "root"; // use your phpmyadmin username
$password = ""; // use your phpmyadmin password
$dbname = "naturenet"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data from form into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];
    $descript = $_POST['descript'];

    $sql = "INSERT INTO members (fullname, age, email, occupation, descript) 
            VALUES ('$fullname', '$age', '$email', '$occupation', '$descript')";

    if ($conn->query($sql) === TRUE) {
        echo "Form Submitted Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
