<?php
header('Content-Type:text/html;charset=GB2312');
include_once("system/system.inc.php");

//submenuBar
echo "<div id='submenuBar'>";
$sql="SELECT * FROM MENU WHERE ID=".$_GET["menuId"];
$rows=$admindb->ExecSQL($sql,$conn);
switch($rows[0]["���"])
{		
	case "����":
	case "�ຯ��":
		//param0-return-submenuBar
		$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"]." AND ����=0";
		$rows=$admindb->ExecSQL($sql,$conn);
		echo '<input name="para0" type="button" onclick="contentByMenu('.$_GET["menuId"].',0)" value="'.$rows[0]["��������"].'"/>';
		//param1-function-menu
		$sql="SELECT * FROM MENU WHERE ID=".$_GET["menuId"];
		$rows=$admindb->ExecSQL($sql,$conn);
		echo '<input name="para1" type="button" onclick="contentByMenu('.$_GET["menuId"].',1)" value="'.$rows[0]["who"].'"/>';
		echo '(';
		//param*-parameter-submenuBar
		$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"];
		$rows=$admindb->ExecSQL($sql,$conn);
		$params_num=count($rows);
		for ($order=2;$order<=$params_num;$order++)
		{
			$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"]." AND ����=".$order;
			$rows=$admindb->ExecSQL($sql,$conn);
			echo '<input name="para'.$order.'" type="button" onclick="contentByMenu('.$_GET["menuId"].','.$order.')" value="'.$rows[0]["��������"]." ".$rows[0]["parameter"].'"/>';
			if($order!=$params_num)
			{
				echo ',';
			}
		}
		echo ')';
		break;
	case "Ŀ¼":
	case "����":
	case "�����":
		echo '<input name="para1" type="button" onclick="contentByMenu('.$_GET["menuId"].',1)" value="'.$rows[0]["who"].'"/>';
		break;
	case "��":
		echo '<input name="para1" type="button" onclick="contentByMenu('.$_GET["menuId"].',1)" value="'.$rows[0]["who"].'"/>';

		//param*-parameter-submenuBar
		$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"];
		$rows=$admindb->ExecSQL($sql,$conn);
		if($rows)
			$params_num=count($rows);
		else
			$params_num=0;

		if($params_num!=0)
		{
			echo '(';		
			for ($order=2;$order<=$params_num+1;$order++)
			{
				$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"]." AND ����=".$order;
				$rows=$admindb->ExecSQL($sql,$conn);
				echo '<input name="para'.$order.'" type="button" onclick="contentByMenu('.$_GET["menuId"].','.$order.')" value="'.$rows[0]["��������"]." ".$rows[0]["parameter"].'"/>';
				if($order!=$params_num+1)
				{
					echo ',';
				}
			}
			echo ')';
		}
		break;
	default:
		echo '�������޼�¼!';
}

echo "</div>";
//��Ŀ
$sql="SELECT * FROM INSTRUCTION WHERE MENU_ID=".$_GET["menuId"]." AND ����=".$_GET["order"]." ORDER BY INSTRUCTION.�� DESC";
$rows=$admindb->ExecSQL($sql,$conn);
if($rows)
{
	foreach ($rows as $row)
	{
		echo   $row[what]."<br/>";
		echo   "<img src=\"".$row[how]."\"/>"."<br/>";
		echo   '<input name="" style="float:right;" type="button" value="��"/><br />';
		echo   "<hr/>";
	}
}

?> 