<?php
if(!isset($_COOKIE['id'])){
    $str=$_SERVER['REQUEST_URI'];
    $arr=array(explode('/',$str));
    $num=count($arr)-1;
    $uri=$arr[$num];
    header("location:login.php?uri=$uri");

}

?>

<?php
include"conn.php";
//添加文章
if(isset($_POST["sub"])){
    $title=$_POST["title"];
    $cid=$_POST["catalog"];
    $con=$_POST["con"];
    if($title&&$con){
        $sql="insert into blog(wid,title,content,time,cid) values(null,'$title','$con',now(),'$cid')";
        $query=mysqli_query($link,$sql);
        if($query){
            header('location:index.php');
        }else{
            header('location:add.php');
        }
    }else{
        echo "<script>alert('输入有误')</script>";
    }

}



?>

<meta charset="UTF-8">
<form action="add.php" method="post">
    标题：<input type="text" name="title">
    <select name="catalog">
        <?php
            $sql="select * from catalog ";
            $query=mysqli_query($link,$sql);
            while ($arr=mysqli_fetch_array($query)){
        ?>
                <option value="<?php echo $arr['cid']?>"><?php echo $arr['cname']?></option>
        <?php } ?>
    </select> <br />
    内容：<textarea cols="20" rows="10" name="con"></textarea> <br />
    <input type="submit" name="sub" value="提交">
</form>