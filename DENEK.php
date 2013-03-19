<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="javascripts/jquery-1.7.2.min.js"></script>
</head>
<body>

<form>

<input type="text" id="kutu" />
<span></span>

</form>



<script type="text/javascript">

	$('input').click
	(
		function()
		{
			$('span').show().text('karakter grubu seçildi').fadeout('slow');
		}
	);

</script>

</body>
</html>