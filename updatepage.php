<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
</head>
<body>
<!-- <?php

    include "connection.php";
    $sql = "select * from user where id='".$_GET['id']."'";
     $result = mysql_query($sql,$con);
     if($row = mysql_fetch_array($result)){

        echo "<br>";
        echo "<div align =center>";
        echo "<table width='40%'' border='1' cellpadding='2' cellspacing='0' >";
        echo "<tr>
        <td>序号</td>
        <td>模块</td>
        <td>标题</td>
        <td>描述</td>
        <td>结果</td>
        </tr>";
        echo "<tr>
        <td><input type='text' name='id' value ='row'></td>
        <td><input type='text' name='modelname'></td>
        <td><input type='text' name='title'></td>
        <td><input type='text' name='desc'></td>
        <td><input type='text' name='result'></td>
        </tr>";
        echo "</table>";
        echo "<br>";
        echo "<form action = 'insert.php' method='get'>";
        echo "<input type = 'submit' value = '提交'> &nbsp&nbsp";
        echo "<input type='button' name='close' value='取消' onclick=\"window.close();\" />";
        echo "</form></div>";
    }


?> -->


<div align="center">
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
    include "connection.php";
    $sql = "SELECT * FROM  `casemanager`  WHERE  id='".$_GET['p']."'";
     $result = mysql_query($sql,$con);
     $row = mysql_fetch_array($result);
     if($row){
        ?>
    <form action="update.php?p=<?php echo $_GET['p'] ?>" method="post">
        <h3>修改用例</h3>
        <!-- 序号：<input type="text" name = "id" /><br> -->
        模块：<input type="text" name = "modelname" value="<?php echo $row['modelname'] ?>" /><br>
        标题：<input type="text" name = "title" value="<?php echo $row['title'] ?>" /><br>
        描述：<input type="text" name = "desc" value="<?php echo $row['desc'] ?>" /><br>
        结果：<input type="text" name = "result" value="<?php echo $row['result'] ?>" /><br>
        <br>
        <input type="submit" value="提交"> &nbsp
        <input type="button" onclick="window.close();" value="取消">
<?php } ?>
    </form>
    </div>
</body>
</html>
