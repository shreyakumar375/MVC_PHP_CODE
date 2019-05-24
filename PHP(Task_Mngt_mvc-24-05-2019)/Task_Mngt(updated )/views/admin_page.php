<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Index Page</title>
	<link rel="stylesheet" href="../css/Mystyle.css" /></link>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
	<form method="post" action="" name="index">
	<div class="hd">
		<div class="logocontainer">
			<a href="#"><img src="../images/portal.png" width="100%" height="100%"  alt="img"></a>
		</div>
		<div class="links">
			<nav>
				<div class="dropdown">
					<button  class="Menu" id="Adminbtn">Admin 
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content" >
						
					</nav>

				</div>
				<div class="links">
					<nav>
						<div class="dropdown">
							<button  class="Menu">Task 
								<i class="fa fa-caret-down" ></i>
							</button>
							<div class="dropdown-content" >

							</div>
						</div> 
					</nav>

				</div>
			</div>

			<h1>Welcome to Dashboard</h1>
			

			<div class="foo">
				<h3>Contact Us</h3>
				<address>Bangalore,<br>
					Marathalli,<br>
					8<sup>th</sup>cross,<br>
					old airport road,<br>
					Bengaluru-560037<br>
				</address>
				<p>Copyright&copy; ISO:9001 &reg;Regd..
				&trade;</p>
				<div>
				</div>
			</div>
				
	</form>
		</body>
</html>


	<script type="text/javascript">

		$("#Adminbtn").on("click",function(e)
	{
	  	
	  	e.preventDefault();

	  	window.location = "?rt=index/loginValidation";
	  });

  
  

		
	</script>



