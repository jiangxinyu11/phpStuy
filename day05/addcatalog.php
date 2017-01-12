<?php
include 'conn.php';
if(isset($_POST['sub'])){
    $cname=$_POST['cname'];
    $sql="select * from catalog where cname='$cname'";
    $query=mysqli_query($link,$sql);
    $result=mysqli_fetch_array($query);
//    var_dump($result);
//    die();
    if($result){
        echo "<script>alert('当前分类已存在')</script>";
        echo "<script>location='addcatalog.php'</script>";
    }else{
        $sql="insert into catalog(cid,cname) value(null,'$cname')";
        $query=mysqli_query($link,$sql);
        if($query){
            echo "<script>location='add.php'</script>";
        }
    }
}
?>
<meta charset="UTF-8">
<form action="addcatalog.php" method="post">
    分类名称：<input type="text" name="cname">
    <input type="submit" value="添加分类" name="sub">
</form>
