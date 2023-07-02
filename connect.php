<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$location = $_POST['location'];

$conn = new mysqli('localhost', 'root', '', 'hotel');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO myhotel (firstname, lastname, gender, email, telephone, location) VALUES (?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}

$stmt->bind_param("ssssss", $firstname, $lastname, $gender, $email, $telephone, $location);
$stmt->execute();
echo "Order received...WELCOME AGAIN";
$stmt->close();
$conn->close();
?>

