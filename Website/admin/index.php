<?php
define("IN_ADMIN", 1);
require "../common.inc.php";

//Session
session_set_cookie_params(900);
session_start();
$session_id = session_id();

if(!empty($_POST['login'])) {
	// Login
	$sql = "SELECT id
		FROM users
		WHERE name=".m($_POST['username'])."
		AND password=".m(md5($_POST['password']));
	$res = mysql_query($sql);
	if(mysql_num_rows($res) > 0) {
		$row = mysql_fetch_assoc($res);
		
		$sql = "INSERT INTO sessions (user_id, session_id) VALUES(".$row['id'].", ".m($session_id).")";
		mysql_query($sql);
	}
}

if(!empty($_GET['logout'])) {
	$sql = "DELETE FROM sessions WHERE session_id=".m($session_id);
	mysql_query($sql);
	header("Location: index.php");
}

$login_ok = false;

$sql = "SELECT * FROM sessions WHERE session_id=".m($session_id);
$res = mysql_query($sql);
if(mysql_num_rows($res) > 0) {
	$login_ok = true;
}
?>


<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title>Administration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Sebastian Drebenstedt">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">


  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>




</head>

<body>
<?php
if($login_ok)
{
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="../index.php">Englisch</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="index.php?view=list_texts">Texte</a>
						</li>
						<li>
							<a href="index.php?view=list_users">Benutzer</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Benutzer<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="index.php?logout=1">Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
	<div class="row clearfix">
		<?php require($incfile); ?>
	</div>
</div>
<?php
} else {
?>
<!-- Loginformular -->
<div class="container login">
	<div class="row">
		<div class="center col-md-4 col-md-offset-4 well">
			<legend>Login</legend>
			<form method="POST">
				<input type="text" class="form-control span4" name="username" placeholder="Benutzername">
				<input type="password" class="form-control span4" name="password" placeholder="Passwort">
				<button type="submit" name="login" value="1" class="btn btn-primary btn-block">Anmelden</button>
			</form>
		</div>
	</div>
</div>
<?php
}
?>

</body>
</html>

