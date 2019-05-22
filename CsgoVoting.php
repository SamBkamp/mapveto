<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Map Veto</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<?php
			$sql = new mysqli("localhost", "root", "", "interhouse");
			if (isset($_GET["auth"]) and isset($_GET["t1"]) and isset($_GET["t2"])){
				$check = "SELECT att, sec FROM attendance WHERE name='" . $_GET["t1"] ."'";
				
				$checkQuery = $sql->query($check) or die($sql->error);
				$checkFin = $checkQuery->fetch_assoc();
				if ($checkFin["att"] == "0"){
					if($checkFin["sec"] == $_GET["auth"]){
						$update = "UPDATE attendance SET att = '1' WHERE name ='" . $_GET["t1"] . "'";
						if ($sql->query($update) === TRUE) {
							setcookie("team", $_GET["t1"], time() + (86400 * 30), "/");
						}else {
							header("Location: /");
						}
					}else {
						header("Location: /");
					}
				}else {
					header("Location: /");
				}
			}else{
				header("Location: /");
			}
		?>
		<div id="chat-main">
			<div id="Cheader">
				<p id="chat">Chat</p>
			</div>
			<div id="chatRoom">
				
				
			</div>
			<input id="input" placeholder="chat" type="text" maxlength="25">
		</div>
		<h1 id="turn">its someones turn</h1>
		<div id="totalWrap">
			<div id="toprow">
				<div id="train" class="del">
					<!-- <img src="trainT.png" class="text" id="trainImage"/> -->
					<img src="media/train.png" class="image elmao" method="get"/>
				</div>
				<div id="dust" class="del">
						<img src="media/dust.png" class="image" method="get"/>
				</div>
				<div id="inferno" class="del">
						<img src="media/inferno.png" class="image" method="get"/>
				</div>
				<div id="cobble" class="del">
						<img src="media/cobble.png" class="image" method="get"/>
				</div>
			</div>
			<div id="secondrow">
					<div id="olofpass" class="del">
							<img src="media/olofpass.png" class="image" method="get"/>
					</div>
					<div id="mirage" class="del">
							<img src="media/mirage.png" class="image" method="get"/>
					</div>
					<div id="nuke" class="del">
							<img src="media/nuke.png" class="image" method="get"/>
					</div>
					<div id="cache" class="del">
							<img src="media/cache.png" class="image" method="get"/>
					</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
		
	</body>
</html>