<?php
if(!empty($_REQUEST['error'])){
	$fehler = $_REQUEST['error'];
?>

<div class="container middle-credits">
	<div class="row col col-12">
		<center><h1 class="win">Geschafft!</h1></center>
		<center>Fehler: <?php echo($fehler)?></center>
	</div>
</div>

<?php
}else{
?>

<div class="container middle-credits">
	<div class="row col col-12">
		<center><h1 class="win">Geschafft!</h1></center>
		<center>Keine Fehler</center>
	</div>
</div>

<?php
}
?>





