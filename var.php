<?php 
include_once("system/system.inc.php");

$sql="select * from instruction where id=".$_SESSION["menuId"]; 
$rows=$admindb->ExecSQL($sql,$conn);
foreach ($rows as $row)
{
	echo   $row[what]."<br/>";
	echo   '<img src="$row[how]"/>'."<br/>";
	echo   '<input name="" style="float:right;" type="button" value="¶¥"/><br />';
	echo   "<hr/>";
}
?> 