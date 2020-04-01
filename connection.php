
	<?php 
	$mysqli = new mysqli('localhost','root','','Users');
	if(!$mysqli)
		die('Unsuccessfully Connected'.mysqli_error($mysqli));
	?>