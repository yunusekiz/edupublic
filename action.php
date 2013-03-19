<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php


if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
	if( ($name == '') || ($email == '') || ($msg == '') )
	{
		echo 'lutfen bos alan birakmayin';
		die();
	}
	
	
    ?>
    Your Name Is: <?php echo $name; ?><br />
    Your Email Is: <?php echo $email; ?><br />
    Your Message Is: <?php echo $msg; ?><br />
    <?php
    die();
}


?>


</body>
</html>