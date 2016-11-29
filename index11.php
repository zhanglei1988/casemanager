<style type="text/css">
	div.indexpage span.title{
		font-size: 12ox;font-family: verdana;
	}
</style>

<?php 

	
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
    $usename = "root";
    $passwd = "root";
    $db = "test";
    //操作mysql
    $conn = mysql_connect($host,$usename,$passwd);
    if(!$conn){
        echo "数据库连接失败";
        exit;
    }

    mysql_select_db($db);
    //设置数据库编码格式
    mysql_query("SET NAMES UTF8");
    $sql = "SELECT * FROM casemanager";
    //传给数据库
    $result = mysql_query($sql);
    // $row = mysql_fetch_assoc($result);
    echo "<div class = 'indexpage' align= 'center' >";
    echo "<br>";
    echo "<table border = 1 cellspacing = 0 width = 40% align =center>";
    echo "<span class = 'title'>测试用例管理</span><br><br>";
    echo "<tr><td>序号</td>
		<td>模块</td>
		<td>标题</td>
		<td>描述</td>
		<td>结果</td>
		<td>创建</td></tr>";
    while($row = mysql_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['modelname']}</td>";
        echo "<td>{$row['title']}</td>";
        echo "<td>{$row['desc']}</td>";
        echo "<td>{$row['result']}</td>";
        echo "<td><input type='button' onclick=\"window.location='create.php'\" value='创建' /></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "<br>";
    //释放结果，关闭链接
    mysql_free_result($result);
    mysql_close($conn);

    echo "<br>";

    echo "</div>";

	// echo "<input type='button' onclick=\"window.location='create.php'\" value='创建' />";

?>