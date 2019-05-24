<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/Testcase1.css">
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
    .tables{
      border-style: solid;
      text-align: center;
    }
    th{
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2> </h2>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" class="btn" data-toggle="modal" data-target="#myModal">Create Profile</button>
    <br><br><br>
    <div><input type="checkbox" name="show_inactive" id="show_inactive"> show inActive records<br></div>
    <form>
      <table border="1px" width="100%" class="tables" >
        <thead>
          <tr>
            <th width="15%">Employee Id</th>
            <th width="15%">Employee Name</th>
            <th width="20%">Employee Password</th>
            <th width="10%">Employee Emai-ID</th>
            <th width="15%">Employee Creation Date</th>
            <th width="15%">Employee Creation Date&Time</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody id="tBody"></tbody>
      </table>
    </form>
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
                   <td>
                    Employee Password:<td><input type="Password" name="empname_pass"id="empname_pass">
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
        <!-- update modal -->
        <div id="myModal1" class="modal1">
          <!-- Modal content -->
          <div class="modal-content1">
            <span class="close1">&times;</span>
            <h2 align="center">Update Users Details</h2>
            <form action=" " method="post" name="updateForm" id="updateForm">
              <table border="0px" align="center" cellspacing="5px" class="table">
                <tr><td>Employee Id:<td><input type="text" name="edit_empname_id" id="edit_empname_id" ></td></tr>
                <tr><td>Employee Name:<td><input type="text" name="edit_empname" id="edit_empname"></td></tr>
                <tr><td>Employee Password:<td><input type="Password" name="edit_empname_pass" id="edit_empname_pass"></td></tr>
                <tr><td>Employee Email_id:<td><input type="text" name="edit_empname_email" id="edit_empname_email"></td></tr>
                <tr><td>Employee Creation Date:<td><input type="Date" name="edit_empname_date" id="edit_empname_date"></td></tr>
                <tr><td>Employee Creation Date&Time:<td><input type="datetime-local" name="edit_empname_time" id="edit_empname_time"></td></tr>
                <input type="hidden" name="edit_id" id="edit_id">
                <tr><td><input type="submit" name="edit_submitbtn" id="edit_submitbtn" value="Submit" class="btn btn-primary" >
                </tr>
              </table>
            </div>
          </div>
        </div>
      </form>

    </body>
    </html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

      $('#createUserForm').submit(function(e){
        e.preventDefault();
        var empname_id=$('#empname_id').val();
        var empname = $('#empname').val();
        var empname_pass=$('#empname_pass').val();
        var empname_email=$('#empname_email').val();
        var empname_date=$('#empname_date').val();
        var empname_time=$('#empname_time').val();
        $.ajax({
          data : {ajaxcall:true,empname_id:empname_id,empname:empname,empname_pass:empname_pass,empname_email:empname_email,empname_date:empname_date,empname_time:empname_time},
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
              modal.style.display="none" ;
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

//fetching user details from database
$(document).ready(function(){
  displayRecords();
});

function displayRecords()
{
  var flag = ($('#show_inactive').is(':checked')) ? 0 : 1;
  $('#tBody').html('');
  $.ajax({
    cache:false,
    datatype:"json",
    type: "POST",
    url: '?rt=user/getDetails',
    data:{ajaxcall:true,flag:flag}
  }).done(function(data){
    if(JSON.parse(data)){
      var data = JSON.parse(data);
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
          html +='<td>';
          html += data.MVC.user_result[i].TM_info_user_pass;
          html +='</td>';
          html +='<td>';
          html += data.MVC.user_result[i].TM_info_user_emailid;
          html +='</td>';
          html +='<td>';
          html += data.MVC.user_result[i].TM_info_user_created_date;
          html +='</td>';
          html +='<td>';
          html += data.MVC.user_result[i].TM_info_user_created_date_time;
          html +='</td>';
          html +='<td>';
          html += '<img title="Edit" src="../Task_Mngt/images/Edit_icon.png" id="edit" editid="'+data.MVC.user_result[i].id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="../Task_Mngt/images/delete.png" id="del" deleteid="'+data.MVC.user_result[i].id+'">';
          html +='</td>';

          html +='</tr>';

        }

        $('#tBody').append(html);
      }
    }
  }).fail(function(){

  })
}

// delete the perticular user 
$("body").on("click","#del", function()
{
  var x = confirm("Are you sure you want to delete?");
  if (x){
    var id = $(this).attr('deleteid');
           // alert(id)
           $.ajax({
            cache:false,
            type: "POST",
            url: '?rt=user/delete',
            data:{id:id}
          }).done(function(data){
            if(JSON.parse(data)){
              var data = JSON.parse(data); 
              if(data.MVC.user_deleted == 1){
                alert("User deleted");
                $('#tBody').html('');
                displayRecords();
              }else{
                alert("failed");
              }
            }
          }).fail(function(){

          }) ;
        } else
        return false;
      });



$('#show_inactive').on('change',function(e){
  e.preventDefault();
  $('#tBody').html('');
  displayRecords();
});


var modal1 = document.getElementById('myModal1');
$("body").on("click","#edit", function()
{
  var id = $(this).attr('editid');
  $('#edit_id').val(id);
  modal1.style.display = "block"; 
  $.ajax({
    cache:false,
    type: "POST",
    url: '?rt=user/getUserUPDATEDetails',
    data:{ajaxcall:true,id: id}
  }).done(function(data){
    if(JSON.parse(data)){
      var data = JSON.parse(data);
      var html="";
      var count = data.MVC.user_result.length;
      if(count>0){
        for (var i = 0; i < count; i++) {
          var empname_id  = data.MVC.user_result[i].TM_info_login_id;
          var empname  = data.MVC.user_result[i].TM_info_user_name;
          var empname_pass  = data.MVC.user_result[i].TM_info_user_pass;
          var empname_email  = data.MVC.user_result[i].TM_info_user_emailid;
          var empname_date  = data.MVC.user_result[i].TM_info_user_created_date;
          var empname_time  = data.MVC.user_result[i].TM_info_user_created_date_time;
          $('#edit_empname_id').val(empname_id);
          $('#edit_empname').val(empname);
          $('#edit_empname_pass').val(empname_pass);
          $('#edit_empname_email').val(empname_email);
          $('#edit_empname_date').val(empname_date);
          $('#edit_empname_time').val(empname_time);
        }

        $('#tBody').append(html);
      }
    }
  }).fail(function(){

  }) ; 
});

$(".close1").click(function(){

  modal1.style.display = "none"; 
});

window.onclick = function(event) {
  if (event.target == modal1) 
  {
    modal.style.display = "none";
  }
  else if(event.target == modal1)
  {
    modal1.style.display = "none";
  }


}
  // UPDATE INSERT FUNCTIONALITY
  $("#edit_submitbtn").on("click",function()
    {
      $('#updateForm').on('submit',function(e){
        e.preventDefault();
        e.stopPropagation();

        var empname_id = $('#edit_empname_id').val();
        var empname=$('#edit_empname').val();
        var empname_pass=$('#edit_empname_pass').val();
        var empname_email=$('#edit_empname_email').val();
        var empname_date=$('#edit_empname_date').val();
        var empname_time=$('#edit_empname_time').val();
        var ids=$('#edit_id').val();
        //alert(empname);



                  $.ajax({
                    cache:false,
                    //datatype:'json',
                    type: "POST",
                    url: '?rt=user/updateinsert',
                    data:{ajax:true,'edit_empname_id':empname_id,'edit_empname':empname,'edit_empname_pass':empname_pass,'edit_empname_email':empname_email,'edit_empname_date':empname_date,'edit_empname_time':empname_time,'ids':ids},             
                  }).done(function(data){
                    if(JSON.parse(data)){
                      var data = JSON.parse(data); 
                      console.log(data);
                      if(data.MVC.user_inserted == 1){
                        
                        modal1.style.display = "none";

                        alert("User updated");
                        displayRecords();
                      }else{
                        alert("failed");
                      }
                    }
                  });
                  
                 });   
    });
</script>