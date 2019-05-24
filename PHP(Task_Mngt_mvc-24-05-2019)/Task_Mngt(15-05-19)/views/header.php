<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.fixed-header{
			width: 100%;
			height:8%;
			position: fixed;
			background-color: dimgrey;
		}
		.text-color{color: black !important;}
	</style>
	<title></title>
</head>
<body>
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
							<!-- <a href="?rt=user/mngSmpage" class="Menu">Task</a> -->
							<a href="?rt=index/loginValidation" class="logout">Log out</a>
							<span style="color: white !important; float: right"><?php echo $_SESSION['email'];?></span>
						</nav>
						
					</div>
				</div>
	</div>
</body>
</html>