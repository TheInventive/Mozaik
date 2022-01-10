<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dropdown.css">
    <title>Title</title>
</head>
<body>
<form action="">
    <div class="dropdown">
        <button class="dropbtn" >Válasszon!</button>
        <div class="dropdown-content">

            <?php
            include "../Php/connection.php";
            $sql = "select * from mozaik.megyek;";

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

            <script>
                <?php
                    for($j = 1; $j < $i; $j++){
                        echo 'document.getElementById(\''.($j).'\').addEventListener(\'click\', getName);';
                    }
                ?>

                function getName(e){
                    e.preventDefault();

                    var xhr = new XMLHttpRequest();
                    console.log(this.value);
                    xhr.open('GET', 'connection.php?name='+this.value, true);

                    xhr.onload = function(){
                        console.log(this.responseText);
                    }

                    xhr.send();
                }


                function postName(e){
                    e.preventDefault();

                    var name = document.getElementById('name2').value;
                    var params = "name="+name;

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'process.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    xhr.onload = function(){
                        console.log(this.responseText);
                    }

                    xhr.send(params);
                }
            </script>
        </div>
    </div>
    <div id="table">

    </div>
</form>
</body>
</html>