<base href="<?php echo site_url()?>">
<link rel="stylesheet" href="assets/css/reg.css">
<script src="assets/js/jquery.min.js"></script>
<meta charset="utf-8">
<div id="div1">
<form action="<?php echo site_url('user/do_reg')?>" method="post">
    用户名：<input type="text" name="uname" id="n1"><br />
    密码：<input type="password" name="pass" id="p1"><br />
    重复密码：<input type="password" name="rpass" id="p2"><br />
    <input type="submit" value="注册" name="sub">
</form>
</div>
<script>
    $(function () {
        $('#p2').blur(function () {
            var pass=$('#p1').val();
            var rpass=$('#p2').val();
            if(pass != rpass){
                var oSpan=$('<span id="s1"></span>')
            }
        })
    });
</script>