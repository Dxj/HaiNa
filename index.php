<?php
session_start();
if(isset($_GET['menuId']))
$_SESSION['menuId']=$_GET['menuId'];
else
$_SESSION['menuId']=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����ͼ˵</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #4E5869;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Ԫ��/��ǩѡ���� ~~ */
ul, ol, dl { /* ���������֮��Ĳ��죬������������б��н����ͱ߾඼����Ϊ�㡣Ϊ�˱���һ�£��������ڴ˴�ָ����Ҫ����ֵ��Ҳ�������б����������б��LI��DT �� DD����ָ����Ҫ����ֵ����ע�⣬���Ǳ�дһ����Ϊ�����ѡ�������������ڴ˴����е����ý������� .nav �б� */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* ɾ���ϱ߾���Խ���߾�ᳬ��������� div �����⡣ʣ����±߾����ʹ div �������κ�Ԫ�ر���һ�����롣 */
	padding-right: 15px;
	padding-left: 15px; /* �� div �ڵ�Ԫ�ز�ߣ������� div ����������ɱ���ʹ���κη���ģ����ѧ�����⣬Ҳ�ɽ����в������Ƕ�� div ������������� */
}
a img { /* ��ѡ������ɾ��ĳЩ���������ʾ��ͼ����Χ��Ĭ����ɫ�߿򣨵���ͼ�������������ʱ�� */
	border: none;
}

/* ~~ վ�����ӵ���ʽ���뱣�ִ�˳�򣬰������ڴ�����ͣЧ����ѡ���������ڡ� ~~ */
a:link {
	color:#414958;
	text-decoration: underline; /* ���ǽ��������óɼ�Ϊ���ص������ʽ����������ṩ�»��ߣ��Ա�ɴ��Ӿ��Ͽ���ʶ�� */
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* ����ѡ������Ϊ���̵������ṩ�����ʹ������ͬ����ͣ���顣 */
	text-decoration: none;
}

/* ~~ ������������������ div�������ٷֱ��趨���� ~~ */
.container {
	width: 90%;
	max-width: 1260px;/* ������Ҫ����ȣ��Է�ֹ�˲����ڴ�����ʾ���Ϲ����⽫ʹ�г��ȸ������Ķ���IE6 ����ѭ�������� */
	min-width: 780px;/* ������Ҫ��С��ȣ��Է�ֹ�˲��ֹ�խ���⽫ʹ�������е��г��ȸ������Ķ���IE6 ����ѭ�������� */
	background-color: #FFF;
	margin: 0 auto; /* ��ߵ��Զ�ֵ���Ƚ��ʹ�ã����Խ����־��ж��롣����� .container �������Ϊ 100%������Ҫ�����á� */
}

/* ~~ ����δָ����ȡ�������չ�����ֵ�������ȡ��������һ��ͼ��ռλ������ռλ��Ӧ�滻Ϊ���Լ������ӻձ� ~~ */
.header {
	background-color: #6F7D94;
	height:90px;
}
.logo {
	width:20%;
	float:left;
}
/* ~~ �����Ǵ˲��ֵ��С� ~~ 

1) ���ֻ������� div �Ķ�����/��ײ����� div �е�Ԫ�ز�߻�����䡣�����������Ա���ʹ���κΡ�����ģ����ѧ������ע�⣬����� div ��������κβ������߿���Щ�������߿���������Ŀ����ӣ��ó� *�ܼ�* ��ȡ���Ҳ����ѡ��ɾ�� div �е�Ԫ�ص���䣬���ڸ�Ԫ�����������һ��û���κο�ȵ���������������� div��

2) ������Щ�о�Ϊ�����У����δ����ָ���߾ࡣ���������ӱ߾࣬������ڸ�������һ����ñ߾ࣨ���磺div �е��ұ߾�����Ϊ���Ҹ��������ںܶ�����£������Ը�����䡣���ڱ�����ƴ˹���� div��Ӧ��� div �Ĺ�������ӡ�display:inline���������Կ���ĳЩ�汾�� Internet Explorer ��ʹ�߾෭���Ĵ���

3) ���ڿ�����һ���ĵ��ж��ʹ���ࣨ����һ��Ԫ�ؿ���Ӧ�ö���ࣩ�����������Щ�з��������������� ID�����磬��Ҫʱ�ɶѵ��������� div�������Ը��ݸ���ƫ�ý���Щ�������ɵظ�Ϊ ID��ǰ���ǽ���ÿ���ĵ�ʹ��һ�Ρ�

4) �������ϲ�����Ҳࣨ��������ࣩ���е�����ֻ��ʹ��Щ�����෴���򸡶���ȫ�����ң�����ȫ�����󣩣����ǽ����෴˳����ʾ���������� HTML Դ�ļ����ƶ� div��

*/
.sidebar1 {
	float: left;
	width: 20%;
	background-color: #93A5C4;
	padding-bottom: 10px;
}
.content {
	padding: 10px 0;
	width: 60%;
	float: left;
}
.content img {
	max-width:100%;
}
.sidebar2 {
	float: left;
	width: 20%;
	background-color: #93A5C4;
	padding: 10px 0;
}

/* ~~ �˷����ѡ����Ϊ .content �����е��б��ṩ�˿ռ� ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* ����䷴ӳ��������Ͷ�������е�����䡣���������·������ڼ���б�������Ԫ�أ������������ڴ��������������Ը�����Ҫ���е����� */
}

/* ~~ �����б���ʽ�����ѡ��ʹ��Ԥ�ȴ����� Spry �ȵ����˵��������ɾ������ʽ�� ~~ */
ul.nav {
	list-style: none; /* �⽫ɾ���б��� */
	border-top: 1px solid #666; /* �⽫Ϊ���Ӵ����ϱ߿� �C ʹ���±߿���������������� LI �� */
	margin-bottom: 15px; /* �⽫���������ݵĵ���֮�䴴����� */
}
ul.nav li {
	border-bottom: 1px solid #666; /* �⽫������ť��� */
}
ul.nav a, ul.nav a:visited { /* ����Щѡ�������з����ȷ�����Ӽ�ʹ�ڷ���֮��Ҳ�ܱ����䰴ť��� */
	padding: 5px 5px 5px 15px;
	display: block; /* �⽫Ϊ���Ӹ�������ԣ�ʹ������������������ LI���������������򶼿�����Ӧ��굥�������� */
	text-decoration: none;
	background-color: #8090AB;
	color: #000;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* �⽫�������ͼ��̵����ı������ı���ɫ */
	background-color: #6F7D94;
	color: #FFF;
}

/* ~~ ��ע ~~ */
.footer {
	padding: 10px 0;
	background-color: #6F7D94;
	position: relative;/* �����ʹ IE6 hasLayout ����ȷ��ʽ������� */
	clear: both; /* ���������ǿ�� .container �˽��еĽ���λ���Լ������е�λ�� */
}

/* ~~ ��������/����� ~~ */
.fltrt {  /* �����������ҳ����ʹԪ�����Ҹ���������Ԫ�ر���λ������ҳ���ϵ�����Ԫ��֮ǰ�� */
	float: right;
	margin-left: 8px;
}
.fltlft { /* �����������ҳ����ʹԪ�����󸡶�������Ԫ�ر���λ������ҳ���ϵ�����Ԫ��֮ǰ�� */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* ����� #container ��ɾ�����Ƴ��� #footer������Խ���������� <br /> ��� div �У���Ϊ #container �����һ������ div ֮�������Ԫ�� */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style>

<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* �� 1px ���߾���Է����ڴ˲����е��κ����У��Ҿ�����ͬ��У��Ч���� */
ul.nav a { zoom: 1; }  /* �������Խ�Ϊ IE �ṩ����Ҫ�� hasLayout ������������У������֮��Ķ���հ� */
</style>
<![endif]--></head>

<body>
<div id="top" style="background:#7F7F7F">
  &nbsp;&nbsp;&nbsp;&nbsp;<a href="register.html" >���ע��</a>
</div>
<div class="container">
  <div class="header"><div class="logo"><a href="?"><img src="" alt="�ڴ˴�����ձ�" name="Insert_logo" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a></div> <div class="seacher" align="center" ><form action="" method="get"><input name="seacher" width="480" height="32" type="text" />
    <input name="" type="submit"/></form></div>
    <!-- end .header --></div>
  <div class="sidebar1">
  <input name="" type="button" value="��������" />
<?php
include_once("menu.php");
if(isset($_GET["content"]))
$content=$_GET["content"];
else
{
	$content="��ҳ";
}

?>
    <!-- end .sidebar1 --></div>
  <div class="content">
<?php
switch($content)
{
	case "Ŀ¼":
	case "����":
	case "�����":
		include_once("var.php");
		break;
	case "����":
	case "�ຯ��":
		include_once("function.php");
		break;
	case "��":
		break;
	default://��ҳ
		include_once("main.html");
		break;
}

?>  
    <!-- end .content --></div>
  <div class="sidebar2">
    <h4>����</h4>
    <p>�����ϣ����� div �еı�����ɫ������ʾ������һ���ĳ��ȡ������ϣ�����÷ָ��ߣ���������ɫ�������� .content div �Ĳ�����ñ߿򣨵������佫ʼ�հ�����������ʱ����</p>
    <!-- end .sidebar2 --></div>
  <div class="footer">
    <p>�� .footer �������� position:relative���Ա�Ϊ .footer ָ�� Internet Explorer 6 hasLayout����ʹ������ȷ��ʽ��������������Ҫ֧�� IE6������Խ���ɾ����</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
