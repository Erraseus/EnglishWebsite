<div class="container">
<?php

if(!empty($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	
	$sql = "SELECT * FROM texts WHERE id=".intval($id);
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	$text = $row['value'];
	
	
?>


	</div class="row col col-12">
		<center><h1><?php echo $row['name']; ?></h1></center>
		<textarea class="original" id="originalText" readonly><?php echo $text; ?></textarea>
	</div>
	

	
	</div class="row col col-12">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<textarea id="neuerTextIn" id="no-copy-paste" autofocus placeholder="Bitte hier eingeben" ></textarea>
	</div>


<?php
}else{
header("Location: index.php?view=list_uebungen");
}
?>
</div>
<script type="text/javascript" src="check.js"></script>