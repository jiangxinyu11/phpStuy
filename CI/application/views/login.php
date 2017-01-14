<base href="<?php echo site_url()?>">
<link rel="stylesheet" href="">
<meta charset="utf-8">
<div id="div1">
    <form action="<?php echo site_url('user/do_reg')?>" method="post">
        用户名：<input type="text" name="uname" id="n1"><br />
        密码：<input type="password" name="pass" id="p1"><br />
        重复密码：<input type="password" name="rpass" id="p2"><br />
        <input type="submit" value="注册" name="sub">
    </form>
</div>