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

if (isset($_GET["maps"])){
    $GLOBALS['turnCheck'] = $sql->query("SELECT turn FROM attendance WHERE name = '". $_COOKIE["team"] ."'");
    $GLOBALS['turnCheckRes'] = $turnCheck->fetch_assoc();
    $endCheck = $sql->query("SELECT map FROM maps WHERE chosen = 'false'") or die($sql->error);
    if ($_GET["maps"] == "empty"){
        $take = "SELECT * FROM maps";
        $result = $sql->query($take) or die($sql->error);
        if (implode($turnCheckRes) == "1"){
            if ($endCheck->num_rows == 1){
                echo("end,");
            }else {
                echo("true,");
            }
        }else{
            if ($endCheck->num_rows == 1){
                echo("end,");
            }else {
                echo("false,");
            }
            
        }
        while($row = $result->fetch_assoc()) {
            
            if ($row["chosen"] == "true"){
                echo($row["map"] . ",");
            }
        }
    }else {
        if (implode($turnCheckRes) != "1"){
            exit();
            echo("false");
        }

        $turnEdit = "UPDATE attendance SET turn = '0' WHERE name = '". $_COOKIE["team"] ."'";
        if ($sql->query($turnEdit) === TRUE) {
            $turnSwitch = $sql->query("UPDATE attendance SET turn = '1' WHERE name != '". $_COOKIE["team"] ."'");
            $take = "UPDATE maps SET chosen = 'true' WHERE map = '". $_GET["maps"] ."'";
            if ($sql->query($take) === TRUE) {
            
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
}

if (isset($_GET["reset"])){
    if ($_GET["reset"] == "chat"){
        $ins = "DELETE FROM chat";
        if ($sql->query($ins) === TRUE) {
            echo("complete");
        }else{
            echo "failed to send";
        }
    }elseif ($_GET["reset"] == "mapper") {
        $elmao = "UPDATE maps SET chosen= 'false'";
        if ($sql->query($elmao) === TRUE) {
            echo("complete");
        }else{
            echo "failed to send";
        } 
    }else {
        echo($_GET["reset"]);
    }
}


?>