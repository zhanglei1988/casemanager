<?php
session_start();
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    echo "登录成功：".$_SESSION['username'];
}else{
    echo "你还没有登录，<a href='login.php'>请登录</a>";
}
?>