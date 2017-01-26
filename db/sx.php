<?php
	include "conn.php";
	if(isset($_GET['rid'])){
		$rid=$_GET['rid'];
		
	}
	if(isset($_POST['sub'])){
		$rid=$_POST['rid'];
		$sid=$_COOKIE['id'];
		$con=$_POST['sx'];
		
		$sql="insert into sx(xid,scon,stime,sid,rid) values(null,'$con',now(),'$sid','$rid')";
		$query=mysqli_query($link,$sql);
		if($query){
			echo 123;
		}else{
			echo 234;
		}
	}

?>

<meta charset="utf-8">
<form action="sx.php" method="post">
	<input type="hidden" name="rid" value="<?php echo $rid?>">
	<input type="text" name="sx"><br />
	<input type="submit" name="sub" value="发送">
</form>