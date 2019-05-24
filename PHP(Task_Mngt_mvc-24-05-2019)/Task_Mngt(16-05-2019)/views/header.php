<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css" /></link>
	<style type="text/css">
		.fixed-header{
			width: 100%;
			height:10%;
			position: fixed;
			background-color: dimgrey;
		}
		.text-color{color: black !important;}
	</style>
	<title></title>
</head>
<body>
	<form>
	<div class="fixed-header">
		<div class="logocontainer module">
				<a href="?rt=user/mngSmpage"><img src="../Task_Mngt/images/portal.png" width="100%" height="100%"></a>
			</div>
			<div class="links">
					<nav>
						<a href="?rt=user/mngSmpage" class="Menu">Admin</a>
						</nav>

					</div>
					<div class="links">
						<nav>
							<a href="?rt=user/mngSmpage" class="Menu">Task</a>
						</nav>

					</div>
					<div class="">
						<nav>
							<a href="?rt=index/loginValidation" class="logout">Log out</a>
							<span style="color: white !important; float: right" id="headerlogout"><?php echo ''.$_SESSION['email'];?></span>
						</nav>
						
					</div>
				</div>
	</div>
	</form>
</body>
</html>