<html>
<head>
    <meta  http-equiv="Content-type" content="text/html;charset=utf-8">
</head>

<body>
<style type="text/css">
    body{
        font-size: 12ox;font-family: verdana;width: 100%;
    }
    div.page{
        text-align: center;
    }
    div.content{
        height: 300px;
    }
    div.page a{
        border: #aaaadd 1px solid;text-decoration: none;padding: 2px 5px 2px 5px;margin: 2px;
    }
    div.page span.current{
        border: #000099 1px solid;background-color: #000099;padding: 4px 6px 4px 5px;margin: 2px;color: fff;font-weight: bolder;
    }
    div.page span.disable{
        border: #eee 1px solid;padding: 2px 5px 2px 5px;margin: 2px;color: #ddd;
    }
    div.page form{
        display: inline;
    }

    div.indexpage span.title{
        font-size: 12ox;font-family: verdana;
    }
</style>

<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    // session_start();
// if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // echo "登录成功：".$_SESSION['username'];
    //1传入页码
    include "interception.php";
    $page = $_GET['p'];

    //2根据页码取出数据，php->mysql处理
    $host = "localhost";
    $usename = "root";
    $passwd = "root";
    $db = "test";
    $showPage = 5;
    //操作mysql
    $conn = mysql_connect($host,$usename,$passwd);
    if(!$conn){
        echo "数据库连接失败";
        exit;
    }

    mysql_select_db($db);

    //设置数据库编码格式
    mysql_query("SET NAMES UTF8");
    $sql = "SELECT * FROM casemanager LIMIT ". ($page-1)*10 .", 10";
    //传给数据库
    $result = mysql_query($sql);
    echo "<div class = 'content' align = 'center'>";
    //处理数据
    echo "<br>";
    echo "<table border = 1 cellspacing = 0 width = 40% align =center>";
    echo "<span class = 'title' >测试用例管理      </span>";
    echo "<input type='button' onclick=\"window.location='create.php'\" value=' 创建用例' />";
    echo "<br><br>";
    echo "<tr>
        <td>序号</td>
        <td>模块</td>
        <td>标题</td>
        <td>描述</td>
        <td>结果</td>
        <td>修改</td>
        <td>删除</td></tr>";
    while($row = mysql_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['modelname']}</td>";
        echo "<td>{$row['title']}</td>";
        echo "<td>{$row['desc']}</td>";
        echo "<td>{$row['result']}</td>";
        // echo "<td><input type='button' onclick=\"window.location='create.php'\" value='创建' /></td>";
        echo "<td><input type='button' onclick=\"window.location='updatepage.php?p=$row[id]'\" value='修改' /></td>";
        echo "<td><input type='button' onclick=\"window.location='delete.php?p=$row[id]'\" value='删除' /></td>";
        echo "</tr>";

    }
    echo "</table>";
    echo "</div>";
    echo "<br>";
    //释放结果，关闭链接
    mysql_free_result($result);
    $total_sql = "SELECT COUNT(*) FROM casemanager";
    $total_result = mysql_fetch_array(mysql_query($total_sql));
    $total = $total_result[0];
    // echo "总条数".$total;
    $total_pages = ceil($total/10);
    mysql_close($conn);
    //3显示数据
    $page_banner = "<div class='page'>";
    //计算偏移量
    $pageoffset = ($showPage - 1)/2;

    if($page >1){
        $page_banner .= "<a href = '" .$_SERVER['PHP_SELF']. "?p=1'>首页</a>";
        $page_banner .= "<a href='" .$_SERVER['PHP_SELF']. "?p=" .($page-1). "'><上一页</a>";
    }else{
        $page_banner .="<span class = 'disable'>首页</span>";
        $page_banner .="<span class = 'disable'><上一页</span>";
    }
    //初始化数据
    $start = 1;
    $end = $total_pages;
    if($total_pages > $showPage){
        if($page > $pageoffset+1){
            $page_banner .="...";
        }
        if($page > $pageoffset){
            $start = $page - $pageoffset;
            $end = $total_pages > $page+$pageoffset?$page+$pageoffset:$total_pages;
        }else{
            $start = 1;
            $end = $total_pages > $showPage ? $showPage:$total_pages;
        }
        if($page + $pageoffset > $total_pages){
            $start = $start - ($page+$pageoffset-$end);
        }
    }

    for($i = $start;$i<=$end;$i++){
        if($page == $i){
            $page_banner .= "<span class='current'>{$i}</span>";
        }else{
            $page_banner .= "<a href='" .$_SERVER['PHP_SELF']. "?p=" .$i. "'>{$i}</a>";
        }
    }

    if($total_pages > $showPage && $total_pages > $page+$pageoffset){
        $page_banner .= "...";
    }

    if($page < $total_pages){
        $page_banner .= "<a href='" .$_SERVER['PHP_SELF']. "?p=" .($page+1). "'>下一页></a>";
        $page_banner .= "<a href='" .$_SERVER['PHP_SELF']. "?p=" .($total_pages). "'>尾页</a>";
    }else{
        $page_banner .="<span class = 'disable'>下一页></span>";
        $page_banner .="<span class = 'disable'>尾页</span>";
    }

    $page_banner .= "共{$total_pages}页,";
    $page_banner .= "<form action = 'index.php' method='get'>";
    $page_banner .= "到第<input id = 'pageid' type = 'text' size = '2' name ='p' value = '1' onblur = \"CheckUserName('pageid')\" >页";
    $page_banner .="<input type ='submit' value='确定'>";
    $page_banner .= "</form></div>";
    echo $page_banner;
// }else{
//     echo "你还没有登录，<a href='login.php'>请登录</a>";
// }


?>
</body>

<script type="text/javascript">
    function CheckUserName(str)
    { 
        var strReg=""; 
        var r; 
        var strText= document.getElementById(str).value;
        if(strText=="" || strText==null)
        {
            alert("输入框不能为空");
            return;
        }
    }
</script>
</html>
