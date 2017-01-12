<?php
//获取当前php的url地址
//    var_dump($_SERVER);
    $url = $_SERVER['REQUEST_URI'];
    $arr = explode('/',$url);
    $num = count($arr)-1;
    $uri = $arr[$num];
//    echo $uri;
    echo"<script>location='002.php?str=$uri'</script>";
?>