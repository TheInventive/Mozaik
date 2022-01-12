<?php
$servername = "localhost";
$username = "u448975089_erikhosszu";
$password = "D>v~r~Ap*p5";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

