<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script>
function ShowMenu(MenuID) { 
	if(MenuID.style.display=="none") { 
		MenuID.style.display=""; 
	}else{ 
		MenuID.style.display="none"; 
	} 
}
</script>
<script language="javascript">
function contentByMenu(menuId,order){
    if(window.ActiveXObject)
    {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest)
    {
        xmlHttp=new XMLHttpRequest();
    }

	xmlHttp.open("GET","content.php?menuId="+menuId+"&order="+order,true);
	xmlHttp.onreadystatechange=handle_f;
	xmlHttp.send(null);

	function handle_f()
	{
		if(xmlHttp.readyState==4)
		{
			if(xmlHttp.status==200)
			{
				document.getElementsByClassName("content")[0].innerHTML=xmlHttp.responseText;
			}
			else
			{
				alert("执行过程中出现问题,服务器返回： "+xmlHttp.statusText);
			}
		}
	}
}

</script>

<?php 
include_once("system/system.inc.php");
//基本变量设置 
$layer=1; //用来跟踪当前菜单的级数 

//提取一级菜单 
$sql="select * from menu where why=0"; 
$result=$admindb->ExecSQL($sql,$conn);

//如果一级菜单存在则开始菜单的显示 
if($result){
	ShowTreeMenu($admindb,$conn,$result,$layer,$ID); 
	} 


//============================================= 
//显示树型菜单函数 ShowTreeMenu($con,$result,$layer) 
//$con：数据库连接 
//$result：需要显示的菜单记录集 
//layer：需要显示的菜单的级数 
//?不能在最后加对象的形参，没有全局变量
//============================================= 
function ShowTreeMenu($adminDB,&$Con,$result,$layer) 
{ 
//取得需要显示的菜单的项目数
if($result!=false) 
	$numrows=count($result); 
else
	$numrows=0;
//开始显示菜单，每个子菜单都用一个表格来表示 
echo "<table cellpadding='0' cellspacing='0' border='0'>"; 

for($rows=0;$rows<$numrows;$rows++) 
{ 
//将当前菜单项目的内容导入数组 
$menu=$result[$rows]; 

//提取菜单项目的子菜单记录集 
$sql="select * from menu where why=".$menu[id];
$result_sub=$adminDB->ExecSQL($sql,$Con); 

echo "<tr>"; 
//如果该菜单项目有子菜单，则添加JavaScript onClick语句 
if($result_sub) 
{ 
echo "<td class='Menu' onClick='javascript:ShowMenu(Menu".$menu["id"].");'><img src='folder.gif' border='0'></td>"; 
echo "<td>"; 
} 
else 
{ 
echo "<td class='Menu'><img src='file.gif' border='0'></td>"; 
echo "<td>"; 
} 
echo "<a onclick='contentByMenu(".$menu["id"].",1);'>".$menu[who]."</a>"; 
echo " 
</td> 
</tr> 
"; 

//如果该菜单项目有子菜单，则显示子菜单 
if($result_sub) 
{ 
//指定该子菜单的ID和style，以便和onClick语句相对应 
echo "<tr id=Menu".$menu["id"]." style='display:none'>"; 
echo "<td width='20'> </td>"; 
echo "<td>"; 
//将级数加1 
$layer++; 
//递归调用ShowTreeMenu()函数，生成子菜单 
ShowTreeMenu($adminDB,$Con,$result_sub,$layer); 
//子菜单处理完成，返回到递归的上一层，将级数减1 
$layer--; 
echo "</td></tr>"; 
} 
//继续显示下一个菜单项目 
} 
echo "</table>"; 
} 
?> 