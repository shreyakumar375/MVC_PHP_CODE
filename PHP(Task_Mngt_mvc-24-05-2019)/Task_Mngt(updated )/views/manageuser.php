<!DOCTYPE >
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
		.color{
			color: white;
			 width: 100%;
  			background: #363D63;
		}
		.color1{
			color: black;
			float: left;
			text-align: left;
			
		}
		
	</style>
	<title>Admin Menu</title>
</head>
<body>
	<form method="post" action="" name="manageuser">
		<div class="color" ><h1> Admin Menu</h1></div>
		<div class="color1"><img src="http://localhost/Task_Mngt/images/USER_MANAGEMENT.png" id="mnguser">
		<h3>MANAGE USER</h3></div>
	</form>
</body>
</html>
<script type="text/javascript">
	
		$("body").on("click","#mnguser",function(e)
	  {
	  	e.preventDefault();
	  	window.location="?rt=user/fManageUserDetails";
	  });
</script>