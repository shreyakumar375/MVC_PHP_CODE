<!doctype html>
<html lang="en">
<head>
	
	<title>Index Page</title>
	<link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css" /></link>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<form method="post" action="" name="">
		<div class="hd fixed-header">
			<div class="logocontainer module">
				<a href="?rt=user/mngSmpage"><img src="../Task_Mngt/images/portal.png"></a>
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
							<!-- <a href="?rt=index/loginValidation" class="logout">Log out</a> -->
							<div id="managheaderlogout"style="color: white !important; float: right"><?php echo $_SESSION['email'];?></div>
						</nav>
						
					</div>
				</div>
			<div class="">
					 <div id="myDropdown" class="dropdown-content">
			    		<a href="?rt=user/mngSmpage">Home</a>
			    		<a href="#about">About</a>
			    		<a href="?rt=index/logoutPortal"><p class="logout-dropdown">Logout</p></a>

			  </div>
			</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				$('#managheaderlogout').on('mouseenter',function()  {
					// body...
					$('#managheaderlogout').css( 'cursor', 'pointer' );
					$('#myDropdown').toggle();
					
				});


				/*$('#managheaderlogout').on('mouseover',function()  {
					$('#managheaderlogout').css( 'cursor', 'pointer' );
					$('#myDropdown').show();
				});*/
					/*$('#managheaderlogout').on('mouseleave',function()  {
					$('#managheaderlogout').css( 'cursor', 'pointer' );
					$('#myDropdown').hide();
					
				});*/
 
					
					
			</script>
			</body>
			</html>