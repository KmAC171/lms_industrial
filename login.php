<?php
$conn = mysqli_connect("localhost", "root", "@KmAC0752953983", "learnhub");

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND passsword='$password'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Login successful!";
} else {
    echo "Invalid email or password.";
}
?>