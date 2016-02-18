// JavaScript Document
var xmlhttp = false;
if(window.ActiveXObject){
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}else if(window.XMLHttpReuqest){
	xmlhttp = new XMLHttpRequest();
}