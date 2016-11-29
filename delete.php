<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$id = $_GET['p'];

// echo "$id";

include 'connection.php';

$sql = "delete from casemanager where id='".$id."'";

mysql_query($sql,$con);

$mark  = mysql_affected_rows();//返回影响行数

if($mark>0){
	$url = "index.php?p=1";
     echo '<script>location.href="'.$url.'"</script>';
}else{
	echo  "删除失败";
}

mysql_close($con);
?>