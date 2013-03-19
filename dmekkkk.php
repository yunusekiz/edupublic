<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="javascripts/jquery-1.7.2.min.js"></script>
</head>

<body>

<div id="target">
  Click here
</div>

<script type="text/javascript">
$('#target').toggle(function() {
								  alert('First handler for .toggle() called.');
							   }, function() {}
				   );
</script>
</body>
</html>