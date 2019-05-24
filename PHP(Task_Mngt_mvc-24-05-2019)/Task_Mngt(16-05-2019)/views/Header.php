<!doctype html>
<html lang="en">
<head>
	
	<title>Index Page</title>
	<link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css" /></link>
	

</head>
<body>
	<form method="post" action="" name="">
		<div class="hd fixed-header ">
			<div class="logocontainer module">
				<a href="?rt=index/samePage"><img src="../Task_Mngt/images/portal.png" width="100%" height="100%"></a>
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
					<div class="">
						<nav>
							<!-- <a href="?rt=user/mngSmpage" class="Menu">Task</a> -->
							<a href="?rt=index/loginValidation" class="logout">Log out</a>
							<span style="color: white !important; float: right" id="logout"><?php echo ''.$_SESSION['email'];?></span>
						</nav>
						
					</div>
				</div>
				<div class="dropdown">
					 <div id="myDropdown" class="dropdown-content">
			    		<a href="#home">Home</a>
			    		<a href="#about">About</a>
			    		<a href="?rt=index/loginValidation"><p class="logout-dropdown">Logout</p></a>

			  </div>
			</div>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				$('#logout').on('click',function()  {
					// body...
					$('#logout').css( 'cursor', 'pointer' );
					$('#myDropdown').show();
					 window.onclick = function(event) {
				      if (event.target == logout) 
				      {
				        //alert(11);
				        $('#myDropdown').show();

				      }
				      else {

				      		 $('#myDropdown').hide();
				      		}
				      
				    }
					
				});
			</script>
			</body>
			</html>

			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				$('#logout').on('click',function()  {
					// body...
					$('#logout').css( 'cursor', 'pointer' );
					$('#myDropdown').show();
					
				});
			</script> -->