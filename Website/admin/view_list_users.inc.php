<?php if(!defined("IN_ADMIN")) die; ?>

<?php
$result = mysql_query("select count(1) FROM users");
$row = mysql_fetch_array($result);
if(intval($row[0]) < 52){
?>
<center><h1>Benutzer</h1></center>
<div class="col-md-2 column">
	<div class="btn-group btn-group-vertical">
		 <a class="btn btn-default" href="index.php?view=edit_user"><em class="glyphicon glyphicon-plus"></em>Neuer Benutzer</a>
	</div>
</div>
<?php
}
?>
<div class="col-md-10 column">
<?php
$sql = "SELECT * FROM users ORDER BY id;";
$res = mysql_query($sql);
?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Benutzer</th>
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
				<td>
					<div class="btn-group">
						<a href="index.php?view=edit_user&id=<?php echo $row['id']; ?>" class="btn btn-default"><em class="glyphicon glyphicon-pencil"></em> Bearbeiten</a>
					</div>
				</td>
			</tr>
<?php
}
?>
		</tbody>
	</table>


</div>