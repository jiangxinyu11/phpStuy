<style>
    *{
        margin: 0;
        padding: 0;
    }
    a{
        text-decoration: none;
    }
    li{
        list-style: none;
    }
    #div1{
        /*width: 200px;*/
        width: 50%;
        position: absolute;
        top: 50px;
        left: 50px;
    }
    #div2{
        position: absolute;
        top: 50px;
        right: 300px;
    }
</style>
<a href="add.php">添加文章</a> &nbsp;&nbsp;&nbsp;&nbsp;
<?php
    if(isset($_COOKIE['id'])){
        $id=$_COOKIE['id'];
        $name=$_COOKIE['name'];
        echo "<a href='center.php'>".$name."</a>已登录"."&nbsp;";
        echo "<a href='logout.php?id=$id'>注销</a>&nbsp;&nbsp;&nbsp;";
    }else{
        echo "<a href='login.php'>登录</a>&nbsp;&nbsp;&nbsp;";
    }
?>
<form action="index.php" method="get">
    <input type="text" name="search">
    <input type="submit" name="sub" value="搜索">
    <div id="div1">
</form>

<?php
    include "conn.php";
    if(isset($_GET['id'])){
        $cid=$_GET['id'];
        $sql="select * from blog,user where blog.uid=user.uid and blog.cid=$cid order by blog.time desc";
    }else{
        if($e=$_GET['sub']){
            $e=$_GET['search'];
            if(strlen($e)){
                $w="title like '%$e%'";
            }else{
                $w=1;
            }

        }else{
            $w=1;
        }
        $sql="select * from blog,user where $w and blog.uid=user.uid order by blog.time desc";
    }
    $query=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_array($query)) {
?>
        <h3><?php echo $arr['title'] ?></h3>
        <li>时间：<?php echo $arr['time'] ?></li><span>作者：<?php echo $arr['uname']?></span>
        <a href="content.php">查看全文</a><hr />
<?php
}
?>
</div>

<div id="div2">
    <h3>分类：</h3><br />
    &nbsp;&nbsp;&nbsp;<a href="index.php">全部</a><br />
    <?php
        $sql="select * from catalog ";
        $query=mysqli_query($link,$sql);
        while ($arr=mysqli_fetch_array($query)) {
    ?>
            &nbsp;&nbsp;&nbsp;<a href="index.php?id=<?php echo $arr['cid']?>"><?php echo $arr['cname'] ?></a><br />
    <?php
        }
    ?>
</div>