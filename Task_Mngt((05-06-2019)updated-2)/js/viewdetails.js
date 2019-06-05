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
    if (event.target == modal) 
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

  //delete confirmation code 
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
  </script>