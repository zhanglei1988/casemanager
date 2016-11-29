<?php
	// $a = 1;
	session_start();
	if(!isset($_SESSION['id'])){
		$url = "login.php";
		echo '<script>alert("请先登录！");location.href="'.$url.'"</script>';
		exit;
	}
?>