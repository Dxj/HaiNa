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
				alert("ִ�й����г�������,���������أ� "+xmlHttp.statusText);
			}
		}
	}
}

</script>

<?php 
include_once("system/system.inc.php");
//������������ 
$layer=1; //�������ٵ�ǰ�˵��ļ��� 

//��ȡһ���˵� 
$sql="select * from menu where why=0"; 
$result=$admindb->ExecSQL($sql,$conn);

//���һ���˵�������ʼ�˵�����ʾ 
if($result){
	ShowTreeMenu($admindb,$conn,$result,$layer,$ID); 
	} 


//============================================= 
//��ʾ���Ͳ˵����� ShowTreeMenu($con,$result,$layer) 
//$con�����ݿ����� 
//$result����Ҫ��ʾ�Ĳ˵���¼�� 
//layer����Ҫ��ʾ�Ĳ˵��ļ��� 
//?���������Ӷ�����βΣ�û��ȫ�ֱ���
//============================================= 
function ShowTreeMenu($adminDB,&$Con,$result,$layer) 
{ 
//ȡ����Ҫ��ʾ�Ĳ˵�����Ŀ��
if($result!=false) 
	$numrows=count($result); 
else
	$numrows=0;
//��ʼ��ʾ�˵���ÿ���Ӳ˵�����һ���������ʾ 
echo "<table cellpadding='0' cellspacing='0' border='0'>"; 

for($rows=0;$rows<$numrows;$rows++) 
{ 
//����ǰ�˵���Ŀ�����ݵ������� 
$menu=$result[$rows]; 

//��ȡ�˵���Ŀ���Ӳ˵���¼�� 
$sql="select * from menu where why=".$menu[id];
$result_sub=$adminDB->ExecSQL($sql,$Con); 

echo "<tr>"; 
//����ò˵���Ŀ���Ӳ˵��������JavaScript onClick��� 
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

//����ò˵���Ŀ���Ӳ˵�������ʾ�Ӳ˵� 
if($result_sub) 
{ 
//ָ�����Ӳ˵���ID��style���Ա��onClick������Ӧ 
echo "<tr id=Menu".$menu["id"]." style='display:none'>"; 
echo "<td width='20'> </td>"; 
echo "<td>"; 
//��������1 
$layer++; 
//�ݹ����ShowTreeMenu()�����������Ӳ˵� 
ShowTreeMenu($adminDB,$Con,$result_sub,$layer); 
//�Ӳ˵�������ɣ����ص��ݹ����һ�㣬��������1 
$layer--; 
echo "</td></tr>"; 
} 
//������ʾ��һ���˵���Ŀ 
} 
echo "</table>"; 
} 
?> 