<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.btn{
  		float: right;

  	}
  </style>
</head>
<body>

<div class="container">
  <h2> </h2>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" class="btn" data-toggle="modal" data-target="#myModal">Create Profile</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h4 class="modal-title">Employee Details</h4>
        </div>
        <div class="modal-body">
        <form id="createUserForm" name="createUserForm" action="#" method="POST">          
          <table>
          	<tr>
          		<td>
          			Employee Id:<td><input type="text" name="empname_id"id="empname_id">
          		</td></tr>
          		<tr>
          		<td>
          			Employee Name:<td><input type="text" name="empname"id="empname">
          		</td></tr>
          		<tr>
          		<td>
          			Employee Email_id:<td><input type="text" name="empname_email"id="empname_email">
          		</td></tr>
          		<tr>
          		<td>
          			Employee Creation Date:<td><input type="Date" name="empname_date"id="empname_date">
          		</td></tr>
          		<tr>
          		<td>
          			Employee Creation Date&Time:<td><input type="datetime-local" name="empname_time"id="empname_time">
          		</td>
          	</tr>
          	<tr>
          		<td>
          			<button type="submit" class="btn-primary" value="">Submit</button>
          		</td>
          	</tr>
          </table>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $('#createUserForm').submit(function(e){
    e.preventDefault();
      var empname = $('#empname').val();
      $.ajax({
        data : {ajaxcall:true,empname:empname},
        url : "?rt=user/fCreateNewUser",
        cache:false,
        type : 'POST'
      }).done(function(data){
        if(JSON.parse(data)){
          var data = JSON.parse(data);
          if(data.task_management.exists == 1){
            alert("Username "+empname+" already exists.");
          }else if(data.task_management.user_inserted==1){
            alert("You have created user "+empname+" successfully");
            $('#myModal').modal('hide');
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
</script>