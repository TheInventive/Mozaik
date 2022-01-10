<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dropdown.css">
    <title>Title</title>
</head>
<body>
<form id="form" action="">
    <div class="dropdown">
        <h1 class="h">Megye:</h1>
        <button class="dropbtn" id="choice">Válasszon!</button>
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
                    document.getElementById('choice').innerText = e.target.innerText;
                    document.getElementById('megye').innerText = e.target.innerText;
                    e.preventDefault();

                    var xhr = new XMLHttpRequest();
                    console.log(e.target.id);
                    xhr.open('GET', '../Php/response.php?name='+e.target.id, true);

                    xhr.onload = function(){
                        console.log(this.responseText);
                        let elements = this.responseText.slice(0, -1).split(';');
                        let output = '';

                        for (const i in elements) {
                            output += '<ul>' +
                                '<li>'+elements[i]+'</li>' +
                                '</ul>';
                        }
                        document.getElementById("result").innerHTML = output;
                    }

                    xhr.send();
                }
            </script>
        </div>
    </div>
    <h1 class="h">Megye:</h1>
    <h1 class="h" id="megye"></h1>
    <div id="result">
    </div>
</form>
</body>
</html>