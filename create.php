<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
</head>
<body>
<!-- <?php

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
    <td><input type='text' name='id'></td>
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


?> -->

<div align="center">
<form action="insert.php" method="post">
    <h3>添加用例</h3>
    <!-- 序号：<input type="text" name = "id" /><br> -->
    模块：<input type="text" name = "modelname" /><br>
    标题：<input type="text" name = "title" /><br>
    描述：<input type="text" name = "desc" /><br>
    结果：<input type="text" name = "result" /><br>
    <br>
    <input type="submit" value="提交"> &nbsp;
    
    <?php 
        echo "<input type='button' onclick=\"CheckUserName()\" value='取消' />"; 

    ?>

</body>
<script type="text/javascript">
    function CheckUserName( )
    { 
        // alert(1111)
        // window.close();
        // open(location, '_self').close();
        window.open('http://localhost:81/casemanager/index.php?p=1', '_self', '');
        window.close();

    }
</script>
</html>
