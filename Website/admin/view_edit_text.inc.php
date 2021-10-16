<?php if(!defined("IN_ADMIN")) die; ?>
<center><h1>Textbearbeitung</h1></center>
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
		$sql = "UPDATE texts SET
			`name`    = ".m($_POST['name']).",
			`value`    = ".m($_POST['text'])."
			WHERE id=".intval($id);

		if(!mysql_query($sql)) die(mysql_error());
		?><div class="alert alert-success">Der Text wurde erfolgreich aktualisiert.</div><?php
	}
} else {
	$id = 0;

	if(!empty($_POST['save'])) {
		$sql = "INSERT INTO texts SET
			`name`    = ".m($_POST['name']).",
			`value`    = ".m($_POST['text']);

		if(!mysql_query($sql)) die(mysql_error());
		$id = mysql_insert_id();
		?><div class="alert alert-success">Der Text wurde erfolgreich angelegt.</div><?php
		?><input type="hidden" name="id" value="<?php echo $id; ?>"><?php
	}
}

$sql = "SELECT * FROM texts WHERE id=".intval($id);
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
?>
	<div class="form-group">
		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
	</div>
	<div class="form-group">
		<label>Text</label>
		<textarea id="editor" class="form-control" name="text"><?php echo $row['value']; ?></textarea>
	</div>
</div>
</form>