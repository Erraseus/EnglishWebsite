<?php if(!defined("IN_ADMIN")) die; ?>
<center><h1>Benutzerverwaltung</h1></center>
<form method="POST">
<div class="col-md-2 column">
	<div class="btn-group btn-group-vertical">
		 <button class="btn btn-default" name="save" value="1" type="submit"><em class="glyphicon glyphicon-floppy-save"></em> Speichern</button>
	</div>
</div>
<div class="col-md-10 column">
<?php
if(!empty($_REQUEST['id'])) {
	$id = $_REQUEST['id'];

	if(!empty($_POST['save'])) {
		// Speichern
		$sql = "UPDATE users SET
			`name`    = ".m($_POST['name']).",
			`password`    = MD5(".m($_POST['password']).")
			WHERE id=".intval($id);

		if(!mysql_query($sql)) die(mysql_error());
		?><div class="alert alert-success">Der Benutzer wurde erfolgreich aktualisiert.</div><?php
	}
} else {
	$id = 0;

	if(!empty($_POST['save'])) {
		$sql = "INSERT INTO users SET
			`name`    = ".m($_POST['name']).",
			`password`    = MD5(".m($_POST['password']).")";

		if(!mysql_query($sql)) die(mysql_error());
		$id = mysql_insert_id();
		?><div class="alert alert-success">Der Benutzer wurde erfolgreich angelegt.</div><?php
		?><input type="hidden" name="id" value="<?php echo $id; ?>"><?php
	}
}

$sql = "SELECT * FROM users WHERE id=".intval($id);
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
?>
	<div class="form-group">
		<label>Name</label>
		<input class="form-control" type="user" name="name" value="<?php echo $row['name']; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input class="form-control" type="user" name="password" value="">
	</div>
</div>
</form>