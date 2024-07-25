<?php
// Database connection details
$host = 'localhost';
 
$dbname = 'euro_User';
$username = 'euro_admin';
$password = 'lNkua-DBJEzwd1b0';

// Separate host and port
//list($host, $port) = explode(':', $host);


// Create connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Retrieve and sanitize form data
$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);
$number = $mysqli->real_escape_string($_POST['number']);
// $adhar = $mysqli->real_escape_string($_POST['adhar']);
// $passport = $mysqli->real_escape_string($_POST['passport']);
// $ielts = $mysqli->real_escape_string($_POST['ielts']);
$country = $mysqli->real_escape_string($_POST['country']);
$state = $mysqli->real_escape_string($_POST['state']);
// $city = $mysqli->real_escape_string($_POST['city']);
// $mark10th = floatval($_POST['mark10th']);
// $mark12th = floatval($_POST['mark12th']);
// $cgpa = floatval($_POST['cgpa']);
// $up_pg = $mysqli->real_escape_string($_POST['up_pg']);
// $hr_name = $mysqli->real_escape_string($_POST['hr_name']);
// $passport_image = $mysqli->real_escape_string($_POST['passport_image']);
// Handle file upload
/* if (isset($_FILES['passport_image']) && $_FILES['passport_image']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['passport_image']['tmp_name'];
    $fileName = $_FILES['passport_image']['name'];
    $fileType = $_FILES['passport_image']['type'];
    $fileContent = addslashes(file_get_contents($fileTmpPath));
} else {
    $fileContent = null;
}
 */
// Prepare an SQL statement
$stmt = $mysqli->prepare('INSERT INTO applications (name, email, number,country, state) VALUES (?, ?, ?, ?, ?)');

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($mysqli->error));
}

// Bind parameters
$stmt->bind_param('sssss', $name, $email, $number, $country, $state);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful";
} else {
    echo 'Execute failed: ' . htmlspecialchars($stmt->error);
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>
