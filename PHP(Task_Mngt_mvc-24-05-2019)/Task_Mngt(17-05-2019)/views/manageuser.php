<?php 
	@session_start();
	include("Header.php");
	
	 ?>
<!DOCTYPE >
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css" /></link>
	<title>Admin</title>
</head>
<body contenteditable="false">
	<form method="post" action="" name="manageuser">
		<div class="admin-menu" ><p> Admin Menu</p>
		</div>
		<div class="color1 module"><p class="img-mar-20"><img src="../Task_Mngt/images/manage-user.png" id="mnguser" height="32px" width="32px"></p>
			<h6>MANAGE USER</h6></div>
		</form>
	
		
	</body>
	<?php include("Footer.php"); ?>
	</html>
	<script type="text/javascript">
		
		$("body").on("click","#mnguser",function(e)
		{
			e.preventDefault();
			window.location="?rt=user/fManageUserDetails";
		});
	</script>