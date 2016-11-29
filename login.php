<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>登录页面</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
</head>
<style type="text/css">
	body { 
		background-image: url('img/login.png'); 
		background-repeat: no-repeat; 
		background-position: 0px -50px; 
	} 

	div{
		height: 300px;
		margin: 400px;
	}

	label{
		font-size: 18px;
		font-weight: bold;
	}
	h1.hone{
		/* background:#2f373a;*/
        font-family: KaiTi_GB2312;
        /*font-size:100%;*/
	}
</style>
<div class = "logincase" align="right">
<body>
<form action="loginto.php" method="post">
	<tr>
	<h1 class="hone" >用例管理系统</h1>
	<!-- <br> -->
	<td>
		<label>用户名：</label>
		<input type="text" name="username" id = "userid" /><br><br>
	</td>
	<td>
		<label>密码&nbsp&nbsp&nbsp：</label>
		<input type="password" name="password" id = "psw" /><br>
	</td>
	<br>
	<td>
		<input type="submit" value="登录" />&nbsp&nbsp&nbsp
	</td>
	</tr>
	<!-- <tr>
		<td><input type='button' onclick=\"window.location='reg.php'\" value='注册' /></td>
	</tr> -->
	<a href="reg.php"><input type="button" value="注册" /></a>
</form>

</body>
</div>
</html>