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
					<div class="dropdown-circlemng" id="dropdownlogmng" ><p class="dropdown-P">S</p></div>
					
				</nav>
				
			</div>
		</div>
		<div class="">
			<div id="myDropdown" class="dropdown-content">
				<div class="user-circle-mnglogout">P</div>
				<div class="user-name-logout">Portal Admin</div>
				<p class="logout-dropdown">
				<a href="#" id="managheaderlogout"style="color: blue !important; float: right;margin-right: 41px;font-size: 13px;margin-top: -2px;margin-left: 5px;"><?php echo $_SESSION['email'];?></a>
				</p>
				<a href="?rt=index/logoutPortal"><p class="logout-dropdown">Logout</p></a>

			</div>
		</div>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				$('#dropdownlogmng').on('mouseenter',function()  {
							// body...
							$('#dropdownlogmng').css( 'cursor', 'pointer' );
							$('#myDropdown').toggle();
							
						});
				$(document).click(function (event) {            
					$('#myDropdown:visible').hide();
				});
					
			</script>
		</body>
		</html>