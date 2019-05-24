<!DOCTYPE>
<html>
<head>
	<?php include("Header.php"); ?>


	<title>WElcome to manageroles page </title>
</head>
<body>
	<div class="color" ><h1> Manager Menu</h1></div>
	<form method="post" action="" name="manageroles">
		<div class="color1"><img src="http://localhost/phpfiles/Task_Mngt/images/manageroles.jpeg" id="manageroles" >
			<h3>MANAGE ROLES </h3></div>

			<div class="color1"><img src="http://localhost/phpfiles/Task_Mngt/images/report.jpeg" id="viewreport">
				<h3>View Report</h3></div>

			</form>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</body>
		<?php include("Footer.php"); ?>
		</html>
		<script type="text/javascript">
			$("body").on("click","#viewreport",function(e)
			{
				e.preventDefault();
				window.location="?rt=user/fViewUserDetails";
			});
		</script>