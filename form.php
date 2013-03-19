<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="javascripts/jquery-1.7.2.min.js"></script>

</head>

<body>


<form id="ContactForm" method="post" >
    Your Name: <input type="text" name="name" value="" /><br /> 
    Your Email: <input type="text" name="email" value="" /><br /> 
    Your Message:<br /> <textarea style="width: 200px; height: 100px;" name="message"></textarea> 
    <br /><br /> 
   <!-- <input type="submit" name="submit" value="Submit" /><br />-->
<!-- <input type="button"  id="btn" value="Gönder"/>-->
   <!--<input type="button" id="btn" value="Gönder"  />-->
   <a id="btn" href="#"> <input type="hidden" value="gonder" /> Gönder</a>

</form>
    <div class="form_result"> </div>

<!--<script type="text/javascript">
		$('#btn').click
		(
			function()
			{
				$.ajax
					({
					type:"POST",
					url:"action.php",
					data:$('#ContactForm').serialize(),
					success:function(msg){
											$('.form_result').html(msg);
								  		 }
					});
			}
		);
</script>
-->

<script type="text/javascript">
		$('#btn').click
		(
			function()
			{
				$.post("action.php",$('#ContactForm').serialize())
				.done(
						function(msg){
										$('.form_result').html(msg);
									 }
					 );
			}
		);
</script>



</body>
</html>