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
						<div class="dropdown-circle" id="dropdownloghead" ><p class="dropdown-P">S</p>
						</div>
						
					</nav>
				</div>
		</div>
		
		<div class="">
			<div id="myDropdown" class="dropdown-content-header">
				<div class="user-circle-headlogout">P</div>
				<div class="user-name-logout">Portal Admin</div>
				<p class="logout-dropdown">
				<a href="#" style="color: blue !important; float: right;margin-right: 41px;font-size: 13px;margin-top: -2px;margin-left: 5px;" id="headerlogout" ><?php echo ''.$_SESSION['email'];?> </a>
						</p>
				<a href="?rt=index/logoutPortal"><p class="logout-dropdown">Logout</p></a>

			</div>
		</div>
	</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				$('#dropdownloghead').on('mouseover',function()  {
					$('#dropdownloghead').css( 'cursor', 'pointer' );
					$('#myDropdown').show();
					
				});
				$(document).click(function (event) {            
					$('#myDropdown:visible').hide();
				});
	
					/*$('#headerlogout').on('mouseenter',function()  {
					
					$('#headerlogout').css( 'cursor', 'pointer' );
					$('#myDropdown').show();
					
				});*/
				/*$('#dropdownloghead').on('mouseleave',function()  {
					// body...
					console.log("gsdgs");
					$('#headerlogout').css( 'cursor', 'pointer' );
					$('#myDropdown').hide();
					
				});*/
			</script>
		</body>
	</form>
</body>
</html>