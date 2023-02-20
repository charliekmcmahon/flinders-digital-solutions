<?php
$to = "011112@mfac.edu.au";
$subject = "Dog Parks & Beaches";

$message = "
<html>
<head>
<title>Dog Parks & Beaches: Update Data</title>
</head>
<body>
<p>Please remember to finish your TRD!</p>
<table>
<tr>
<th>Charlie</th>
<th>McMahon</th>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <charlie@maccastech.com.au>' . "\r\n";

mail($to,$subject,$message,$headers);

phpinfo();
echo phpinfo();
?>