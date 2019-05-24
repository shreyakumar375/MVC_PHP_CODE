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
							<!-- <a href="?rt=index/loginValidation" class="logout">Log out</a> -->
							<div style="color: white !important; float: right" id="headerlogout"><?php echo ''.$_SESSION['email'];?></div>
						</nav>
						
					</div>
				</div>
	</div>
	<div class="">
					 <div id="myDropdown" class="dropdown-content-header">
			    		<a href="#home">Home</a>
			    		<a href="#about">About</a>
			    		<a href="?rt=index/logoutPortal"><p class="logout-dropdown">Logout</p></a>

			  </div>
			</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				$('#headerlogout').on('mouseover',function()  {
					// body...
					$('#headerlogout').css( 'cursor', 'pointer' );
					$('#myDropdown').toggle();
					
				});
					
					
			</script>
			</body>
	</form>
</body>
</html>