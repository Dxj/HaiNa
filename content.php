<?php
header('Content-Type:text/html;charset=GB2312');
include_once("system/system.inc.php");

//submenuBar
echo "<div id='submenuBar'>";
$sql="SELECT * FROM MENU WHERE ID=".$_GET["menuId"];
$rows=$admindb->ExecSQL($sql,$conn);
switch($rows[0]["类别"])
{		
	case "函数":
	case "类函数":
		//param0-return-submenuBar
		$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"]." AND 次序=0";
		$rows=$admindb->ExecSQL($sql,$conn);
		echo '<input name="para0" type="button" onclick="contentByMenu('.$_GET["menuId"].',0)" value="'.$rows[0]["数据类型"].'"/>';
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
			$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"]." AND 次序=".$order;
			$rows=$admindb->ExecSQL($sql,$conn);
			echo '<input name="para'.$order.'" type="button" onclick="contentByMenu('.$_GET["menuId"].','.$order.')" value="'.$rows[0]["数据类型"]." ".$rows[0]["parameter"].'"/>';
			if($order!=$params_num)
			{
				echo ',';
			}
		}
		echo ')';
		break;
	case "目录":
	case "变量":
	case "类变量":
		echo '<input name="para1" type="button" onclick="contentByMenu('.$_GET["menuId"].',1)" value="'.$rows[0]["who"].'"/>';
		break;
	case "宏":
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
				$sql="SELECT * FROM PARAMETERS WHERE MENU_ID=".$_GET["menuId"]." AND 次序=".$order;
				$rows=$admindb->ExecSQL($sql,$conn);
				echo '<input name="para'.$order.'" type="button" onclick="contentByMenu('.$_GET["menuId"].','.$order.')" value="'.$rows[0]["数据类型"]." ".$rows[0]["parameter"].'"/>';
				if($order!=$params_num+1)
				{
					echo ',';
				}
			}
			echo ')';
		}
		break;
	default:
		echo '此类型无记录!';
}

echo "</div>";
//条目
$sql="SELECT * FROM INSTRUCTION WHERE MENU_ID=".$_GET["menuId"]." AND 次序=".$_GET["order"]." ORDER BY INSTRUCTION.赞 DESC";
$rows=$admindb->ExecSQL($sql,$conn);
if($rows)
{
	foreach ($rows as $row)
	{
		echo   $row[what]."<br/>";
		echo   "<img src=\"".$row[how]."\"/>"."<br/>";
		echo   '<input name="" style="float:right;" type="button" value="顶"/><br />';
		echo   "<hr/>";
	}
}

?> 