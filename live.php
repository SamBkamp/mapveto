<?php
$sql = new mysqli("localhost", "root", "", "interhouse");

if (isset($_GET["pay"])){
    if ($_GET["pay"] != ""){
        $ins = "INSERT INTO chat(sender, data)  VALUES ('". $_COOKIE["team"] . "', '". $_GET["pay"] ."')";
        if ($sql->query($ins) === TRUE) {
        }else{
            echo "failed to send";
        }
    }
    $take = "SELECT sender, data FROM chat";
    $result = $sql->query($take);

    while($row = $result->fetch_assoc()) {
        echo('<div class="payload">
        <p class="data"><b>' . $row["sender"] .': </b>'. $row["data"] .'</p>
    </div>');
    }
}

if (isset($_GET["reset"])){
    $ins = "DELETE FROM chat";
    if ($sql->query($ins) === TRUE) {
    }else{
        echo "failed to send";
    }
}

?>