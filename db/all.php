<?php
	include "conn.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="update blog set hits=hits+1 where wid='$id'";
		$query=mysqli_query($link,$sql);
		if($query){
			$sql="select * from blog,user where user.uid=blog.uid and blog.wid='$id'";
			$query=mysqli_query($link,$sql);
			$rs=mysqli_fetch_array($query);
		}
	}

?>
<h2><?php echo $rs['uname']?>的blog</h2>&nbsp;<a href="sx.php?rid=<?php echo $rs['uid']?>">发送私信</a><br />
<h3>标题:<?php echo $rs['title']?></h3>
<span>访问量:<?php echo $rs['hits']?></span><br />
<p>内容:<?php echo $rs['content']?></p>
<hr /><br />
<form action="all.php?id=<?php echo $rs['wid']?>" method="post">
	<textarea cols=10 rows=5 name="plcon"></textarea><br />
	<input type="submit" name="sub" value="评论">
</form>

<?php 
	if(isset($_POST['sub'])){
		$pcon=$_POST['plcon'];
		$wid=$_GET['id'];
		$uid=$_COOKIE['id'];
		
		$sql="insert into pl(pid,pcon,ptime,wid,uid) values(null,'$pcon',now(),'$wid','$uid')";
		$query=mysqli_query($link,$sql);
		if($query){
			header("location:all.php?id=$wid");
		}
	}
?>
<?php
	
	$sql="select * from pl,user where user.uid=pl.uid and wid='$id'";
	$query=mysqli_query($link,$sql);
	while($rs=mysqli_fetch_array($query)){
?>
<p>评论内容:<?php echo $rs['pcon']?></p>
<span>评论人:<?php echo $rs['uname']?></span>
<?php
	}
?>







