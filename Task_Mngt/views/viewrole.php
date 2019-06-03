<?php
@session_start();
require_once("Header.php"); 
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>RoleDetails</title>
</head>
<body>
		<form method="post" action="#" id="displyRecords">
		<div class="color"  ><h3> Manage Roles <a href="?rt=index/samePage" class="back-div-userroledetails" ><img src="../Task_Mngt/images/Backicon.png" width="50px" height="50px" title="Back" alt="arrow"></a></h3></div>

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
        	<input id="rolename" class="form-control" type="text" name="profile_name">
        	<input type="hidden" name="role_id" id="role_id">
        <div>
        	<label class="form-contol">Admin Type</label>
        	<div>
        		<?php for($i=0;$i<count($roles_list);$i++){
        		echo '<input type="radio" name="admin_type"  value="'.$roles_list[$i]['role_id'].'"><span style="padding-left: 5px;display: inline-block;">'.$roles_list[$i]['role_name'].'</span>';
        		
        		}?>
        	</div>
         </div>
        	<div>
        	<label class="form-contol">Description</label>
        	<textarea id="roleDesc" class="form-control"></textarea>
        	</div>
       <div>
       	<label>Edit Privileges for  this role :</label>
       </div>
       <div>
       		<label>
			  <ul id="myUL">
			  <li><span class="glyphicon glyphicon-plus">ManageUser</span>
			    <ul class="nested">
			      <li><input type="checkbox" name="" checked="" name="fcheck" value="" class="checkbox child_checkbox checkbox-inline child_2" ><p style="padding-left: 21px;margin-top: -17px; ">Add User</p></li>
			      
			      <li><input type="checkbox" name="" checked="" name="fcheck" value="" class="checkbox child_checkbox checkbox-inline child_2" ><p style="padding-left: 21px;margin-top: -17px; ">Edit User</p></li>

			      <li><input type="checkbox" name="" checked="" name="fcheck" value="" class="checkbox child_checkbox checkbox-inline child_2" ><p style="padding-left: 21px;margin-top: -17px; ">View User</p></li>

			      <li><input type="checkbox" name="" checked="" name="fcheck" value="" class="checkbox child_checkbox checkbox-inline child_2" ><p style="padding-left: 21px;margin-top: -17px; ">Delete User</p></li>
			        </ul>
			      </li>

			      <li><span class="glyphicon glyphicon-plus">AddTask</span>
			        <ul class="nested">

			          <li><input type="checkbox" name="" checked="" name="fcheck" value="" class="checkbox child_checkbox checkbox-inline child_2" ><p style="padding-left: 21px;margin-top: -17px; ">Add User</p></li>
			          
			          <li><input type="checkbox" name="" checked="" name="fcheck" value="" class="checkbox child_checkbox checkbox-inline child_2" ><p style="padding-left: 21px;margin-top: -17px; ">View User</p></li>
			            </ul>
			          </li>  
			    </ul>
			  </li>
			</ul>
			</label>
       </div>
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
		var flag = ($('#show_inactive').is(':checked')) ? 0 : 1;
		$('#userTBody').html('');
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

	var editrolemodalp = document.getElementById('editrolemodal');
        $("body").on('click','#roleedit', function(){
        	
        	var role_id = $(this).attr('role_editid');        	
          	$('#role_id').val(role_id);

          	alert(role_id);
        	$('#myModal').show();
        	$.ajax({
			cache:false,
			datatype:"json",
			type: "POST",
			url: '?rt=user/getFeatureDetailsByRole',
			data:{ajaxcall:true,role_id:role_id}
		}).done(function(data){

		}).fail(function(){

		});
          	
			
        });
        $('#closemodal').click(function(){
        	$('#myModal').hide();
        });
        $('#closebtn').click(function(){
        	$('#myModal').hide();
        });


        //tree view code
        var toggler = document.getElementsByClassName("glyphicon glyphicon-plus");
		var i;

		for (i = 0; i < toggler.length; i++)
		{
		  toggler[i].addEventListener("click", function() {
		    this.parentElement.querySelector(".nested").classList.toggle("active");
		    this.classList.toggle("caret-down");
		  });
		}
</script>