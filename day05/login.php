<?php
    include "conn.php";
    if(isset($_GET['uri'])){
        $uri=$_GET['uri'];
    }else{
        $uri="index.php";
    }
    if(isset($_POST['sub'])){
        $uname=$_POST['name'];
        $pass=$_POST['pass'];
        $uri=$_POST['uri'];
        $sql="select * from user where uname='$uname' and pass='$pass'";
        $query=mysqli_query($link,$sql);
        $arr=mysqli_fetch_array($query);
        if($arr){
            setcookie('id',$arr['uid']);
            setcookie('name',$arr['uname']);
            echo"<script>location='$uri'</script>";
        }else{
            echo "<script>alert('输入有误')</script>";
            echo "<script>location='login.php'</script>";
        }
    }
    if(isset($_POST['reg'])){
        header("location:reg.php");
    }


?>

<meta charset="UTF-8">
<form action="login.php" method="post">
    <input type="hidden" name="uri" value="<?php echo $uri?>">
    用户名：<input type="text" name="name">
    密码:<input type="password" name="pass">
    <input type="submit" value="登录" name="sub">&nbsp;
    <input type="submit" value="注册" name="reg">
</form>

