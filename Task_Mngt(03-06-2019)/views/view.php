
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>Login</title>
	<style type="text/css">
		.table_login{
			float: middle;
			margin-right:   500px;
			padding-top:  150px;
		}
	</style>
</head>
<body bgcolor="">
	<form method="POST" id="insertForm" action="?rt=index/loginValidation">
		<table align="center" cellpadding="2px" cellspacing="5px" action=" " class="table_login"  >
			<tr><td>Username<td><input type="text" name="username" id="username"></td></tr>
			<tr><td>Password<td><input type="password" name="password" id="password"></td></tr>
			<tr><td><input type="submit" name="submitbtn" id="submitbtn" value="Submit" class="btn btn-primary"></td></tr>
		</table>
		<span><p class="error-display"><?php echo $userErrMsg;?></p></span>
	</form>
</body>
</html>
<script type="text/javascript">
	
	$('#submitbtn').on('click',function(e){
		e.preventDefault();
		var valid = logInValidation();
		if(valid === 1){
			$('#insertForm').submit();
		}
	});

	function logInValidation(){
		var val=1;
		var login_id=$('#LoginId').val();
		var user_name=$('#username').val();
		var password=$('#password').val();
		var c_password=$('#cpassword').val();
		var Email = $("#email").val();
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		

		if(user_name.length==0 && user_name=="")
		{	
			alert('Please enter username');
			val=0; 	
		}
		var password_count = password.length
		if(password_count <= 0 && password=="")
		{
			alert("Please enter your Password");
			val=0;	
		}
		
		return val;
	}
</script>