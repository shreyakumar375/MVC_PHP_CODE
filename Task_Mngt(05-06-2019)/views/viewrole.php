<?php
@session_start();
require_once("managerHeader.php"); 
?>
<!DOCTYPE>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Testcase1.css">
  <title>Admin</title>
	<title>RoleDetails</title>
</head>
<body>
		<div class="color"  ><h3> Manage Roles <a href="?rt=index/mngSmpage" class="back-div-userroledetails" ><img src="../Task_Mngt/images/Backicon.png" width="50px" height="50px" title="Back" alt="arrow"></a></h3></div>

		<div class="content-main">
		<button id="createrolemodal" class="rolecrtbtn create-button  btn-success" >Create Role</button>
		<form method="post" action="#" id="displyRecords">
			<table border="1px" width="100%" class="tables">
				<thead>
					<tr>
						<th width="25%"class="th-viewrole">No</th>
						<th width="25%" class="th-viewrole">Role Name</th>
						<th width="25%" class="th-viewrole">Role Description</th>
						<th width="25%" class="th-viewrole">Action</th>
					</tr>
				</thead>
				<tbody id="userroleTBody"></tbody>
			</table>
		</form>
	 <!--  Create Manage Admin Role -->
	
	<!-- Create Modal for admin -->
	<div id="rolecreateform" class="modal" role="dialog">
    <!-- Modal content -->
    <div class="modal-content create-modal-height" align="center">
      <!-- Modal header -->
      <div class="modal-header">
        <span class="close" id="closerolemodal">&times;</span>
        <h4 class="modal-title pull-left">Role Details</h4>
      </div>

      <div class="modal-body">
        <form id="createroleform" name="createroleform" action="#" method="POST">
          <div class="form-group">
           <label> <p class="p-creterolemodal">Role Name:</p></label><input type="text" class="form-control" name="rolename"id="rolename">
         </div>

         <div class="form-group">
           <label> <p class="p-creterolemodaldesc">Role Description:</p></label><input type="textarea" class="form-control" name="roledesc"id="roledesc">
         </div>
          <table border="0px" width="100%">
          <tbody id="listingfeatureTBody"></tbody>
        </table>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger mar-10"  id="btnCloserolemodal">Close</button>
        <button type="submit" class="btn btn-primary" value="submit" id="crtrolesubmitbtn" >Submit</button>
      </div>
        </div>
      </div>
    </form>
  </div>
  </div>

	 <!-- edit modal of role admin -->
	<form>
    <div class="container">
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-editrole">
      <div class="modal-content-editrole">
      
        <!-- Modal Header -->
        <div class="modal-header-editrole">
          <h4 class="modal-title text-header">Edit Role</h4>
          <button type="button" class="close rolemodalclose" data-dismiss="modal" id="closebtn">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body-editrole">
        	<label class="form-contol">Role Name<span style="color:red;">*</span></label>
        	<input id="edit_rolename" class="form-control" type="text" name="profile_name">
        	<!-- <input type="hidden" name="role_id" id="role_id"> -->
        	<input type="hidden" name="edit_role_id" id="edit_roleid">
        	<input type="hidden" name="editid" id="editid">
        	<div>
        	<label class="form-contol">Description</label>
        	<textarea id="edit_roleDesc" class="form-control"></textarea>
        	</div>
       <div>
       	<label>Edit Privileges for  this role :</label>
       </div>

      	<table border="0px" width="100%">
			<tbody id="userfeatureTBody"></tbody>
		</table>

        </div>
        <!-- Modal footer -->
        
        <div class="modal-footer-editrole">
        	<button type="button" class="btn btn-success" id="saveupdatedRole">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="closemodal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
	 <?php require_once("Footer.php"); ?>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
		displayRole();
	});

	function displayRole()
	{
		$('#userroleTBody').html('');
		var flag = ($('#show_inactive').is(':checked')) ? 0 : 1;
		$.ajax({
			cache:false,
			datatype:"json",
			type: "POST",
			url: '?rt=user/fViewRoleDetails',
			data:{ajaxcall:true,flag:flag}
		}).done(function(data){
			if(JSON.parse(data)){
				//alert(12);
				var data = JSON.parse(data);
				//alert(data);
				console.log(data);
				var html="";
				var count = data.MVC.role_details.length;
				if(count>0){
					for (var i = 0; i < count; i++) {
						html +='<tr>';

						html +='<td>';
						html += data.MVC.role_details[i].TM_role_id;
						html +='</td>';
						html +='<td>';
						html += data.MVC.role_details[i].TM_role_name;
						html +='</td>';
						html +='<td>';
						html += data.MVC.role_details[i].TM_role_description;
						html +='</td>';
						html +='<td>';
						html += '<img title="Edit" src="../Task_Mngt/images/Edit_icon.png" id="roleedit" role_editid="'+data.MVC.role_details[i].TM_role_id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="../Task_Mngt/images/delete.png" id="del" role_deleteid="'+data.MVC.role_details[i].TM_role_id+'">';
						html +='</td>';

						html +='</tr>';
					}

					$('#userroleTBody').append(html);
				}
			}
		}).fail(function(){

		});
	}
// gettting feature name from feature table
	var editrolemodalp = document.getElementById('editrolemodal');
        $("body").on('click','#roleedit', function(){
        	
        	var role_id = $(this).attr('role_editid');        	
          	$('#edit_role_id').val(role_id);

          	//alert(role_id);

        	$('#myModal').show();
        	$('#userfeatureTBody').html('');
        	$.ajax({
			cache:false,
			datatype:"json",
			type: "POST",
			url: '?rt=user/getFeatureDetailsByRole',
			data:{ajaxcall:true,role_id:role_id}
		}).done(function(data){
			if(JSON.parse(data)){
				var data=JSON.parse(data);
				//alert(data);
				console.log(data);
				var html="";
				var count = data.task_mngt.roles_feature_list.length;
				if(count>0){
					for (var i = 0; i < count; i++) 
					{
						html +='<ul>';
						html +='<li> <input type="checkbox" name="feature_type" />';
						html += data.task_mngt.roles_feature_list[i].TM_feature_name;
                var subc = data.task_mngt.roles_feature_list[i].subfeature.length ;
                var subcLoop = data.task_mngt.roles_feature_list[i].subfeature;
                html +='<ul>';
                for (var j = 0; j < subc; j++) 
                {
                  html +='<li> <input type="checkbox" name="feature_type" />';
                  html += subcLoop[j].TM_feature_name;
                  html +='</li>';      
                }
                html +='</ul>';
						html +='</li>';
						html +='</ul>';
					}
					$('#userfeatureTBody').append(html);

				}
			}
		}).fail(function(){

		});
          		
  });
        $('#closemodal').click(function()
        {
        	$('#myModal').hide();
        });
        $('#closebtn').click(function()
        {
        	$('#myModal').hide();
        });


    	//edit role_details
	 $("body").on('click','#roleedit', function()
	 {
        	
        	var editid = $(this).attr('role_editid');        	
          	$('#editid').val(editid);
          	//alert(editid);
          	$.ajax({
			cache:false,
			datatype:"json",
			type: "POST",
			url: '?rt=user/fupdatedroleDetails',
			data:{ajaxcall:true,editid:editid}
		 }).done(function(data){
			if(JSON.parse(data)){
				var data=JSON.parse(data);
				//alert(data);
				console.log(data);
				var html="";
				var count = data.MVC.role_details.length;
				if(count>0){
					for (var i = 0; i < count; i++) 
					{
						var role_name= data.MVC.role_details[i].TM_role_name;
              			var role_description= data.MVC.role_details[i].TM_role_description;
              			var editid  = data.MVC.role_details[i].TM_role_id;
              			
              			$('#edit_rolename').val(role_name);
              			$('#edit_roleDesc').val(role_description);
              			$('#editid').val(editid);
              			

					}
					$('#userfeatureTBody').append(html);

				}
			}
			}).fail(function(){

			});

      });

	 //create role form for inserting new role
	 var createmodal = document.getElementById('createrolemodal');
    $('#createrolemodal').click(function()
    {
    	$('#rolecreateform').show();
    });
    $('#btnCloserolemodal').click(function()
    {
      $('#rolecreateform').hide();
    });
    $("#closerolemodal").click(function()
    {
      $('#rolecreateform').hide(); 
    });
    //
    	$('#createroleform').submit(function(e){
        e.preventDefault();
    	var rolename=$('#rolename').val();
    	var roledesc=$('#roledesc').val();
    	$.ajax({
    		data : {ajaxcall:true,rolename:rolename,roledesc:roledesc},
    		url : "?rt=user/fCreateNewRole",
    		cache:false,
    		type : 'POST'
    	}).done(function(data){
    		if(JSON.parse(data)){
    			var data = JSON.parse(data);
    			if(data.task_management.exists == 1){
    				alert("Rolename "+rolename+" already exists.");
    				$('#rolecreateform').hide();
    				displayRole();
    			}else if(data.task_management.user_inserted==1){
    				alert("You have created user "+rolename+" successfully");
    				$('#rolecreateform').hide();
    				displayRole();
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

  //getting data on create form of feature
  $("#createrolemodal").on("click",function()
      {
        $('#listingfeatureTBody').html('');
        $.ajax({
      cache:false,
      datatype:"json",
      type: "POST",
      url: '?rt=user/getFeatureDetailslist',
      data:{ajaxcall:true}
    }).done(function(data){
      if(JSON.parse(data)){
        var data=JSON.parse(data);
        //alert(data);
        console.log(data);
        var html="";
        var count = data.task_mngt.roles_feature_list.length;
        if(count>0){
          for (var i = 0; i < count; i++) 
          {
            html +='<ul>';
            html +='<li> <input type="checkbox" name="feature_type" />';
            html += data.task_mngt.roles_feature_list[i].TM_feature_name;
                var subc = data.task_mngt.roles_feature_list[i].subfeature.length ;
                var subcLoop = data.task_mngt.roles_feature_list[i].subfeature;
                html +='<ul>';
                for (var j = 0; j < subc; j++) 
                {
                  html +='<li> <input type="checkbox" name="feature_type" />';
                  html += subcLoop[j].TM_feature_name;
                  html +='</li>';      
                }
                html +='</ul>';
            html +='</li>';
            html +='</ul>';
          }
          $('#listingfeatureTBody').append(html);

        }
      }
    }).fail(function(){

    });

      });
</script>