<?php
    include "conn.php";
    if(isset($_POST['sub'])){
        $uname=$_POST['name'];
        $pass=$_POST['pass'];
        $arr=array('$','%','=');
        $flag=true;
        for($i=0; $i<strlen($uname); $i++){
            for($j=0; $j<count($arr); $j++){
                if($uname[$i]==$arr[$j]){
                    $flag=false;
                }
            }
        }
        if($flag==false) {
            echo"<script>alert('用户名含有非法字符')</script>";
        }else{
            $sql="select * from user where uname='$uname'";
            $query=mysqli_query($link,$sql);
            $rs=mysqli_fetch_array($query);
            if($rs){
                echo"<script>alert('该用户名已存在')</script>";
            }else{
                $sql="insert into user(uid,uname,pass) values(null,'$uname','$pass')";
                $query=mysqli_query($link,$sql);
                if($query){
                    header('location:login.php');
                }
            }
        }


    }

?>
<meta charset="UTF-8">
<form action="reg.php" method="post" id="from">
    用户名：<input type="text" name="name" id="name"><br />
    密码:<input type="password" name="pass" id="pass"><br />
    重复密码：<input type="password" name="rpass" id="rpass"><br />
    <input type="submit" value="注册" name="sub" id="sub">
</form>

<script>
    var oName = document.getElementById('name');
    var oPass = document.getElementById('pass');
    var oRpass = document.getElementById('rpass');
    var oFrom = document.getElementById('from');
    var oNext = oRpass.nextSibling;
    var oSub = document.getElementById('sub');
    oRpass.onblur = function () {
        if(oPass.value != oRpass.value){
            var oSpan = document.createElement('span');
            oSpan.innerHTML = "密码不一致";
            oFrom.insertBefore(oSpan,oNext);
            oSub.disabled = true;
        }else{
            oSub.disabled = false;
        }
    };

    if(oName.value && oPass.value && oRpass.value){
        oSub.disabled = false;
    }else {
        oSub.disabled = true;
    }

</script>
