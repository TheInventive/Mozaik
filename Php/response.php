<?php
include "connection.php";

if(isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $county = mysqli_real_escape_string($conn, $_POST['county']);
    echo 'The county is' .$county;
    $query = "INSERT INTO u448975089_mozaik.varosok(varosnev,megyeid) VALUES('$name','$county')";

    if(mysqli_query($conn, $query)){
        echo 'User Added...';
    } else {
        echo 'ERROR: '. mysqli_error($conn);
    }
}

if(isset($_GET['name'])){
    $sql = "select * from u448975089_mozaik.varosok WHERE megyeid = ".$_GET['name'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo $row['varosnev'] . ';';
        }

    }
    $conn->close();
}