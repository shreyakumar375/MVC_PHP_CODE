<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Index Page</title>
	<link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css" /></link>
	

</head>
<body>
	<form method="post" action="" name="">
		<div class="hd fixed-header ">
			<div class="logocontainer module">
				<a href="?rt=index/samePage"><img src="../Task_Mngt/images/portal.png" ></a>
			</div>
			<div class="links">
				<nav>
					<a href="?rt=index/samePage" class="Menu">Admin</a>
				</nav>

			</div>
			<div class="links">
				<nav>
					<a href="?rt=index/samePage" class="Menu">Task</a>
				</nav>

			</div>
			<nav>
				<!-- <a href="?rt=user/mngSmpage" class="Menu">Task</a> -->
				<!-- <a href="?rt=index/loginValidation" class="logout">Log out</a> -->
				<div class="dropdown-circle" id="dropdownlog" ><p class="dropdown-P">S</p></div>
				<!-- <div class="links-logout" id="logout" ><?php echo ''.$_SESSION['email'];?></div> -->

				
			</nav>
			
		</div>
		<div class="">
			<div id="myDropdown" class="dropdown-content">
				<div class="user-circle-logout">P</div>
				<div class="user-name-logout">Portal Admin</div>
				<p>
				<a href="#" class="links-logout" id="logout" ><?php echo ''.$_SESSION['email'];?></a>
				</p>
				<a href="?rt=index/logoutPortal"><p class="logout-dropdown">Logout</p></a>
				
			</div>
		</div>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$('#dropdownlog').mouseover(function()  {
			$('#dropdownlog').css( 'cursor', 'pointer' );
			$('#myDropdown').toggle();
			
		});

		$(document).click(function (event) {            
			$('#myDropdown:visible').hide();
		});
				/*$('#logout').mouseover(function()  {
					$('#logout').css( 'cursor', 'pointer' );
					$('#myDropdown').show();
				});

					$('#logout').on('mouseleave',function()  {
					$('#logout').css( 'cursor', 'pointer' );
					$('#myDropdown').hide();
					
				});*/
				
				
			</script>
</body>
</html>

		