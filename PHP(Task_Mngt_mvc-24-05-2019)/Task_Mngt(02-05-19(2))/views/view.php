<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>Login</title>
</head>
<body bgcolor="">
	<form method="POST" id="insertForm" action="?rt=index/loginValidation">
		<table align="center" cellpadding="2px" cellspacing="5px" action=" " >
			<tr><td>LoginId<td><input type="text" name="LoginId" id="LoginId"></td></tr>
			<tr><td>Username<td><input type="text" name="username" id="username"></td></tr>
			<tr><td>Paasword<td><input type="password" name="password" id="password"></td></tr>
			<tr><td>Confirm_Password<td><input type="Password" name="cpassword" id="cpassword"></td></tr>
			<tr><td>Email_Id<td><input type="text" name="email" id="email"></td></tr>
			<tr><td><input type="submit" name="submitbtn" id="submitbtn" value="Submit" class="btn btn-primary"></td></tr>

		</table>
		<span><p class="error-display"><?php echo $userErrMsg;?></p></span>
	</form>
</body>
</html>
<script type="text/javascript">
	
	/*$('#insertForm').on('submit',function(e){
		e.preventDefault();

		var login_id = $('#LoginId').val();
		var user_name=$('#username').val();
		var Password=$('#password').val();
		var c_password=$('#cpassword').val();
		var Email=$('#email').val();

		$.ajax({
			cache:false,
			type: "POST",
			url: '?rt=index/getUserDetails',
			data:{ajax:true,'LoginId':login_id,'username':user_name,'password':Password,'cpassword':c_password,'email':Email},
		}).done(function(data){
			if(JSON.parse(data)){
				var data = JSON.parse(data); 
				if(data.MVC.user_result == 1){
					console.log(data);
					alert("Username&Password matched");
		    		 				window.location.href = "views/index.php";
						           		}else{
						           			alert("Username&password not matched");
						           		}
						           	}
						           }).fail(function(){
						           }) ;
						           
						       });*/


		

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

	  	if(login_id.length==0 && login_id=="")
	  	{         
	  		//$("#LoginId").text("Invalid LoginId ->"+ login_id);
	  		alert('Invalid LoginId');
	  		val=0;
	  		
	  	}
	  	

	  	if(user_name.length==0 && user_name=="")
	  	{
	  		//$("#username").text("Invalid username ->"+ user_name);
	  		alert('Please enter username');
	  		val=0; 
	  		
	  	}
	  	
	  	if (reg.test(email.value) == false) 
	  	{
	  		//$("#email").text("Invalid Email ->"+Email);
	  		alert('Invalid Email Address ->'+Email);
	  		val=0;
	  		
	  	}
	  	
	  	var password_count = password.length
	  	if(password_count <= 0 && password=="")
	  	{
	  		
	  		//$("#password").text("Invalid password ->"+ Password);
	  		alert("Please enter your Password");
	  		val=0;
	  		
	  	}
	  	
	  	if(c_password.length==0 && c_password=="")
	  	{
	  		
	  		//$("#cpassword").text("Invalid c_password  ->"+ c_password);
	  		alert("Please enter your confirm password");
	  		val=0;
	  		
	  	}
	  	if(password!=c_password)
	  	{
	  		
	  		alert("provide same password");
	  		val=0;
	  		
	  	}
	  	return val;
	  }
						   </script>