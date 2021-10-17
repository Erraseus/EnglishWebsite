<div class="container">
	<div class="row col col-12">
		<center><h1>Übungen</h1></center><br>
<?php
$sql = "SELECT * FROM texts ORDER BY id;";
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


