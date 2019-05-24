<!DOCTYPE >
<html>
<head>
	
	<title>Admin Menu</title>
</head>
<?php include 'Header.php';?>
<body>
	


	<div class="color" ><h1> Admin Menu</h1></div>
	<div class="color1"><img src="http://localhost/phpfiles/Task_Mngt/images/USER_MANAGEMENT.png" id="mnguser">
		<h4>MANAGE USER</h4></div>
		<div class="color1"><img src="http://localhost/phpfiles/Task_Mngt/images/manageroles.jpeg" id="mngroles">
			<h3>MANAGE ROLES</h3></div>
		</form>
	</body>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php include 'Footer.php';?>
	</html>
	<script type="text/javascript">

		$("body").on("click","#mnguser",function(e)
		{
			e.preventDefault();

			window.location.replace("http://localhost/phpfiles/Task_Mngt/views/userdetails.php");
		});
		$("body").on("click","#mngroles",function(e)
		{
			e.preventDefault();

			window.location.replace("http://localhost/phpfiles/Task_Mngt/views/userdetails.php");
		});
	</script>