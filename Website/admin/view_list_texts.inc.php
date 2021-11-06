<?php if(!defined("IN_ADMIN")) die; ?>

<?php
$result = mysql_query("select count(1) FROM texts");
$row = mysql_fetch_array($result);
if(intval($row[0]) < 52){
?>
<center><h1>Texte</h1></center>
<div class="col-md-2 column">
	<div class="btn-group btn-group-vertical">
		 <a class="btn btn-default" href="index.php?view=edit_text"><em class="glyphicon glyphicon-plus"></em>Neuer Text</a>
	</div>
</div>
<?php
}
?>

<div class="col-md-10 column">
<?php
if(isset($_GET['action']) && $_GET['action'] == "delete")
{
	$sql = "DELETE FROM texts WHERE id=".intval($_GET['id']);
	mysql_query($sql);
	?><div class="alert alert-success">Der Text wurde erfolgreich gelöscht!</div><?php
	header("Location: index.php?view=list_texts");
}

$sql = "SELECT * FROM texts ORDER BY id;";
$res = mysql_query($sql);
?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Klasse</th>
				<th>Text</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
while($row = mysql_fetch_assoc($res)) 
{
?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['class']; ?></td>
				<td><?php echo $row['value']; ?></td>
				<td>
					<div class="btn-group">
						<a href="index.php?view=edit_text&id=<?php echo $row['id']; ?>" class="btn btn-default"><em class="glyphicon glyphicon-pencil"></em> Bearbeiten</a>
						<a href="index.php?view=list_texts&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger"><em class="glyphicon glyphicon-minus"></em> Löschen</a>
					</div>
				</td>
			</tr>
<?php
}
?>
		</tbody>
	</table>


</div>