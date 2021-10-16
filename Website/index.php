<?php
require "common.inc.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Englisch</title>

	<meta name="author" content="Sebastian Drebenstedt">
	
	<link rel="stylesheet" type="text/css" href="basic.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
	<header>
		<div class="container row">
			<div class="col col-5">
				<a href="index.php"><div class="favicon">
				</div></a>
			</div>
			
			<div class="col col-7 menu">
				<nav>
					<ul>
						<b><li><a href="index.php?view=uebung">Übungen</a></li></b>
						<b><li><a href="index.php?view=creadits">Credits</a></li></b>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<content>
		<?php require($incfile); ?>
	</content>
</body>
</html>