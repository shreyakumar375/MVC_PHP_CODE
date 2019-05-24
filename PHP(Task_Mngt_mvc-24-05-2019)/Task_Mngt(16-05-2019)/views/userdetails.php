<?php 
@session_start();
include("Header.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="http://localhost/phpfiles/Task_Mngt/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Mystyle.css">
  <link rel="stylesheet" href="../Task_Mngt/css/Testcase1.css">
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .btn
    {
      float: right;
      margin-bottom: 20px;

    }
    .tables
    {
      border-style: solid;
      text-align: center;
    }
    th
    {
      text-align: center;
    }
    td
    {
      text-align: center;
    }
    .edit_btn
    {
      float: middle;
    }
    label
    {
      text-align: left;
    }
    .mar-10{margin-left: 10px !important;}
    .create-button{margin-top:5px !important;}
    .btn
    {
      margin-right: 10px;
    }
  
</style>
</head>
<body>
<div class="color"  ><h3> Manage User <a href="?rt=index/samePage" class="back-div">Back</a></h3></div>
  <!-- Trigger the modal with a button -->
  <button id="myBtn" class="btn create-button  btn-success" >Create Profile</button>
  <br><br>
  <div><input type="checkbox" name="show_inactive" id="show_inactive"> show inActive records<br></div>
  <form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="15%">Serial Id</th>
          <th width="15%">Employee Name</th>
         <!--  <th width="20%">Employee Password</th> -->
          <th width="20%">Employee Emai-ID</th>
          <th width="20%">Employee Creation Date</th>
          <th width="20%">Employee Creation Date&Time</th>
          <th width="20%">Action</th>
        </tr>
      </thead>
      <tbody id="tBody"></tbody>
    </table>
  </form>


  <!-- Modal --> 
  <div id="myModal" class="modal" role="dialog">
    <!-- Modal content -->
    <div class="modal-content" align="center">
      <!-- Modal header -->
      <div class="modal-header">
        <span class="close">&times;</span>
        <h4 class="modal-title pull-left">Employee Details</h4>
      </div>

      <div class="modal-body">
        <form id="createUserForm" name="createUserForm" action=" " method="POST">
         <label>Employee Id:</label><input type="text" class="form-control " name="empname_id"id="empname_id">


         <label > Employee Name:</label><input type="text" class="form-control" name="empname"id="empname">


         <label> Employee Password:</label><input type="Password" class="form-control" name="empname_pass"id="empname_pass">


         <label> Employee Email_id:</label><input type="text" class="form-control" name="empname_email"id="empname_email">

         <label>Select Your_Role:</label> <select>
              <option value="default"></option>
              <option value="superAdmin">SuperAdmin</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select> 
         <!-- <label> Employee Creation Date:</label><input type="Date" class="form-control" name="empname_date"id="empname_date">


         <label> Employee Creation Date&Time:</label><input type="datetime-local" class="form-control" name="empname_time"id="empname_time">
 -->
       </div>

       <div class="modal-footer">
          <button type="button" class="btn btn-danger mar-10"  id="btnClosePopup">Close</button>
          <button type="submit" class="btn btn-primary" value="submit" id="submitbtn">Submit</button>
        </form>
      </div>
  </div>
</div>


<!-- update modal -->
<div id="myModal1" class="modal1" role="dialog">
  <!-- Modal content -->
  <div class="modal-content1">

    <span class="close1">&times;</span>
    <h2 align="modal-title pull-left">Update Users Details</h2>

    <div>
      <form action="#" method="post" name="updateForm" id="updateForm">
        <label>Employee Id:</label><input type="text" class="form-control"name="edit_empname_id" id="edit_empname_id" >

        <label>Employee Name:</label><input type="text" class="form-control"name="edit_empname" id="edit_empname">

        <label>Employee Password:</label><input type="Password" class="form-control" name="edit_empname_pass" id="edit_empname_pass">

        <label>Employee Confirm_Password:</label><input type="Password" class="form-control" name="edit_empname_cnfrmpass" id="edit_empname_cnfrmpass">

        <label>Employee Email_id:</label><input type="text" class="form-control" name="edit_empname_email" id="edit_empname_email">
            <label>Select Your_Role:</label> <select>
              <option value="default"></option>
              <option value="superAdmin">SuperAdmin</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select> 

       <!--  <label>Employee Creation Date:</label><input type="date" class="form-control" name="edit_empname_date" id="edit_empname_date">

        <label>Employee Creation Date&Time:</label><input type="datetime-local" class="form-control" name="edit_empname_time" id="edit_empname_time">
 -->
        <input type="hidden" name="edit_id" id="edit_id">
        <br>

        <label><input type="submit" name="edit_submitbtn" id="edit_submitbtn" value="Submit" class="btn btn-primary" ><label>
        </form>
      </div>
    </div>
  </div>


  <!-- Confirmation for delete modal popup -->
  <div id="deletemodal" class="modaldelete" role="dialog">
    <form method="post" action="#" id="confirmdel">
      <div class="modal-content2 text-center">
        <div class="modal-header d-flex justify-content-center">
          <p class="heading">Are you sure want to delete this user?</p>
        </div>
        <div class="modal-body">
          <img src="http://localhost/phpfiles/Task_Mngt/images/cross.png" width="40px" height="40px" alt="img">
        </div>
        <div class="modal-footer flex-center">
          <input type="hidden" name="del_id" id="del_id" value="0">
          <a href="" class="btn  btn-danger waves-effect">No</a>
          <a type="submit" class="btn  btn-success waves-effect" id="confirmdelete">Yes</a>
        </div>
      </div>
    </form>
  </div>  
</body>
<?php require_once("Footer.php"); ?>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

  var modal = document.getElementById('myModal');
  $('#myBtn').click(function(){
    modal.style.display = "block";  
  });
  $('#btnClosePopup').click(function(){
    modal.style.display = "none";  
  });
  $(".close").click(function(){
    modal.style.display = "none"; 
  });
  window.onclick = function(event) {
      if (event.target == modal) 
      {
        //alert(11);
        modal.style.display = "none";

      }else if(event.target==modal1){
        modal1.style.display="none";
      }
      
    }


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
          modal.style.display = "none";
          displayRecords();
        }else if(data.task_management.user_inserted==1){
          alert("You have created user "+empname+" successfully");
          modal.style.display = "none";
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
            html +='<td>';
            html += '<img title="Edit" src="../Task_Mngt/images/Edit_icon.png" id="edit" class="module" editid="'+data.MVC.user_result[i].id+'">&nbsp;&nbsp;&nbsp;<img title="Delete" src="../Task_Mngt/images/delete.png" id="del" class="module" deleteid="'+data.MVC.user_result[i].id+'">';
            html +='</td>';

            html +='</tr>';

          }

          $('#tBody').append(html);
        }
      }
    }).fail(function(){

    })
  }
  //delete functionality code
  $('body').on('click','#confirmdelete',function()
  {
    var del_id = $('#del_id').val();
    $.ajax({
      cache:false,
      type: "POST",
      url: '?rt=user/delete',
      data:{id:del_id}
    }).done(function(data){
      if(JSON.parse(data)){
        var data = JSON.parse(data); 
        if(data.MVC.user_deleted == 1){
          alert("User deleted");
          modaldelete.style.display = "none";
          $('#tBody').html('');
          displayRecords();
        }else{
          alert("failed");
        }
      }
    }).fail(function(){

    }) ;
  });

//active ang deactive user
  $('#show_inactive').on('change',function(e){
    e.preventDefault();
    $('#tBody').html('');
    displayRecords();
  });

//edit user details
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
            var empname_cnfrmpass  = data.MVC.user_result[i].TM_info_user_pass;
            var empname_email  = data.MVC.user_result[i].TM_info_user_emailid;
            var empname_date  = data.MVC.user_result[i].TM_info_user_created_date;
            var empname_time  = data.MVC.user_result[i].TM_info_user_created_date_time;
            $('#edit_empname_id').val(empname_id);
            $('#edit_empname').val(empname);
            $('#edit_empname_pass').val(empname_pass);
            $('#edit_empname_cnfrmpass').val(empname_pass);
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

  // validation of insert field
  $('#submitbtn').on('click',function finsertfieldVal()
  {
    var val=1;
    var empname_id=$('#empname_id').val();
    var empname = $('#empname').val();
    var empname_pass=$('#empname_pass').val();
    var empname_email=$('#empname_email').val();
    var empname_date=$('#empname_date').val();
    var empname_time=$('#empname_time').val();
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(empname_id.length==0 && empname_id==''){
      alert('enter your Employee Id');
      val=0;
      return false;
    }
    if(empname.length==0 && empname==''){
      alert("enter employee name");
      val=0;
      return false;
    }
    if(empname_pass.length==0 && empname_pass==''){
      alert('enter Employee Password');
      val=0;
      return false;
    }
     /* if (reg.test (empname_email.value) == false) 
        {
          //$("#email").text("Invalid Email ->"+Email);
          alert('Invalid Email Address');
          val=0;
          return false;
        }*/
        if(empname_date.length==0 && empname_date==''){
          alert('please provide a valid date');
          val=0;
          return false;
        }
        if(empname_time.length==0 && empname_time==''){
          alert("please provide valid date and time");
          val=0;
          return false;
        }

      }); 

    //delete confirmation modal callup code 
    var modaldelete = document.getElementById('deletemodal');
    $("body").on("click","#del", function()
    {
      var del_id = $(this).attr('deleteid');
      $('#del_id').val(del_id);
      modaldelete.style.display = "block";  
    });
    window.onclick = function(event) {
      if (event.target == modaldelete) 
      {
        modaldelete.style.display = "none";
      }

    }
    //clicking on no button for delete
    $("confirmnotdelete").click(function(){
      modaldelete.style.display = "none"; 
    });

    //validation of update field only password
    $('#edit_submitbtn').on('click',function fupdatefieldVal()
  {
    var val=1;
    var empname_pass=$('#empname_pass').val();
    var empname_cnfrmpass=$('#edit_empname_cnfrmpass').val();
    val=1;
    if(empname_pass!=empname_cnfrmpass)
      {
        
        alert("confirm password should be same");
        val=0;
        return false;
      }
});
  </script>