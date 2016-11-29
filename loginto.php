<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'connection.php';
	session_start();
	$un = $_POST['username'];
	$psd = $_POST['password'];

	$sql = "SELECT * FROM `user` WHERE username='$un'";

	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($row){
		if($row[2] === $psd){
			$_SESSION['id']=$row['id'];
	        $_SESSION['username']=$row['username'];
			$url = "index.php?p=1";
     		echo '<script>location.href="'.$url.'"</script>';
		}else{
			$url = "login.php";
			echo '<script>alert("密码错误")</script>';
     		echo '<script>location.href="'.$url.'"</script>';
		}	
	}else{
		$url = "login.php";
	    echo '<script>alert("用户名不存在");window.location.href="'.$url.'"</script>';
	}

	mysql_close($con);
?>