<?php
@session_start();
require_once("header.php"); 
?>

<!DOCTYPE>
<html>
<head>

	<link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Task_Mngt/css/Testcase1.css">
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>View Report</title>

	<style type="text/css">
		.tables
		{
			border-style: solid;
			text-align: center;
		}
		th
		{
			text-align: center;
		}
		.color
		{
			color: white;
			width: 100%;
			background: #363D63;
		}
		.btn
		{
			float: right;
			margin-bottom: 20px;

		}
		label
		{
			text-align: left;
		}
		.mar-10{margin-left: 10px !important;}
		.create-button{margin-top:80px !important;}
		.btn
		{
			margin-right: 10px;
			font-size: 10px;
		}
		td
		{
			text-align: center;
		}	
	</style>
	
</head>
<body>
	
	<!-- Trigger the modal with a button -->
	<div><button id="insertbtn" class="btn create-button  btn-success" >Create Profile</button></div>
	
	<div><input type="checkbox" name="show_inactive" id="show_inactive" class="create-button"> show inActive records</div>
	<form>
		<!-- <div class="div-viewuser">
			<div>
				<h3>Details of all users</h3>
			</div>
			<div>
				<a href="?rt=user/mngSmpage" class="back-div-logout"><img src="../Task_Mngt/images/Backicon.png" width="50px" height="50px" title="Back" alt="arrow"></a>
			</div>
		</div> -->
		<div style="" class="color"><h3>Details of all users<a href="?rt=user/mngSmpage" class="back-div"><img src="../Task_Mngt/images/Backicon.png" title="Back" alt="arrow" height="50px" width="50px"></a></h3></div>

		<table border="1px" width="100%" class="tables">
			<thead>
				<tr>
					<th width="20%">Serial Id</th>
					<th width="20%">Employee Name</th>
					<!-- <th width="10%">Employee Password</th> -->
					<th width="20%">Employee Emai-ID</th>
					<th width="20%">Employee Creation Date</th>
					<th width="20%">Employee Creation Date&Time</th>
					<!-- <th width="20%">Action</th> -->
				</tr>
			</thead>
			<tbody id="userTBody"></tbody>
		</table>
	</form>
	<form id="insertUserForm" name="insertUserForm" action="#" method="POST">
		<!-- Modal --> 
		<div id="mngraddModal" class="modal" role="dialog">
			<!-- Modal content -->
			<div class="modal-content" align="center">
				<!-- Modal header -->
				<div class="modal-header">
					<span class="close">&times;</span>
					<h4 class="modal-title pull-left">Employee Details</h4>
				</div>

				<div class="modal-body">
					<!-- <label>Employee Id:</label><input type="text" class="form-control " name="empname_id"id="empname_id"> -->


					<label> <p class="p-cretemodalname"> Employee Name:</p></label><input type="text" class="form-control" name="empname"id="empname">


					<label><p class="p-cretemodalpass"> Employee Password:</p></label><input type="Password" class="form-control" name="empname_pass"id="empname_pass">

					<label> <p class="p-cretemodalcpass">Employee Confirm_Password:</p></label><input type="Password" class="form-control" name="empname_cnfrmdpass"id="empname_cnfrmdpass">


					<label> <p class="p-cretemodalemail">Employee Email_id:</p></label><input type="text" class="form-control" name="empname_email"id="empname_email">

					<label>Select Your_Role:</label><select name="employee_role" id="employee_role">
						<?php 
						$rowCnt = count($roleDetails['MVC']['role_fetched']);
						for($r=0;$r<=$rowCnt;$r++){
							$TM_roleId = $roleDetails['MVC']['role_fetched'][$r]['TM_role_id'];
							$TM_roleName = $roleDetails['MVC']['role_fetched'][$r]['TM_role_name'];
							if( $TM_roleName!=''){
								echo '<option value="'.$TM_roleId.'">'.$TM_roleName.'</option>';
							}
						}
						?>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger mar-10"  id="btnClose">Close</button>
					<button type="submit" class="btn btn-primary" value="submit" id="submitbtn">Submit</button>
				</div>
			</div>
		</div>

	</form>

</body>
	<br><br>
	<?php require_once("Footer.php"); ?>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	
	
	//fetching user details from database
	$(document).ready(function(){
		displayRecords();
	});

	function displayRecords()
	{
		var flag = ($('#show_inactive').is(':checked')) ? 0 : 1;
		$('#userTBody').html('');
		$.ajax({
			cache:false,
			datatype:"json",
			type: "POST",
			url: '?rt=user/getDetails',
			data:{ajaxcall:true,flag:flag}
		}).done(function(data){
			if(JSON.parse(data)){
				var data = JSON.parse(data);
				//alert(data);
				console.log(data);
				var html="";
				var count = data.MVC.user_result.length;
				if(count>0){
					for (var i = 0; i < count; i++) {
						html +='<tr>';

						html +='<td>';
						html += i+1;
						html +='</td>';
						html +='<td>';
						html += data.MVC.user_result[i].TM_info_user_name;
						html +='</td>';
						/*html +='<td>';
						html += data.MVC.user_result[i].TM_info_user_pass;
						html +='</td>';*/
						html +='<td>';
						html += data.MVC.user_result[i].TM_info_user_emailid;
						html +='</td>';
						html +='<td>';
						html += data.MVC.user_result[i].TM_info_user_created_date;
						html +='</td>';
						html +='<td>';
						html += data.MVC.user_result[i].TM_info_user_created_date_time;
						html +='</td>';
						/*html +='<td>';
						html += '<img title="Edit" src="../Task_Mngt/images/Edit_icon.png" id="edit" editid="'+data.MVC.user_result[i].id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="../Task_Mngt/images/delete.png" id="del" deleteid="'+data.MVC.user_result[i].id+'">';
						html +='</td>';*/

						html +='</tr>';

					}

					$('#userTBody').append(html);
				}
			}
		}).fail(function(){

		})
	}
	// insering functionality of modal
	var managerModal = document.getElementById('mngraddModal');
	$('#insertbtn').click(function(){
		managerModal.style.display = "block";  
	});
	$('#btnClose').click(function(){
		managerModal.style.display = "none";  
	});
	$(".close").click(function(){
		managerModal.style.display = "none"; 
	});
	window.onclick = function(event)
	{
		if (event.target == managerModal) 
		{
			
			managerModal.style.display = "none";

		}
		
	}

    //active/deactive user
    $('#show_inactive').on('change',function(e){
    	e.preventDefault();
    	$('#userTBody').html('');
    	displayRecords();
    });

    // creating user for manager role

    $('#insertUserForm').submit(function(e){
    	e.preventDefault();
    	var empname_id=$('#empname_id').val();
    	var empname = $('#empname').val();
    	var empname_pass=$('#empname_pass').val();
    	var empname_cnfrmdpass=$('#empname_cnfrmdpass').val();
    	var empname_email=$('#empname_email').val();
    	var empname_date=$('#empname_date').val();
    	var empname_time=$('#empname_time').val();
    	var employee_role=$('#employee_role').val();
    	$.ajax({
    		data : {ajaxcall:true,empname_id:empname_id,empname:empname,empname_pass:empname_pass,empname_email:empname_email,empname_date:empname_date,empname_time:empname_time,employee_role:employee_role},
    		url : "?rt=user/fCreateNewUser",
    		cache:false,
    		type : 'POST'
    	}).done(function(data){
    		if(JSON.parse(data)){
    			var data = JSON.parse(data);
    			if(data.task_management.exists == 1){
    				alert("Username "+empname+" already exists.");
    				managerModal.style.display = "none";
    				displayRecords();
    			}else if(data.task_management.user_inserted==1){
    				alert("You have created user "+empname+" successfully");
    				managerModal.style.display = "none";

    				displayRecords();
    			} else{
    				alert("Failed to create new user.Please try again.");
    			}
    		}else{
    			alert("Failed to create new user.Please try again.");
    		}
    	}).fail(function(){
    		alert("Failed to create new user.Please try again.");
    	})

    });

    // validation of insert field
    $('#submitbtn').on('click',function finsertfieldVal()
    {
    	var val=1;
    	var empname_id=$('#empname_id').val();
    	var empname = $('#empname').val();
    	var empname_pass=$('#empname_pass').val();
    	var empname_cnfrmdpass=$('#empname_cnfrmdpass').val();
    	var email=$('#empname_email').val();
    	var empname_date=$('#empname_date').val();
    	var empname_time=$('#empname_time').val();
    	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    	
    	if(empname.length==0 && empname==''){
    		alert("enter employee name");
    		val=0;
    		return false;
    	}
    	else if(empname_pass.length==0 && empname_pass==''){
    		alert('enter Employee Password');
    		val=0;
    		return false;
    	}
    	else if (empname_cnfrmdpass.length==0 && empname_cnfrmdpass=='') 
    	{
    		alert('enter Employee Confirm Password');
    		val=0;
    		return false;
    	}
    	else if(empname_pass!=empname_cnfrmdpass)
    	{
    		
    		alert("confirm password should be same");
    		val=0;
    		return false;
    	}
     else if(reg.test(empname_email.value) == false) 
        {
          //$("#email").text("Invalid Email ->"+Email);
          alert('Invalid Email Address');
          val=0;
          return false;
      }
      
      return val;

  }); 
//keeping input field empty after submission of form
    $('#insertbtn').on('click',function clearFormfield()
    {
    	
    	$("#empname").val('');
    	$("#empname_pass").val('');
    	$("#empname_cnfrmdpass").val('');
    	$("#empname_email").val('');



    });

</script>