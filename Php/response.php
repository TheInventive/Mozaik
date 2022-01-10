<?php
include "connection.php";

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
    $sql = "select * from mozaik.varosok WHERE megyeid = ".$_GET['name'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo $row['varosnev'] . ';';
        }

    }else {
        echo "Hiba!";
    }
    $conn->close();
}