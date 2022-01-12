<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Html/dropdown.css">
    <title>Title</title>
</head>
<body>
<form action="">
    <div class="flex-container">
        <h1 class="h">Megye:</h1>
        <div class="dropdown">
            <button class="dropbtn" id="choice" disabled>Válasszon!</button>
            <div class="dropdown-content">
                <?php
                include "Php/connection.php";
                $sql = "select * from u448975089_mozaik.megyek;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                        $i++;
                        echo '<form method="post"><button id="'.$row["megyeid"].'">'. $row["megyenev"].'</input></form><br>';
                    }
                    global $i;

                }else {
                    echo "Hiba!";
                }
                $conn->close();

                ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="Js/EditableText.js"></script>
                <script src="Js/GetName.js"></script>
                <script>
                    <?php
                    for($j = 1; $j < $i; $j++){
                        echo 'document.getElementById(\''.($j).'\').addEventListener(\'click\', getName);';
                    }?>
                </script>
            </div>
        </div>
        <h1 class="h">Megye:</h1>
        <div>
            <h1 class="h" id="megye"></h1>
            <div id="result"></div>
        </div>
    </div>
    <div class="flex-container">
        <h1>Új város</h1>
        <form id="post-form">
            <input id="name2" type="text">
            <button type="submit">Felvesz</button>
        </form>
    </div>
    <script src="Js/PostName.js"></script>
</form>
</body>
</html>