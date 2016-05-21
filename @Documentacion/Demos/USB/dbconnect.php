<?php

$link = mysql_connect("localhost","root","BH2Ml1t4vu");

if(!$link)
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("demoUSB"))
{
	die('oops database selection problem ! --> '.mysql_error());
}
mysql_set_charset('utf8', $link);
?>