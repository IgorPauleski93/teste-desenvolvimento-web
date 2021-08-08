<?php
	/*session_start();
	if (isset($_SESSION["numlogin"])) {
		$nl=$_GET["num"];
		$n2=$_SESSION["numlogin"];
		if ($n1!=$n2) {
			echo "<p>Login não efetuado</p>";
			exit;
		}
	}else{
		echo "<p>Login não efetuado</p>";
		exit;
	}*/
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="jquery-3.1.1.min.js" type="text/javascript"></script>

	<script>
		$(document).ready(function(){
			$("#menub1, #menub2, #menub3").css("visibility","hidden");
			$("#menua1").click(function(){
				$("#menub1").css("visibility","visible");
				$("#menub2").css("visibility","hidden");
				$("#menub3").css("visibility","hidden");
			});
			$("#menua2").click(function(){
				$("#menub1").css("visibility","hidden");
				$("#menub2").css("visibility","visible");
				$("#menub3").css("visibility","hidden");
			});
			$("#menua3").click(function(){
				$("#menub1").css("visibility","hidden");
				$("#menub2").css("visibility","hidden");
				$("#menub3").css("visibility","visible");
			});
			$("#menub1, #menub2, #menub3").mouseover(function(){
				$(this).css("visibility","visible");
			});
			$("#menub1, #menub2, #menub3").mouseout(function(){
				$(this).css("visibility","hidden");
			});
		});
	</script>

	<title>Menu</title>
</head>
<body>

	<section>
		<p>Menu principal de gerenciamento.</p>
	</section>

	<nav>
		<div class="menu_ger">
			<button id="menua1" class="btmenu">Posts</button>
			<div id="menub1" class="menub">
				<a href="#" target="_self">Create</a>
				<a href="#" target="_self">Read</a>
				<a href="#" target="_self">Update</a>
				<a href="#" target="_self">Delete</a>
				<a href="#" target="_self">Index(Listagem)</a>
			</div>
		</div>

		<div id="menua2" class="menu_ger">
			<button class="btmenu">Users</button>
			<div id="menub2" class="menub">
				<a href="#" target="_self">Create</a>
				<a href="#" target="_self">Update</a>
				<a href="#" target="_self">Delete</a>
			</div>
		</div>

		<div id="menua3" class="menu_ger">
			<button class="btmenu">Logoff</button>
			<div id="menub3" class="menub">
				<a href="#" target="_self">Exit</a>
			</div>
		</div>
	</nav>
	
</body>
</html>