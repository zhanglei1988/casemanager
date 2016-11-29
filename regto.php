<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'connection.php';
	$un = $_POST['username'];
	$psd = $_POST['password'];

	$sql = "INSERT INTO `user`(`username`, `password`) VALUES ('$un','$psd')";

	$result = mysql_query($sql);
	$mark  = mysql_affected_rows();
	if($mark>0){
		$url = "login.php";
 		echo '<script>alert("注册成功");location.href="'.$url.'"</script>';
	}else{
		$url = "reg.php";
     echo '<script>alert("注册失败");location.href="'.$url.'"</script>';
	}
	mysql_close($con)

	?>
