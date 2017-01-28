<?php 
	if(isset($_POST['sub'])){
		$ss=$_FILES['sfile'];
		
		echo "<pre>";
		var_dump($ss);
		echo "</pre>";
	}


?>

<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="sfile[]"><br />
	<!-- <input type="file" name="sfile[]"><br /> -->
	<input type="submit" name="sub" value="ss">
</form>