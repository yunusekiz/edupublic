<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="javascripts/jquery-1.7.2.min.js"></script>
</head>
<style>
	div{
		width:100px;
		height:100px;
		font-size:13px;
		font-family:Tahoma, Geneva, sans-serif;
		background-color:#fc3;
		display:none;
	}
</style>
<body>

<div id="kare"> KARE </div>
<!--<input id="btn" type="button" value="Ac/Kapa" />-->
<button id="btn" > Aç Kapa</button>

<script type="text/javascript">
	
	$('#btn').click
	(
		function()
		{
			$('#kare').fadeToggle(2000);
		}
	);

</script>



</body>
</html>