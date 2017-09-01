<html>
	<head>
		<link rel="stylesheet" type="text/css" href="maingui.css">
		<script src="mainscript.js"></script>
		<script src="battlesystem.js"></script>
		<?php	
			include 'classes.php';
			$enemy = new Enemy();
			$enemy->loadEnemy(0);
			$enemy->jsChar("enemy");
			
		?>
	</head>
	<body>
		<img id="background" src="back.jpg" style="width:100%; height:100%;"></img>
		<div id="main-box">
			<span id="navBar">
				<ul>
					<li><a href="index.html"> Home </a> </li>
					<li><a href="index.html"> Account Settings </a> </li>
					<li><a href="index.html"> Private Messages </a> </li>
					<li style="float:right; border-left: 1px solid #bbb;"><a id="username" href="index.html"> Profile </a> </li>
				</ul>
			</span>
			<span id="avatar-frame">
				<img id = "avatar" src="avatar.png"></img>
				<div id="stat-box" class="dropdown"></div>
			</span>
		</div>
		<script>
			backgroundTime();
			var player = new Character("Konochi", 1, 20, 20, 10, 10,10, "blah", true, "vivi.png");
			setUpCharacter(player);
			
			Battle(player, enemy);
			showStats(player);
		</script>
	</body>
</html>