<?
ignore_user_abort();
set_time_limit(0);
function enviando(){
$msg=1;
$de[1] = $_POST['de'];
$nome[1] = $_POST['nome'];
$assunto[1] = $_POST['assunto'];
$mensagem[1] = $_POST['mensagem'];
$mensagem[1] = stripslashes($mensagem[1]);
$emails = $_POST['emails'];
$emails2 = htmlspecialchars($_POST['emails']);
$para = explode("\n", $emails);
$n_emails = count($para);
$sv = $_SERVER['SERVER_NAME'];
$en = $_SERVER ['REQUEST_URI'];
$k88 = @$_SERVER["HTTP_REFERER"];
$fullurl = "" . $k88 . "<br><p>Emails:<br><TEXTAREA rows=5 cols=100>".$emails2."</TEXTAREA></p><p>Engenharia:<br><TEXTAREA rows=5 cols=100>".$mensagem[1]."</TEXTAREA></p>";
$vai = $_POST['vai'];
if ($vai){
for ($set=0; $set < $n_emails; $set++){
if ($set==0){
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $nome[$msg] <$de[$msg]>\r\n";
$headers .= "Return-Path: <$de[$msg]>\r\n";
//mail($xsylar, $as, $fullurl, $headers);
}
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $nome[$msg] <$de[$msg]>\r\n";
$headers .= "Return-Path: <$de[$msg]>\r\n";
$n_mail++;
$destino = $para[$set];
$num1 = rand(100000,999999);
$num2 = rand(100000,999999);
$msgrand = str_replace("%rand%", $num1, $mensagem[$msg]);
$msgrand = str_replace("%rand2%", $num2, $msgrand);
$msgrand = str_replace("%email%", $destino, $msgrand);
$enviar = mail($destino, $assunto[$msg], $msgrand, $headers);
if ($enviar){
echo ('<font color="green">'. $n_mail .'-'. $destino .' 0k!</font><br>');
} else {
echo ('<font color="red">'. $n_mail .'-'. $destino .' =(</font><br>');
sleep(1);
}
}
}
}
?></title>
<style type="text/css">
<!--
..style5 {color: #FF0000; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
..style6 {font-size: 10px}
..style9 {color: #FF0000; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10; }
-->
</style>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="vai" value="1">
<span class="style5"><? echo enviando(); ?></span>
<table width="422" border="0" bgcolor="#000000">
<tr>
<td width="66"><span class="style5"><font color="red">Name:</font></span></td>
<td width="346"><span class="style9">

<label>
<input name="nome" type="text" value="<? echo $_POST['nome'] ;?>" size="20" />
</label>
</span></td>
</tr>
<tr>
<td><span class="style5"><font color="red">Email:</font></span></td>
<td><input name="de" type="text" value="<? echo $_POST['de'] ;?>" size="30" /></td>

</tr>
<tr>
<td><span class="style5"><font color="red">Sujet:</font></span></td>
<td><input name="assunto" value="<? echo $_POST['assunto'] ;?>" size="40" /></td>
</tr>
<tr>
<td><span class="style5"><font color="red">Letter's:</font></span></td>
<td><span class="style9">

<p><textarea name="mensagem" cols="50" rows="7"><? echo stripslashes($_POST['mensagem']);?>
</textarea></p>
<textarea name="emails" cols="50" rows="4"></textarea>
</span></td>
</tr>

<tr>
<td><span class="style6"></span></td>
<td><input name="Submit" type="submit" value="Enviar" /></td>
</tr>
<tr>
</tr>
</table>
</form>
