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
						setcookie("team", $_GET["t1"], time() + (86400 * 30), "/");
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
		<div id="totalWrap">
			<div id="toprow">
				<div id="train" class="del">
					<img src="trainT.png" class="text" id="trainImage"/>
					<img src="train.png" class="image"/>
				</div>
				<div id="dust" class="del">
						<img src="dustT.png" class="text"/>
						<img src="dust.png" class="image"/>
				</div>
				<div id="inferno" class="del">
						<img src="infernoT.png" class="text"/>
						<img src="inferno.png" class="image"/>
				</div>
				<div id="cobble" class="del">
						<img src="cobbleT.png" class="text"/>
						<img src="cobble.png" class="image"/>
				</div>
			</div>
			<div id="secondrow">
					<div id="overpass" class="del">
							<img src="overpassT.png" class="text"/>
							<img src="overpass.png" class="image"/>
					</div>
					<div id="mirage" class="del">
							<img src="mirageT.png" class="text"/>
							<img src="mirage.png" class="image"/>
					</div>
					<div id="nuke" class="del">
							<img src="nukeT.png" class="text"/>
							<img src="nuke.png" class="image"/>
					</div>
					<div id="cache" class="del">
							<img src="cacheT.png" class="text"/>
							<img src="cache.png" class="image"/>
					</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
		
	</body>
</html>