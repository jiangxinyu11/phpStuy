<style>
	table{
		border:1px solid #050;
	}
	.fontb{
		color:white;
		background:blue;
	}
	th{
		width:30px;
	}
	th,td{
		height:30px;
		text-align:center;
	}
</style>

<?php
	include "rili1.php";
	
	$rili=new Rili();
	$rili->out();

?>