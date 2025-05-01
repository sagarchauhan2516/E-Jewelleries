<?php
include 'db.php'; // database connection file

// Get form values
$first = $_POST['first-name'];
$last = $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm-password'];
$city = $_POST['city'];
$state = $_POST['state'];
$address = $_POST['address'];
$zip = $_POST['zip'];

// Validate password match
if ($password !== $confirm) {
    die("Error: Passwords do not match.");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insert into DB
$sql = "INSERT INTO users (first_name, last_name, email, phone, username, password, city, state, address, zip)
VALUES ('$first', '$last', '$email', '$phone', '$username', '$hashed_password', '$city', '$state', '$address', '$zip')";


if ($conn->query($sql) === TRUE) {
    echo "✅ Registration successful!";
} else {
    echo "❌ Error: " . $conn->error;
}
?>
