<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>


<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $id = $_GET['p'];
    $modelname = $_POST['modelname'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $result = $_POST['result'];

    //地址
     $url = "localhost";
    //账号
     $user = "root";
    //密码
     $password = "root";
     //连接
     $con = mysql_connect($url,$user,$password);
     //设置编码机
     mysql_query("set names 'utf8'");
     //连接数据库
     mysql_select_db("test");

     $sql = "UPDATE `casemanager` SET `modelname`='$modelname',`title`='$title',`desc`='$desc',`result`='$result' WHERE id=$id";
     // mysql_query($sql);
     if (!mysql_query($sql,$con))
     {
       die('Error: ' . mysql_error());
     }
     // echo "修改一条记录";
     $url = "index.php?p=1";
     echo '<script>location.href="'.$url.'"</script>';
      //关闭连接
     mysql_close($con)

?>

</body>
</html>
