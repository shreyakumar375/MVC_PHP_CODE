<!DOCTYPE>
<html>
<head>
	<?php include("managerHeader.php"); ?>


	<title>Welcome to manageroles page </title>
</head>
<body>
	<div class="color " ><h1> Manager Menu</h1></div>
	<form method="post" action="" name="manageroles">
			<div class="color1 module "><p class="img-mar-20"><img src="../Task_Mngt/images/manage-role.png" id="manageroles" ><p id="managetext" align="left">Manage Roles </p> 
			 </div>

			<div class="color1 module"><p class="img-mar-20"><img src="../Task_Mngt/images/view-report.png" id="viewreport"><p id="viewtext" align="left">View Report</p>
			</div>

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