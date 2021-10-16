<?php
function m($str)
{
	$str = mysql_escape_string($str);
	return "'".$str."'";
}

mysql_connect("localhost", "root", ""); //("Server", "Username", "Password")
mysql_select_db("Englisch");



//Viewhandling
$view = "home";
if(!empty($_GET['view'])) {
	$view = $_GET['view'];
}
$view = preg_replace("/[^a-z0-9_]/", "", $view);
$incfile = "view_".$view.".inc.php";
if(!file_exists($incfile)) {
	$incfile = "view_notfound.inc.php";
}
?>