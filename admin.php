<!doctype HTML>
<html>
    <head>
    </head>
    <body>  
        
        <form method="post" action="admin.php">
            <input name="pass" placeholder="password"/>
        </form>
        <?php 
        
        $sql = new mysqli("localhost", "root", "", "interhouse");
        function randomS(){
            $chars = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
            $ex = "";
            for ($i = 0; $i <= 7; $i++){
                $r = rand(0, sizeof($chars)-1);
                $ex = $ex . $chars[$r];
            }
            return $ex;
        }
            if (isset($_POST["pass"])){
                if ($_POST["pass"] == "dab"){
                    echo "<script>document.body.innerHTML = '';</script>";
                    echo "<form action=admin.php method=post>";
                    echo "<input placeholder='team 1' name='team1'>";
                    echo "<input placeholder='team 2' name='team2'>";
                    echo("<button>dab</button>");
                    echo "</form>";
                }else {
                    echo "wrong password";
                }

            }elseif (isset($_POST["team1"])){
                echo "<script>document.body.innerHTML = '';</script>";
                echo "<form action=admin.php method=post>";
                echo "<input placeholder='team 1' name='team1'>";
                echo "<input placeholder='team 2' name='team2'>";
                echo("<button>dab</button>");
                echo "</form>";
                echo("<br>");
               
                $t1thing = md5($_POST["team1"] . $_POST["team2"] . randoms());
                $t2thing = md5($_POST["team1"] . $_POST["team2"] . randoms());
                
                echo("team 1: CsgoVoting.php?auth=" . $t1thing . "&t1=" . $_POST["team1"] . "&t2=" . $_POST["team2"]);
                echo("<br>");
                echo("team 2: CsgoVoting.php?auth=" . $t2thing . "&t1=" . $_POST["team2"] . "&t2=" . $_POST["team1"]);
                
                $yiddlepod = "UPDATE attendance SET name='" . $_POST["team1"]. "', att='0', sec='". $t1thing ."' WHERE id=1";
                $yiddlepodls = "UPDATE attendance SET name='" . $_POST["team2"]. "', att='0', sec='". $t2thing ."' WHERE id=2";
                echo("<br>");
                echo('<script>function remove(){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert("done");
                        }
                    };
                    xhttp.open("GET", "live.php?reset=dab", true);
                    xhttp.send();
                }</script>');
                echo("<button onclick=remove()> delete chat</button>");
                if ($sql->query($yiddlepod) === TRUE) {
                    if ($sql->query($yiddlepodls) === TRUE) {
                    } else {
                        echo ("<br>");
                        echo "Error updating record 2: " . $sql->error;
                    }
                } else {
                    echo ("<br>");
                    echo "Error updating record 1: " . $sql->error;
                    if ($sql->query($yiddlepodls) === TRUE) {
                    } else {
                        echo ("<br>");
                        echo "Error updating record 2: " . $sql->error;
                    }
                }
            }else {
                echo("enter password");
            }
        ?>
        <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    </body>
<html>
