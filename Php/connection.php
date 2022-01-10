<?php
$servername = "localhost";
$username = "root";
$password = "erikeCi441";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $query = "INSERT INTO users(name) VALUES('$name')";

    if(mysqli_query($conn, $query)){
        echo 'User Added...';
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
}

if(isset($_GET['name'])){
    echo 'GET: Your name is '. $_GET['name'];
}