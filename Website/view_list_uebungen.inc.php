<div class="container">
	<div class="row col col-12">
		<center><h1>Übungen</h1></center><br>

<form method="POST">
		<center>
		<select name="class" id="class">
			<option value="" disabled selected>--Klasse--</option>
			<option value="5">Klasse 5</option>
			<option value="6">Klasse 6</option>
			<option value="7">Klasse 7</option>
			<option value="8">Klasse 8</option>
			<option value="9">Klasse 9</option>
			<option value="10">Klasse 10</option>
			<option value="11">Klasse 11</option>
			<option value="12">Klasse 12</option>
		</select>
		</center>
		<center><input type="submit" name="submit" value="Suchen"></center>
</form>


<?php
$selected = 0;
    if(isset($_POST['submit'])){
		if(!empty($_POST['class'])) {
			$selected = $_POST['class'];
		}
    }
?>



<?php
if($selected != 0){
	$sql = "SELECT * FROM texts WHERE class = ".$selected." ORDER BY id;";
}else{
	$sql = "SELECT * FROM texts ORDER BY id;";
}
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)) 
{
?>

<center>
<h3><a href="index.php?view=uebung&&id=<?php echo $row['id']; ?>"><?php echo $row['name'];?></a></h3>
</center>

<?php
}
?>
	</div>
</div>


